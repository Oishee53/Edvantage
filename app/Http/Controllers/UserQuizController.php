<?php
namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizSubmission;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;


class UserQuizController extends Controller
{

    public function startQuiz($courseId, $moduleNumber)
    {
        $course = Courses::findOrFail($courseId);
        $quiz = Quiz::where('course_id', $courseId)->where('module_number', $moduleNumber)->firstOrFail();
       $questions = $quiz->questions()->with('options')->get();


        return view('quiz.take_quiz', compact('course', 'quiz', 'questions', 'moduleNumber'));
    }

  
  public function submitQuiz(Request $request, $courseId, $moduleNumber)
{
    $quiz = Quiz::where('course_id', $courseId)
                ->where('module_number', $moduleNumber)
                ->firstOrFail();

    $submission = QuizSubmission::create([
        'user_id' => auth()->id(),
        'quiz_id' => $quiz->id,
    ]);

    $score = 0;
    $total = 0;

    foreach ($request->input('answers', []) as $questionId => $selectedOptionId) {
        $question = Question::find($questionId);
        $isCorrect = $question->options()->where('id', $selectedOptionId)->where('is_correct', true)->exists();

        QuizAnswer::create([
            'quiz_submission_id' => $submission->id,
            'question_id' => $questionId,
            'selected_option_id' => $selectedOptionId,
            'is_correct' => $isCorrect,
        ]);

        if ($isCorrect) {
            $score++;
        }
        $total++;
    }

    $submission->update(['score' => $score]);

    return redirect()->route('user.quiz.result', [$courseId, $moduleNumber])
                     ->with('success', "You scored $score out of $total!");
}



   public function result($courseId, $moduleNumber)
{
    $quiz = Quiz::where('course_id', $courseId)
                ->where('module_number', $moduleNumber)
                ->firstOrFail();

    $submission = QuizSubmission::where('user_id', auth()->id())
                                 ->where('quiz_id', $quiz->id)
                                 ->latest()
                                 ->first();

    return view('quiz.result', compact('quiz', 'submission'));
}

}
