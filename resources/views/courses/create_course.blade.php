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
            --primary: #0E1B33;
            --primary-light: #E3E6F3;
            --primary-dark: #0A1426;
            --danger: #DC2626;
            --bg: #f9fafb;
            --card-bg: #fff;
            --card-shadow: 0 8px 28px rgba(0, 0, 0, 0.06);
            --input-border: #E3E6F3;
            --input-focus: #0E1B33;
            --sidebar-width: 256px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 17px; }
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #e5e7eb;
        }

        .sidebar-header img {
            height: 40px;
        }

        .sidebar-nav {
            margin-top: 32px;
            flex: 1;
        }

        .sidebar-nav a {
            display: block;
            padding: 12px 24px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .sidebar-nav a:hover {
            background: var(--primary-light);
        }

        .sidebar-nav a.active {
            background: var(--primary-light);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Top Header */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 32px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .top-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info span {
            color: var(--primary);
            font-weight: 500;
        }

        .logout-btn {
            background: var(--primary);
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .logout-btn:hover {
            opacity: 0.9;
        }

        /* Form Content */
        .content-area {
            flex: 1;
            padding: 32px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .form-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 32px 32px 28px 32px;
            min-width: 400px;
            max-width: 520px;
            width: 100%;
            font-size: 0.9rem;
        }

        .form-card h2 {
            font-size: 1.1rem;
            color: var(--primary);
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
            color: var(--primary);
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
            box-shadow: 0 1.5px 8px rgba(14, 27, 51, 0.03);
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
            box-shadow: 0 0 0 2px rgba(14, 27, 51, 0.07);
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
            box-shadow: 0 2px 8px rgba(14, 27, 51, 0.07);
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
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-btn {
                display: block;
                background: none;
                border: none;
                font-size: 1.2rem;
                color: var(--primary);
                cursor: pointer;
            }
            
            .form-card {
                padding: 18px 20px 16px 20px;
                min-width: 0;
                max-width: 98vw;
                font-size: 0.85rem;
            }
            
            .form-card h2 { font-size: 1rem; }
            label, input, select, textarea, .back-link { font-size: 0.8rem; }
            button[type="submit"] { font-size: 0.85rem; }
            
            .content-area {
                padding: 16px;
            }
        }

        .mobile-menu-btn {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="/image/Edvantage.png" alt="Edvantage Logo">
        </div>
        <nav class="sidebar-nav">
            <a href="/admin_panel">Dashboard</a>
            <a href="/admin_panel/manage_courses">Manage Course</a>
            <a href="/admin_panel/manage_user">Manage User</a>
            <a href="#">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div style="display: flex; align-items: center; gap: 16px;">
                <button class="mobile-menu-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Add New Course</h1>
            </div>
            @auth
                <div class="user-info">
                    <span>{{ auth()->user()->name }}</span>
                    <form action="/logout" method="POST" style="margin: 0;">
                        @csrf
                        <button class="logout-btn">Logout</button>
                    </form>
                </div>
            @else
                <div style="display: flex; gap: 8px;">
                    <a href="/login" style="border: 1px solid var(--primary); color: var(--primary); padding: 8px 16px; border-radius: 4px; text-decoration: none;">Login</a>
                    <a href="/register" style="background: var(--primary); color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Sign Up</a>
                </div>
            @endauth
        </header>

        <!-- Form Content -->
        <div class="content-area">
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
                        <input type="number" id="video_count" name="video_count"  min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="approx_video_length">Approx Video Length (minutes) <span class="required">*</span></label>
                        <input type="number" id="approx_video_length" name="approx_video_length"  min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="total_duration">Total Duration (hours) <span class="required">*</span></label>
                        <input type="number" id="total_duration" name="total_duration"  step="0.1" min="0.1" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price (৳) <span class="required">*</span></label>
                        <input type="number" id="price" name="price" step="0.01" min="0" required>
                    </div>

                    <button type="submit"><i class="fas fa-save"></i> Save Course</button>
                </form>
                <a class="back-link" href="/admin_panel/manage_courses"><i class="fas fa-arrow-left"></i> Back to Manage Courses</a>
                @else
                <p style="text-align:center;color:#DC2626;">You are not logged in. <a href="/" style="color:#0E1B33;">Go to Login</a></p>
                @endauth
            </div>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuBtn.contains(event.target)) {
                sidebar.classList.remove('open');
            }
        });
    </script>
</body>
</html>