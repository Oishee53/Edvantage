<!DOCTYPE html>
<html>
<head>
    <title>Login - EDVANTAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
        }

        .login-container {
            max-width: 450px;
            margin: 60px auto;
            border: 3px solid #0070f3;
            padding: 40px;
            border-radius: 6px;
            background-color: #ffffff;
        }

        .logo {
            font-weight: 700;
            font-size: 28px;
            color: #0070f3;
            text-align: left;
            margin-bottom: 30px;
        }

        h3 {
            text-align: center;
            font-weight: 500;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 500;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #eaf3ff;
            font-size: 14px;
        }

        button {
            margin-top: 24px;
            width: 100%;
            padding: 14px;
            border: none;
            background-color: #0066e6;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0050c8;
        }

     <div class="register-link">
    Don't have an account? <a href="/register">Sign up</a>
</div>


        .error {
            background-color: #ffe6e6;
            color: #d10000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">EDVANTAGE</div>

        <h3>Sign in Your Account</h3>

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Sign In</button>
        </form>

        <div class="register-link">
            Don't have an account? <a href="/register">Sign up</a>
        </div>
    </div>
</body>
</html>
