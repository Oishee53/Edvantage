<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 4px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .required {
            color: #ffb4b4;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 8px 10px;
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

        @media screen and (max-width: 600px) {
            body {
                padding-top: 60px;
            }

            .logo {
                font-size: 1.2rem;
                top: 10px;
                left: 15px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>

    <div class="container">
        @auth
        <h2>➕ Add New Course</h2>

        <form action="/admin_panel/manage_courses/create" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Course Image <span class="required">*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="title">Course Title <span class="required">*</span></label>
                <input type="text" id="title" name="title" placeholder="Enter course title" required>
            </div>

            <div class="form-group">
                <label for="description">Course Description</label>
                <textarea id="description" name="description" placeholder="Enter course description"></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category <span class="required">*</span></label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Machine Learning">Machine Learning</option>
                    <option value="Design">Design</option>
                    <option value="Business">Business</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="video_count">Number of Videos <span class="required">*</span></label>
                <input type="number" id="video_count" name="video_count" placeholder="e.g., 25" min="1" required>
            </div>

            <div class="form-group">
                <label for="approx_video_length">Approx Video Length (minutes) <span class="required">*</span></label>
                <input type="number" id="approx_video_length" name="approx_video_length" placeholder="e.g., 15" min="1" required>
            </div>

            <div class="form-group">
                <label for="total_duration">Total Duration (hours) <span class="required">*</span></label>
                <input type="number" id="total_duration" name="total_duration" placeholder="e.g., 6.5" step="0.1" min="0.1" required>
            </div>

            <div class="form-group">
                <label for="price">Price (৳) <span class="required">*</span></label>
                <input type="number" id="price" name="price" placeholder="e.g., 2500" step="0.01" min="0" required>
            </div>

            <button type="submit">💾 Save Course</button>
        </form>

        <a href="/admin_panel/manage_courses">← Back to Manage Courses</a>
        @else
        <p>You are not logged in. <a href="/">Go to Login</a></p>
        @endauth
    </div>
</body>
</html>
