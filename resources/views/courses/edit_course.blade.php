<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0; padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed, #6d28d9);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 15px 20px;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 12px;
            left: 20px;
            font-size: 1.4rem;
            font-weight: bold;
            color: white;
        }

        .container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 580px;
        }

        h2 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            text-align: center;
        }

        form p {
            font-size: 0.85rem;
            margin-bottom: 4px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.92);
            font-size: 0.85rem;
            color: #333;
        }

        textarea {
            min-height: 60px;
            resize: vertical;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 0.95rem;
            background-color: white;
            color: #7c3aed;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #f3e8ff;
            transform: scale(1.02);
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #fff;
            text-decoration: none;
            font-size: 0.85rem;
        }

        a:hover {
            text-decoration: underline;
            color: #facc15;
        }

        img {
            margin: 10px 0;
            border-radius: 8px;
            max-width: 100%;
            height: auto;
        }

        @media screen and (max-width: 600px) {
            .logo {
                font-size: 1.2rem;
                top: 10px;
                left: 15px;
            }

            .container {
                padding: 15px;
            }

            h2 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>
    <div class="container">
        @auth
        <h2>✏️ Edit Course</h2>

        <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <p><strong>Course Image:</strong></p>
            @if($course->image)
                <p style="font-size: 0.8rem;">Current Image:</p>
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" width="200">
                <p style="font-size: 0.8rem;">Choose a new image to replace the current one:</p>
            @else
                <p style="font-size: 0.8rem;">No image uploaded.</p>
            @endif
            <input type="file" name="image" accept="image/*">

            <p><strong>Course Title *</strong></p>
            <input type="text" name="title" value="{{ $course->title }}" required>

            <p><strong>Course Description</strong></p>
            <textarea name="description" rows="4">{{ $course->description }}</textarea>

            <p><strong>Category *</strong></p>
            <select name="category" required>
                <option value="">Select Category</option>
                <option value="Web Development" {{ $course->category == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                <option value="Mobile Development" {{ $course->category == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                <option value="Data Science" {{ $course->category == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                <option value="Machine Learning" {{ $course->category == 'Machine Learning' ? 'selected' : '' }}>Machine Learning</option>
                <option value="Design" {{ $course->category == 'Design' ? 'selected' : '' }}>Design</option>
                <option value="Business" {{ $course->category == 'Business' ? 'selected' : '' }}>Business</option>
                <option value="Marketing" {{ $course->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="Other" {{ $course->category == 'Other' ? 'selected' : '' }}>Other</option>
            </select>

            <p><strong>Number of Videos *</strong></p>
            <input type="number" name="video_count" value="{{ $course->video_count }}" min="1" required>

            <p><strong>Approx Video Length (minutes) *</strong></p>
            <input type="number" name="approx_video_length" value="{{ $course->approx_video_length }}" min="1" required>

            <p><strong>Total Duration (hours) *</strong></p>
            <input type="number" name="total_duration" value="{{ $course->total_duration }}" step="0.1" min="0.1" required>

            <p><strong>Price (৳) *</strong></p>
            <input type="number" name="price" value="{{ $course->price }}" step="0.1" min="0" required>

            <button type="submit">💾 Update Course</button>
        </form>
        <a href="/admin_panel">← Back to Home Page</a>
        @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
        @endauth
    </div>
</body>
</html>
