<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --danger: #e11d48;
            --bg: #f9fafb;
            --card-bg: #fff;
            --card-shadow: 0 8px 28px rgba(0, 0, 0, 0.06);
            --input-border: #dbeafe;
            --input-focus: #2563eb;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 17px; }
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
        .logo {
            position: fixed;
            top: 24px;
            left: 38px;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-dark);
            letter-spacing: 1.5px;
            z-index: 10;
            background: transparent;
            padding: 0 8px;
        }
        .form-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 32px 32px 28px 32px;
            min-width: 400px;
            max-width: 520px;
            width: 100%;
            margin-top: 110px;
            margin-bottom: 48px;
            font-size: 0.9rem;
        }
        .form-card h2 {
            font-size: 1.1rem;
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary-dark);
        }
        .required {
            color: var(--danger);
            font-size: 1em;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 8px 10px;
            border-radius: 8px;
            border: 1.5px solid var(--input-border);
            background: #f8fafc;
            font-size: 0.85rem;
            color: #222;
            font-family: inherit;
            transition: border 0.18s, box-shadow 0.18s;
            box-shadow: 0 1.5px 8px rgba(37,99,235,0.03);
        }
        input[type="file"] {
            background: #fff;
            font-size: 0.85rem;
        }
        input:focus,
        textarea:focus,
        select:focus {
            border: 1.5px solid var(--input-focus);
            outline: 2px solid var(--input-focus);
            background: #fff;
            box-shadow: 0 0 0 2px rgba(37,99,235,0.07);
        }
        textarea {
            min-height: 56px;
            resize: vertical;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px 0;
            font-size: 0.9rem;
            background: var(--primary);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(37,99,235,0.07);
            transition: background 0.2s, transform 0.18s;
            margin-top: 10px;
            letter-spacing: 0.2px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        button[type="submit"]:hover,
        button[type="submit"]:focus {
            background: var(--primary-dark);
            transform: translateY(-1px) scale(1.01);
        }
        .back-link {
            display: inline-block;
            margin-top: 14px;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
            transition: color 0.18s;
        }
        .back-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        @media (max-width: 700px) {
            .logo { left: 12px; top: 12px; font-size: 1.05rem; }
            .form-card {
                padding: 18px 20px 16px 20px;
                min-width: 0;
                max-width: 98vw;
                margin-top: 70px;
                font-size: 0.85rem;
            }
            .form-card h2 { font-size: 1rem; }
            label, input, select, textarea, .back-link { font-size: 0.8rem; }
            button[type="submit"] { font-size: 0.85rem; }
        }
    </style>
</head>
<body>
    <div class="logo">EDVANTAGE</div>
    <div class="form-card">
        @auth
        <h2><i class="fas fa-plus-circle" style="color:var(--primary);"></i>Add New Course</h2>
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

            <button type="submit"><i class="fas fa-save"></i> Save Course</button>
        </form>
        <a class="back-link" href="/admin_panel/manage_courses"><i class="fas fa-arrow-left"></i> Back to Manage Courses</a>
        @else
        <p style="text-align:center;color:#e11d48;">You are not logged in. <a href="/" style="color:#2563eb;">Go to Login</a></p>
        @endauth
    </div>
</body>
</html>
