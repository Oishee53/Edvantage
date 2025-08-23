<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Question</h1>
<p><strong>{{ $question->content }}</strong></p>

<h2>Status: {{ ucfirst($question->status) }}</h2>

@if($question->status === 'answered')
    <h3>Answer:</h3>
    <p>{{ $question->answer }}</p>
@elseif($question->status === 'rejected')
    <h3>This question was rejected by the instructor.</h3>
@else
    <p>Your question is still pending review.</p>
@endif
<a href="/homepage">Back to Dashboard</a>
</body>
</html>