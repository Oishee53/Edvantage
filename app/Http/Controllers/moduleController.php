<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Resource;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Services\MuxService;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class moduleController extends Controller
{
    public function store(Request $request, MuxService $muxService, $course_id, $module_id)
    {
        $request->validate([
            'module_name' => 'required|string|max:255',
            'lecture_count' => 'required|integer|min:1|max:10',
            'lectures' => 'required|array',
            'lectures.*.name' => 'required|string|max:255',
            'lectures.*.video' => 'nullable|file|mimetypes:video/mp4,video/quicktime|max:51200',
            'lectures.*.pdf' => 'nullable|file|mimes:pdf|max:10240',
            // Module quiz validation
            'module_quiz_title' => 'nullable|string|max:255',
            'module_quiz_description' => 'nullable|string|max:1000',
            'module_questions' => 'nullable|array',
            'module_questions.*.text' => 'required_with:module_questions|string|max:1000',
            'module_questions.*.options' => 'required_with:module_questions|array|min:2|max:6',
            'module_questions.*.options.*.text' => 'required|string|max:255',
            'module_questions.*.correct' => 'required_with:module_questions|integer|min:0',
        ]);

        try {
            // 🔹 Process each lecture
            foreach ($request->lectures as $lectureIndex => $lectureData) {
                $lectureNumber = $lectureIndex + 1;

                $resourceData = [
                    'courseId'      => $course_id,
                    'moduleNumber'  => $module_id,
                    'lectureNumber' => $lectureNumber,
                    'lectureName'   => $lectureData['name'],
                    'moduleName'    => $request->module_name,
                ];

                // Upload video if provided
                if (!empty($lectureData['video'])) {
                    $cloudinaryUrl = $this->uploadVideoToCloudinary($lectureData['video'], $course_id, $module_id);
                    $newRequest = new Request(['video' => $cloudinaryUrl]);
                    $muxResult = $this->uploadToMux($newRequest, $muxService);

                    if (is_array($muxResult) && isset($muxResult['playback_id'])) {
                        $resourceData['videos'] = $muxResult['playback_id'];
                    }
                }

                // Upload PDF if provided
                if (!empty($lectureData['pdf'])) {
                    $resourceData['pdf'] = $this->uploadPdfToCloudinary($lectureData['pdf'], $course_id, $module_id);
                }

                // Save resource
                $resource = Resource::updateOrCreate(
                    [
                        'courseId'      => $course_id, 
                        'moduleNumber'  => $module_id,
                        'lectureNumber' => $lectureNumber
                    ],
                    $resourceData
                );

                Log::info('Resource saved:', $resource->toArray());
            } // ✅ CLOSE foreach properly

            // 🔹 Handle module quiz (only once per module, outside loop)
            if ($request->has('module_questions') && !empty($request->module_questions)) {
                $this->createModuleQuiz($request, $course_id, $module_id);
            }

        } catch (\Exception $e) {
            Log::error('Module save failed:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to save module: ' . $e->getMessage()]);
        }
    }

    private function createModuleQuiz(Request $request, $course_id, $module_id)
    {
        // Create or update quiz for the module
        $quiz = Quiz::updateOrCreate(
            [
                'course_id'     => $course_id,
                'module_number' => $module_id,
            ],
            [
                'title'       => $request->module_quiz_title ?? "Module {$module_id} Quiz",
                'description' => $request->module_quiz_description ?? '',
                'total_marks' => count($request->module_questions),
                'moduleName'  => $request->module_name,
            ]
        );

        // Delete old questions + options
        $quiz->questions()->each(function ($question) {
            $question->options()->delete();
            $question->delete();
        });

        // Add new questions + options
        foreach ($request->module_questions as $questionData) {
            $question = $quiz->questions()->create([
                'question_text' => $questionData['text'],
            ]);

            foreach ($questionData['options'] as $optionIndex => $optionData) {
                $question->options()->create([
                    'option_text' => $optionData['text'],
                    'is_correct'  => ($questionData['correct'] == $optionIndex),
                ]);
            }
        }
    }

    private function uploadVideoToCloudinary($videoFile, $course_id, $module_id)
    {
        $result = Cloudinary::uploadApi()->upload($videoFile->getRealPath(), [
            'resource_type' => 'video',
            'folder' => "course_{$course_id}/module_{$module_id}",
        ]);

        return $result['secure_url'];
    }

    private function uploadPdfToCloudinary($pdfFile, $course_id, $module_id)
    {
        try {
            $originalName = pathinfo($pdfFile->getClientOriginalName(), PATHINFO_FILENAME);

            $result = Cloudinary::uploadApi()->upload($pdfFile->getRealPath(), [
                'resource_type'  => 'raw',
                'folder'         => "course_{$course_id}/module_{$module_id}",
                'public_id'      => $originalName,
                'format'         => 'pdf',
                'overwrite'      => true,
                'use_filename'   => true,
                'unique_filename'=> false,
            ]);

            return $result['secure_url'];
        } catch (\Exception $e) {
            Log::error('Cloudinary PDF Upload Error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    private function uploadToMux(Request $request, MuxService $muxService)
    {
        $videoUrl = $request->input('video');

        try {
            $result = $muxService->uploadVideo($videoUrl);
            Log::info('Mux Service Response:', ['result' => $result]);
            return $result;
        } catch (\Exception $e) {
            Log::error('Mux Upload Error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
