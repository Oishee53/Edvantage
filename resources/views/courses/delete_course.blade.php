<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Course</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #7c3aed, #6d28d9);
            color: #fff;
            padding: 80px 20px 40px;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #facc15;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            font-size: 0.85rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            background-color: rgba(255, 255, 255, 0.1);
            color: #facc15;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.03);
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            background-color: #ef4444;
            border: none;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #dc2626;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #fff;
            text-decoration: none;
            font-size: 0.95rem;
        }

        a:hover {
            color: #facc15;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 0.75rem;
                padding: 8px;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @auth
    <h2>Delete A Course</h2>

    @if($courses->isEmpty())
        <p style="text-align: center; font-style: italic;">No courses available.</p>
    @else
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Videos</th>
                <th>Video Length</th>
                <th>Total Duration</th>
                <th>Price (৳)</th>
                <th>Added</th>
            </tr>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->video_count }}</td>
                <td>{{ $course->approx_video_length }} mins</td>
                <td>{{ $course->total_duration }} hrs</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </table>

        <form action="/admin_panel/manage_courses/delete-course" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Enter Course Title to Delete" required>
            <button type="submit">❌ Delete Course</button>
        </form>
    @endif

    <a href="/admin_panel/manage_courses">← Back to Manage Courses</a>
    @else
    <p style="text-align: center;">You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
</body>
</html>
