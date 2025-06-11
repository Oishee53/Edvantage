<!DOCTYPE html>
<html>
<head>
    <title>My Enrolled Courses</title>
</head>
<body>
    <h2>My Enrolled Courses</h2>

    @if($courses->isEmpty())
        <p>You have not enrolled in any courses yet.</p>
    @else
        @foreach($courses as $course)
            <div style="border: 1px solid #ccc; margin-bottom: 10px; padding: 10px;">
                <h3>{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
            </div>
        @endforeach
    @endif

</body>
</html>
