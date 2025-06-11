<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    @auth
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <br>
    <a href="/admin_panel/manage_courses" style="font-weight: bold;">Manage Courses</a>
    <br>
    <a href="/admin_panel/manage_resources" style="font-weight: bold;">Manage Resources</a>
    <br>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth
</body>
</html>