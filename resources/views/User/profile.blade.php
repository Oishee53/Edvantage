<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - EDVANTAGE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(106, 76, 156, 0.7), rgba(78, 42, 132, 0.7)),
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=2071&q=80') center/cover no-repeat fixed;
            color: #4B3F72; /* Deep Purple for general text */
            min-height: 100vh;
            position: relative;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Profile Container */
        .profile-container {
            background: #C0C9EE; /* Light Lavender for container background */
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 800px;
            text-align: left;
            backdrop-filter: blur(15px);
        }

        h2 {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            color: #4B3F72; /* Deep Purple for profile title */
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Profile info styles */
        .profile-info {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .profile-info p {
            background: rgba(255, 255, 255, 0.2); 
            padding: 15px 20px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            font-size: 18px;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            color: #4B3F72; /* Deep Purple for profile information text */
        }

        .profile-info p:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.3);
        }

        .profile-info strong {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            color: #4B3F72; /* Light Blue-Purple for labels */
            display: block;
            margin-bottom: 6px;
        }

        a {
            display: inline-block;
            background: linear-gradient(135deg, #6366f1, #4f46e5); /* Purple button */
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }

        a:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(99, 102, 241, 0.4);
            background: linear-gradient(135deg, #4f46e5, #4338ca);
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .profile-container {
                padding: 20px;
                width: 100%;
                max-width: 100%;
            }

            h2 {
                font-size: 26px;
            }

            .profile-info p {
                font-size: 16px;
            }

            a {
                font-size: 16px;
                padding: 12px 25px;
            }
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <h2>👤 My Profile</h2>

        <div class="profile-info">
            <div><strong>Name:</strong></div>
            <p>{{ $user->name }}</p>
        </div>

        <div class="profile-info">
            <div><strong>Email:</strong></div>
            <p>{{ $user->email }}</p>
        </div>

        <div class="profile-info">
            <div><strong>Phone:</strong></div>
            <p>{{ $user->phone }}</p>
        </div>

        <div class="profile-info">
            <div><strong>Field of Interest:</strong></div>
            <p>{{ $user->field }}</p>
        </div>

        <a href="/homepage">← Back to Homepage</a>
    </div>

</body>
</html>
