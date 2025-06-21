<!DOCTYPE html>
<html>
<head>
    <title>{{ $course->title }} - Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8b5cf6, #7c3aed, #6d28d9);
            color: #fff;
            padding: 60px 20px 20px;
            display: flex;
            justify-content: center;
        }

        .logo {
            position: fixed;
            top: 20px;
            left: 25px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            z-index: 10;
        }

        .container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 25px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            font-size: 1.6rem;
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            padding-bottom: 10px;
        }

        p {
            font-size: 0.9rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        strong {
            font-weight: 600;
            color: #facc15;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: 0.3s ease;
            font-size: 0.9rem;
        }

        a:hover {
            color: #facc15;
            text-decoration: underline;
        }

        @media screen and (max-width: 600px) {
            body {
                padding: 100px 15px 20px;
            }

            .logo {
                font-size: 1.2rem;
                top: 12px;
                left: 18px;
            }

            .container {
                padding: 20px 15px;
            }

            h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>
    <div class="container">
        <h2>{{ $course->title }}</h2>

        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Video Count:</strong> {{ $course->video_count }}</p>
        <p><strong>Approx Video Length:</strong> {{ $course->approx_video_length }} min</p>
        <p><strong>Total Duration:</strong> {{ $course->total_duration }} min</p>
        <p><strong>Price:</strong> ৳{{ $course->price }}</p>

        <a href="{{ route('courses.all') }}">← Back to All Courses</a>
    </div>
</body>
</html>
