<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Question</title>
</head>
<body>
    <h1>Question:</h1>
    <p>{{ $question->content }}</p>

    <h2>Asked by:</h2>
    <p>{{ $question->user->name }}</p>

    @if ($question->status === 'pending')
        <form method="POST" action="{{ route('instructor.answer', $question->id) }}">
            @csrf
            <textarea name="answer" placeholder="Write your answer..." required></textarea>
            <br>
            <button type="submit">Submit Answer</button>
        </form>

        <form method="POST" action="{{ route('instructor.reject', $question->id) }}">
            @csrf
            <button type="submit">Reject Question</button>
        </form>
    @else
        <h3>Status: {{ ucfirst($question->status) }}</h3>
        @if ($question->answer)
            <p><strong>Answer:</strong> {{ $question->answer }}</p>
        @endif
    @endif

    <br>
    <a href="{{ url()->previous() }}">Go Back</a>
</body>
</html>
