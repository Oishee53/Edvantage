<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Course</title>
</head>
<body>
    <h2>Delete A Course</h2>
    @if($courses->isEmpty())
        <p>No courses available.</p>
    @else
        <table border="1" cellpadding="8">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Videos</th>
                <th>Video Length</th>
                <th>Total Duration</th>
                <th>Price (৳)</th>
                <th>Added</th>
            </tr>

            @foreach($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->video_count }}</td>
                <td>{{ $course->approx_video_length }} mins</td>
                <td>{{ $course->total_duration }} hrs</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </table>
    <form action="/admin_panel/manage_courses/delete-course" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Course Title" required><br><br>
        <button type="submit">Delete Course</button>
    </form>
    @endif
    <br>
    <a href="/admin_panel/manage_courses">← Back to Manage Courses</a>
</body>
</html>