<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.upload') }}" method="POST">
    @csrf
    <label for="video">Video URL:</label>
    <input type="url" name="video" required>
    <button type="submit">Upload to Mux</button>
    </form>


</body>
</html>