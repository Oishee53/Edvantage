<!DOCTYPE html>
<html>
<head>
    <title>Module Resources</title>
</head>
<body>
    <h2>Module Resources for Course: {{ $course->name }}</h2>
    <p>Module Number: {{ $moduleNumber }}</p>

    @if($quiz)
        <a href="{{ route('user.quiz.start', ['course' => $course->id, 'module' => $moduleNumber]) }}">
            <button>Take Quiz</button>
        </a>
    @else
        <p>No quiz available for this module.</p>
    @endif
</body>
</html>
