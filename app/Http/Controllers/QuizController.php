<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Courses;
use App\Models\Question;
use App\Models\Option;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function create(Request $request)
{
    $courseId = $request->course;
    $moduleNumber = $request->module;

    $course = Courses::findOrFail($courseId);

    return view('Resources.add_quiz', [
        'course' => $course,
        'moduleNumber' => $moduleNumber,
    ]);
}


public function store(Request $request, $courseId, $moduleNumber)
{
    // 1. Check if a quiz already exists for this course & module
    $quiz = Quiz::updateOrCreate(
        [
            'course_id' => $courseId,
            'module_number' => $moduleNumber,
        ],
        [
            'title' => $request->title,
            'description' => $request->description,
            'total_marks' => $request->question_count,
        ]
    );

    // 2. Delete old questions & options 
    $quiz->questions()->each(function ($q) {
        $q->options()->delete();
        $q->delete();
    });

    // 3. Add new questions and options
    foreach ($request->questions as $qIndex => $qData) {
        $question = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => $qData['text'],
        ]);

        foreach ($qData['options'] as $optIndex => $optData) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $optData['text'],
                'is_correct' => ($qData['correct'] == $optIndex),
            ]);
        }
    }

    return redirect()->route('modules.show', ['course_id' => $courseId])
        ->with('success', 'Quiz updated successfully!');
}


}
