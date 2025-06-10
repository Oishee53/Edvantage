<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Courses</title>
</head>
<body>
    <h2>📚 All Courses</h2>

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
                @if($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}" 
                    alt="{{ $course->title }}" 
                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                @else
                    <span style="color: #999; font-style: italic;">No image</span>
                @endif
                <td>
                    <a href="/admin/manage_courses/courses/{{ $course->id }}/edit">{{ $course->title }}</a>
                </td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->category }}</td>
                <td>{{ $course->video_count }}</td>
                <td>{{ $course->approx_video_length }} mins</td>
                <td>{{ $course->total_duration }} hrs</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </table>
    @endif

    <br>
    <a href="/admin_panel/manage_courses">← Back to Manage Courses</a>
</body>
</html>
