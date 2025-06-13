<!DOCTYPE html>
<html>
<head>
    <title>Modules - {{ $course->title }}</title>
</head>
<body>
    @auth
    <h2>Modules for {{ $course->title }}</h2>

    <ul>
        @foreach ($modules as $index)
            <li>
                <a href="/admin_panel/manage_resources/{{ $course->id }}/modules/{{ $index }}/edit">
                    Module {{ $index }}
                </a>
            </li>
        @endforeach
    </ul>

    <a href="/admin_panel">← Back to Home Page</a>
    @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
</body>
</html>
