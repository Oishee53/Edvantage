<!DOCTYPE html>
<html>
<head>
    <title>Register - EDVANTAGE</title>
</head>
<body>

    <h2>Register</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/register" method="POST">
        @csrf

        <label for="name">Full Name:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="text" name="phone" id="phone" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="password_confirmation">Confirm Password:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br><br>

        <label for="field">Area of Interest:</label><br>
        <input type="text" name="field" id="field" placeholder="e.g. Data Science"><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="/login">Login here</a></p>

</body>
</html>
