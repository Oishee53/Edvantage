<!DOCTYPE html>
<html>
<head>
    <title>{{ $course->title }} - Details</title>
</head>
<body>
    <h2>{{ $course->title }}</h2>

    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Video Count:</strong> {{ $course->video_count }}</p>
    <p><strong>Approx Video Length:</strong> {{ $course->approx_video_length }} min</p>
    <p><strong>Total Duration:</strong> {{ $course->total_duration }} min</p>
    <p><strong>Price:</strong> ${{ $course->price }}</p>

    <br>
    <a href="{{ route('courses.all') }}">← Back to All Courses</a>
</body>
</html>
