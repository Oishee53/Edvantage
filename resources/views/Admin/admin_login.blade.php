<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EDVANTAGE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            position: relative;
            overflow: hidden;
        }

        .logo {
            position: absolute;
            top: 30px;
            left: 40px;
            font-size: 32px;
            font-weight: bold;
            color: #fff;
            z-index: 2;
            letter-spacing: 1px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 40px 30px;
            width: 350px;
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .login-container h3 {
            font-size: 26px;
            margin-bottom: 25px;
            color: #fefefe;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #facc15;
            color: #1f1f1f;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #eab308;
        }

        .login-container p {
            margin-top: 15px;
            font-size: 13px;
            color: #ffe;
        }

        .login-container a {
            color: #facc15;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Optional background particles or decorations */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            animation: float 10s infinite ease-in-out;
            z-index: 0;
        }

        .circle:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 75%;
        }

        .circle:nth-child(2) {
            width: 100px;
            height: 100px;
            bottom: 15%;
            left: 20%;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 400px) {
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }
            .logo {
                font-size: 24px;
                top: 20px;
                left: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>
    <div class="circle"></div>
    <div class="circle"></div>

    <div class="login-container">
        <h3>Login</h3>

        @if (session('error'))
            <p style="color: #f87171;">{{ session('error') }}</p>
        @endif

        <form action="/admin/login" method="POST">
            @csrf

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
