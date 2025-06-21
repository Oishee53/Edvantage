<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #8b5cf6, #7c3aed, #6d28d9);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
            letter-spacing: 1px;
            user-select: none;
        }

        .container {
            position: relative;
            padding: 40px;
            width: 330px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
            border: 2px solid transparent;
            background-clip: padding-box;
            text-align: center;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            z-index: -1;
            background: linear-gradient(135deg, #c084fc, #a855f7, #9333ea);
            border-radius: inherit;
        }

        .container p {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .container a {
            display: block;
            text-decoration: none;
            font-size: 1.1rem;
            color: white;
            margin: 12px 0;
            padding: 10px 0;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
        }

        .container a:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: scale(1.05);
            box-shadow: 0 0 12px #d8b4fe;
        }

        .container button {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: bold;
            color: #7c3aed;
            background: #ffffff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .container button:hover {
            background: #f3e8ff;
            transform: scale(1.05);
            box-shadow: 0 0 12px #c4b5fd;
        }

        @media screen and (max-width: 400px) {
            .container {
                width: 90%;
                padding: 30px;
            }

            .logo {
                font-size: 1.5rem;
                left: 20px;
                top: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>

    <div class="container">
        @auth
            <p>Welcome, {{ auth()->user()->name }}!</p>
            <a href="/admin_panel/manage_courses">📚 Manage Courses</a>
            <a href="/admin_panel/manage_resources">📂 Manage Resources</a>
            <form action="/logout" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        @else
            <p>You are not logged in.</p>
            <a href="/">🔐 Go to Login</a>
        @endauth
    </div>
</body>
</html>
