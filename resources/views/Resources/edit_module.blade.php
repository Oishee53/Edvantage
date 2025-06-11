<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Module</title>
</head>
<body>
    {{$course->title}}
    {{$module_id}}
    <form action="{{ url('admin_panel/manage_resources/' . $course->id . '/module/' . $module_id . '/add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>YouTube Video URL:</label><br>
    <input type="url" name="video_url" required>
    <label>Lecture Note Pdf:</label><br>
    <input type="file" name="lecture_note" accept="application/pdf" required>
    <button type="submit">Save Resources</button>
</form>
    <a href="/admin_panel">← Back to Home Page</a>
</body>
</html>