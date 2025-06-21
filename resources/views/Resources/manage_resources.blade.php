<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Resources</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 20px;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 24px;
            font-weight: bold;
            color: white;
            letter-spacing: 1px;
        }

       .container {
    background: linear-gradient(135deg, #aa60ff);
    border-radius: 15px;
    padding: 40px 30px;
    width: 350px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    color: white;
}


        h2 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #fff;
        }

        a {
            display: block;
            background-color: #ffffff;
            color: #6d28d9;
            text-decoration: none;
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a:hover {
            transform: translateY(-2px);
            background-color: #e5e5e5;
            color: #5b21b6;
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        .back-link {
            background: none;
            color: #fff;
            font-size: 14px;
            margin-top: 20px;
            box-shadow: none;
        }

        .back-link:hover {
            text-decoration: underline;
            transform: none;
        }

        @media (max-width: 400px) {
            .container {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
@auth
    <div class="logo">EDVANTAGE</div>

    <div class="container">
        <h2>Manage Resources</h2>

        <a href="/admin_panel/manage_resources/add">➕ Add Resources</a>
        <a href="/admin_panel/manage_resources/view">📄 View Resources</a>
        <a href="/admin_panel" class="back-link">← Back to Home Page</a>
    </div>
@else
    <p style="text-align: center;">You are not logged in.
        <a href="/" style="color: #ffffff; text-decoration: underline;">Go to Login</a>
    </p>
@endauth
</body>
</html>
