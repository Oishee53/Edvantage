<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(to bottom, #FFF2E0, #C9D0F3, #A9AFE3, #8C91C9);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
            color: #333;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #4B3F72;
            letter-spacing: 1px;
            user-select: none;
        }

        .card {
            width: 350px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: 2px solid #A9AFE3;
            text-align: center;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 25px;
            color: #4B3F72;
        }

        form {
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            background-color: #8C91C9;
            color: white;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #6B6FB8;
            transform: scale(1.03);
            box-shadow: 0 0 10px #A9AFE3;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #4B3F72;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            color: #2E285C;
        }

        @media screen and (max-width: 400px) {
            .card {
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

    <div class="card">
        @auth
        <h2> Manage Courses</h2>

        <form action="/admin_panel/manage_courses/add" method="GET">
            <button type="submit"> Add a New Course</button>
        </form>

        <form action="/admin_panel/manage_courses/edit-list" method="GET">
            <button type="submit"> Update Existing Course</button>
        </form>

        <form action="/admin_panel/manage_courses/delete-course" method="GET">
            <button type="submit"> Delete a Course</button>
        </form>

        <form action="/admin_panel/manage_courses/view-list" method="GET">
            <button type="submit"> View All Courses</button>
        </form>

        <a href="/admin_panel">← Back to Home Page</a>
        @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
        @endauth
    </div>
</body>
</html>
