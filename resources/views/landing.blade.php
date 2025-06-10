<!DOCTYPE html>
<html>
<head>
    <title>EDVANTAGE - Home</title>
</head>
<body>

    <div>

        <div>
            <a href="/login">Sign in</a> |
            <a href="/register">Sign up</a>
        </div>
        <div>
            <h2>EDVANTAGE</h2>
        </div>
        <div>
            <p>Your virtual classroom redifined</p>
        </div>
        

    <hr>
    </div>

  @foreach($courses as $course)
    <div>
        <h3>{{ $course->title }}</h3>
        <p>{{ $course->description }}</p>

        <a href="{{ route('courses.details', $course->id) }}">🔍 Details</a>

    <form action="{{ route('enroll', $course->id) }}" method="POST">
    @csrf
    <button type="submit">📘 Enroll</button>
    </form>

    </div>
@endforeach

</body>
</html>
