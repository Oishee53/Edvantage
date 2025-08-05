<!DOCTYPE html>
<html>
<head>
    <title>Modules - {{ $course->title }}</title>
</head>
<body>
    @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

    @auth
    <h2>Modules for {{ $course->title }}</h2>

    <ul>
        @foreach ($modules as $index)
            <li>
                <a href="{{ route('module.create', ['course' => $course->id, 'module' => $index]) }}">
                    Module {{ $index }}
                </a>
            </li>
        @endforeach
    </ul>

    @if(auth()->user()->role === 2)
    <a href="/admin_panel/manage_resources">← Back to Home Page</a>
    @elseif(auth()->user()->role === 3)
        <a href="/instructor/manage_resources">← Back to Home Page</a>
    @endif
    @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
</body>
</html>
