<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('upload.resources', [$course->id, $module_id]) }}" enctype="multipart/form-data">
    @csrf

    <label>Upload Video:</label>
    <input type="file" name="video" accept="video/*">

    <br><br>

    <label>Upload PDF:</label>
    <input type="file" name="pdf" accept="application/pdf">

    <br><br>

    <button type="submit">Upload</button>
</form>

</form>
</body>
</html>