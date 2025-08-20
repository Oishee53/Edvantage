<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Module Management</title>
</head>
<body>
    <a href="/admin_panel/manage_resources/{{ $course->id }}/modules/{{ $moduleNumber }}/edit">
    <button>Add Video and Pdf</button>
    </a>

    <a href="{{ route('quiz.create', ['course' => $course->id, 'module' => $moduleNumber]) }}">
        <button>Add Quiz</button>
    </a>
    @if(auth()->user()->role === 2)
    <a href="/admin_panel/manage_resources">← Back to Home Page</a>
    @elseif(auth()->user()->role === 3)
        <a href="/instructor/manage_resources">← Back to Home Page</a>
    @endif
</body>
</html>