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
       <img src="{{ $course->image }}" alt="Course Image" style="width: 100px; height: auto; display: block; margin-bottom: 10px;">

        <h3>{{ $course->title }}</h3>
        <p>{{ $course->description }}</p>

        <a href="{{ route('courses.details', $course->id) }}">🔍 Details</a>

    <form action="{{ route('cart.add', $course->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">🛒</button>
    </form> |

    </div>
@endforeach

</body>
</html>
