<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Services\MuxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UploadController extends Controller
{
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
            // Get the original filename without extension
            $originalName = pathinfo($pdfFile->getClientOriginalName(), PATHINFO_FILENAME);
            
            $result = Cloudinary::uploadApi()->upload($pdfFile->getRealPath(), [
                'resource_type' => 'raw',  // raw for PDFs
                'folder' => "course_{$course_id}/module_{$module_id}",
                'public_id' => $originalName, // Use clean filename
                'format' => 'pdf', // Explicitly set format as PDF
                'overwrite' => true,
                'use_filename' => true,
                'unique_filename' => false,
            ]);

            // Debug: Log what Cloudinary returns
            Log::info('Cloudinary PDF Upload Result:', ['result' => $result]);

            // Return the URL with .pdf extension for proper preview
            return $result['secure_url'];
        } catch (\Exception $e) {
            Log::error('Cloudinary PDF Upload Error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    private function uploadToMux(Request $request, MuxService $muxService)
    {
        $request->validate([
            'video' => 'required|url',
        ]);

        $videoUrl = $request->input('video');

        try {
            // Upload to Mux and get playback ID
            $result = $muxService->uploadVideo($videoUrl);
            
            // Debug: Log what Mux returns
            Log::info('Mux Service Response:', ['result' => $result]);
            
            return $result;
        } catch (\Exception $e) {
            Log::error('Mux Upload Error:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function handleUpload(Request $request, MuxService $muxService, $course_id, $module_id)
    {
        $request->validate([
            'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime|max:51200', // 50MB
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // 10MB
        ]);

        $data = [
            'courseId' => $course_id,
            'moduleId' => $module_id,
        ];

        // Upload video to Cloudinary and Mux
        if ($request->hasFile('video')) {
            try {
                $cloudinaryUrl = $this->uploadVideoToCloudinary($request->file('video'), $course_id, $module_id);
                Log::info('Video uploaded to Cloudinary:', ['url' => $cloudinaryUrl]);

                // Send to Mux
                $newRequest = new Request(['video' => $cloudinaryUrl]);
                $muxResult = $this->uploadToMux($newRequest, $muxService);
                
                // Extract playback ID from Mux response
                if (is_array($muxResult) && isset($muxResult['playback_id'])) {
                    $data['videos'] = $muxResult['playback_id'];
                } else {
                    Log::error('Unexpected Mux response format:', ['response' => $muxResult]);
                    return back()->withErrors(['video' => 'Failed to process video with Mux']);
                }
                
                Log::info('Final video data to store:', ['videos' => $data['videos']]);
                
            } catch (\Exception $e) {
                Log::error('Video upload failed:', ['error' => $e->getMessage()]);
                return back()->withErrors(['video' => 'Video upload failed: ' . $e->getMessage()]);
            }
        }

        // Upload PDF
        if ($request->hasFile('pdf')) {
            try {
                $pdfUrl = $this->uploadPdfToCloudinary($request->file('pdf'), $course_id, $module_id);
                $data['pdf'] = $pdfUrl;
                Log::info('PDF uploaded:', ['url' => $pdfUrl]);
            } catch (\Exception $e) {
                Log::error('PDF upload failed:', ['error' => $e->getMessage()]);
                return back()->withErrors(['pdf' => 'PDF upload failed: ' . $e->getMessage()]);
            }
        }

        // Debug: Log final data before database operation
        Log::info('Data to be stored in database:', $data);

        // Insert or update using Eloquent
        try {
            $resource = Resource::updateOrCreate(
                ['courseId' => $course_id, 'moduleId' => $module_id], // conditions to find existing record
                $data // data to update or create with
            );
            
            Log::info('Resource saved successfully:', ['resource' => $resource->toArray()]);
            
        } catch (\Exception $e) {
            Log::error('Database operation failed:', ['error' => $e->getMessage()]);
            return back()->withErrors(['database' => 'Failed to save resource: ' . $e->getMessage()]);
        }

        return back()->with('success', 'Resources uploaded successfully!');
    }
} 