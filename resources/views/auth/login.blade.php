<!DOCTYPE html>
<html>
<head>
    <title>Login - EDVANTAGE</title>
 
</head>
<body>
    <h2>EDVANTAGE</h2>

    <h3>Login</h3>

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="/register">Register here</a></p>

</body>
</html>
