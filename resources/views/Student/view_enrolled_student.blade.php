<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Student</title>
</head>
<body>
<div class="container">
    <h2 class="mb-4">Enrolled Students Per Course</h2>

    @foreach($courses as $course)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Course Title:</strong> {{ $course->title }} <br>
                <strong>No. of Students Enrolled:</strong> {{ $course->students->count() }}
            </div>
            <div class="card-body">
                @if($course->students->isEmpty())
                    <p>No students enrolled.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course->students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    @endforeach
</div>
</body>
</html>