<!DOCTYPE html>
<html>
<head>
    <title>My Profile - EDVANTAGE</title>
</head>
<body>
    <h2>👤 My Profile</h2>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{ $user->phone }}</p>
    <p><strong>Field of Interest:</strong> {{ $user->field }}</p>

    <br>
    <a href="/homepage">← Back to Homepage</a>
</body>
</html>
