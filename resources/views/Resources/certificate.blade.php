<!DOCTYPE html>
<html>
<head>
    <style>
        p { font-size: 20px; }
        .container { border: 10px solid #ccc; padding: 50px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Certificate of Completion</h1>
        <h2>{{ $course->title }}</h2>
        <p>This certifies that</p>
        <h2>{{ $user->name }}</h2>
        <p>has successfully completed the course with a score of {{ round($avgScore) }}%.</p>
        <p>Date: {{ date('d M Y') }}</p>
    </div>
</body>
</html>
