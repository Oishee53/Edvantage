<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <h2 class="mb-4">All Students</h2>

    @foreach($students as $student)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Name:</strong> {{ $student->name }} <br>
                <strong>Email:</strong> {{ $student->email }} <br>
                <strong>Phone:</strong> {{ $student->phone }}
            </div>
        </div>
    @endforeach
</div>  
</body>
</html>