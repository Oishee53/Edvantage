<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EDVANTAGE - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            border-bottom: 1px solid #ccc;
        }

        .logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: #0a50c2;
        }

        .auth-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #000;
            font-size: 16px;
        }

        .hero {
            background-color: #dceeff;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            margin: 30px 80px;
        }

        .hero h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .hero p {
            font-weight: bold;
            color: #3c3c3c;
        }

        .courses {
            display: flex;
            justify-content: space-around;
            margin: 40px 80px 20px;
            text-align: center;
        }

        .course img {
            width: 220px;
            height: 140px;
            border-radius: 5px;
        }

        .course p {
            margin-top: 10px;
        }

        .show-more {
            text-align: left;
            margin: 0 80px 40px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">EDVANTAGE</div>
        <div class="auth-links">
            <a href="/login">Sign in</a>
            <a href="/register">Sign up</a>
        </div>
    </div>

    <div class="hero">
        <h2>Your Virtual Classroom, Redefined</h2>
        <p>Experience seamless learning with a system trusted by educators and institutions worldwide.</p>
    </div>

    <div class="courses">
        <div class="course">
            <img src="https://i.imgur.com/5oY5k4k.png" alt="Python Course">
            <p>Python Course For Beginner</p>
        </div>
        <div class="course">
            <img src="https://i.imgur.com/FJ8lM0n.png" alt="Java Course">
            <p>Introduction To Java</p>
        </div>
        <div class="course">
            <img src="https://i.imgur.com/o6NQkQ1.png" alt="Business Studies">
            <p>Diploma In Business Studies</p>
        </div>
    </div>

    <div class="show-more">show 8 more</div>

</body>
</html>
