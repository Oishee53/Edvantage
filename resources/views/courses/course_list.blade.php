<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Courses</title>
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
            padding: 80px 20px 40px;
        }

        .logo {
            position: fixed;
            top: 20px;
            left: 25px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            z-index: 100;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
            color: #facc15;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        th, td {
            padding: 10px;
            font-size: 0.85rem;
            text-align: center;
        }

        th {
            background-color: rgba(255, 255, 255, 0.15);
            color: #facc15;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
            color: #facc15;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 0.95rem;
        }

        @media screen and (max-width: 768px) {
            th, td {
                font-size: 0.75rem;
                padding: 8px 6px;
            }

            h2 {
                font-size: 1.4rem;
            }

            .logo {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>

    @auth
    <h2>Edit Courses</h2>

    @if($courses->isEmpty())
        <p style="text-align: center; font-style: italic;">No courses available.</p>
    @else
    <div class="table-wrapper">
        <table>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Videos</th>
                <th>Video Length</th>
                <th>Total Duration</th>
                <th>Price (৳)</th>
                <th>Added</th>
            </tr>
            @foreach($courses as $course)
            <tr>
                <td>
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                    @else
                        <span style="color: #ccc; font-style: italic;">No image</span>
                    @endif
                </td>
                <td>
                    <a href="/admin/manage_courses/courses/{{ $course->id }}/edit">{{ $course->title }}</a>
                </td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->category }}</td>
                <td>{{ $course->video_count }}</td>
                <td>{{ $course->approx_video_length }} mins</td>
                <td>{{ $course->total_duration }} hrs</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif

    <a class="back-link" href="/admin_panel/manage_courses">← Back to Manage Courses</a>
    @else
    <p style="text-align: center;">You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
</body>
</html>
