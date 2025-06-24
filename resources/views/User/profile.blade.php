<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - EDVANTAGE</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #ffffff;
            min-height: 100vh;
        }

        .profile-container {
            display: grid;
            grid-template-columns: 350px 1fr;
            min-height: 100vh;
        }

        /* Left Sidebar */
        .left-sidebar {
            background: #f8f9ff;
            padding: 40px 30px;
            border-right: 1px solid #e2e8f0;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #4285f4;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 4px solid #4285f4;
        }

        .profile-avatar i {
            font-size: 60px;
            color: white;
        }

        .profile-name {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .profile-subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .profile-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-outline {
            background: white;
            color: #4285f4;
            border: 2px solid #4285f4;
        }

        .btn-outline:hover {
            background: #4285f4;
            color: white;
            transform: translateY(-2px);
        }

        .btn-link {
            background: none;
            color: #4285f4;
            border: none;
            text-decoration: underline;
            padding: 8px 0;
            font-size: 14px;
        }

        .btn-link:hover {
            color: #3367d6;
        }

        /* Stats Section in Sidebar */
        .stats-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .stats-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }

        .stats-grid {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .stat-item {
            background: #f8f9ff;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid #4285f4;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #4285f4;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Right Main Content */
        .main-content {
            padding: 40px;
            background: white;
            overflow-y: auto;
        }

        .content-section {
            margin-bottom: 50px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: #4285f4;
            font-size: 20px;
        }

        .section-description {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            gap: 20px;
        }

        .info-item {
            background: #f8f9ff;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #4285f4;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 133, 244, 0.15);
        }

        .info-label {
            font-size: 14px;
            font-weight: 600;
            color: #4285f4;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .btn-primary {
            background: #4285f4;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #3367d6;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 133, 244, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #4285f4;
            border: 2px solid #4285f4;
        }

        .btn-secondary:hover {
            background: #4285f4;
            color: white;
            transform: translateY(-2px);
        }

        .add-button {
            background: white;
            color: #4285f4;
            border: 2px solid #4285f4;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-button:hover {
            background: #4285f4;
            color: white;
        }

        /* Bio Section Styles */
        .bio-container {
            background: #f8f9ff;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #4285f4;
        }

        .bio-text {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .bio-placeholder {
            color: #999;
            font-style: italic;
        }

        .bio-textarea {
            width: 100%;
            min-height: 120px;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 16px;
            line-height: 1.6;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        .bio-textarea:focus {
            outline: none;
            border-color: #4285f4;
        }

        .bio-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-small {
            padding: 8px 16px;
            font-size: 12px;
            border-radius: 6px;
        }

        .hidden {
            display: none;
        }

        /* Navigation Actions */
        .navigation-actions {
            background: #f8f9ff;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .navigation-actions h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .profile-container {
                grid-template-columns: 300px 1fr;
            }
            
            .left-sidebar {
                padding: 30px 20px;
            }
            
            .main-content {
                padding: 30px 25px;
            }
        }

        @media (max-width: 768px) {
            .profile-container {
                grid-template-columns: 1fr;
            }

            .left-sidebar {
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .main-content {
                padding: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .stat-item {
                padding: 12px;
            }

            .stat-number {
                font-size: 20px;
            }

            .nav-buttons {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h1 class="profile-name">{{ $user->name }}</h1>
                <p class="profile-subtitle">{{ $user->field }} Enthusiast</p>
            </div>

            <!-- Profile Actions -->
            <div class="profile-actions">
                <a href="#" class="btn btn-outline">
                    <i class="fas fa-share-alt"></i>
                    Share profile link
                </a>
                <button class="btn-link">
                    Update profile visibility
                </button>
            </div>

            <!-- Stats Section -->
            <div class="stats-section">
                <h3 class="stats-title">Learning Progress</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Courses Enrolled</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Certificates Earned</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Hours Learned</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Personal Information Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-user-circle"></i>
                        Personal Information
                    </h2>
                    <button class="add-button">
                        <i class="fas fa-edit"></i>
                        Edit Profile
                    </button>
                </div>
                <p class="section-description">
                    Manage your personal information and account details. Keep your profile up to date to get the most out of your learning experience.
                </p>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ $user->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">{{ $user->email }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Phone Number</div>
                        <div class="info-value">{{ $user->phone ?? 'Not provided' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Field of Interest</div>
                        <div class="info-value">{{ $user->field }}</div>
                    </div>
                </div>
            </div>

            <!-- Account Information Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-cog"></i>
                        Account Information
                    </h2>
                </div>
                <p class="section-description">
                    View your account status and membership details. Your account information helps us provide you with personalized learning recommendations.
                </p>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Member Since</div>
                        <div class="info-value">{{ $user->created_at->format('F j, Y') }}</div>
                    </div>
            </div>
            <br>
            <!-- Bio Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-file-alt"></i>
                        About Me
                    </h2>
                    <button class="add-button" onclick="toggleBioEdit()">
                        <i class="fas fa-edit"></i>
                        <span id="bio-edit-text">Add Bio</span>
                    </button>
                </div>
                <p class="section-description">
                    Share a bit about yourself, your learning goals, and what motivates you. This helps others in the community get to know you better.
                </p>
                <div class="bio-container">
                    <div id="bio-display">
                        <div class="bio-text bio-placeholder">
                            {{ $user->bio ?? 'No bio added yet. Click "Add Bio" to tell others about yourself, your learning journey, and your goals.' }}
                        </div>
                    </div>
                    <div id="bio-edit" class="hidden">
                        <textarea 
                            class="bio-textarea" 
                            placeholder="Tell us about yourself, your learning goals, interests, and what motivates you to learn..."
                            maxlength="500"
                        >{{ $user->bio ?? '' }}</textarea>
                        <div class="bio-actions">
                            <button class="btn btn-primary btn-small" onclick="saveBio()">
                                <i class="fas fa-save"></i>
                                Save Bio
                            </button>
                            <button class="btn btn-secondary btn-small" onclick="cancelBioEdit()">
                                <i class="fas fa-times"></i>
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Actions -->
            <div class="content-section">
                <div class="navigation-actions">
                    <h3>Quick Navigation</h3>
                    <div class="nav-buttons">
                        <a href="/homepage" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Back to Dashboard
                        </a>
                        <a href="{{ route('courses.all') }}" class="btn btn-primary">
                            <i class="fas fa-book"></i>
                            Browse All Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleBioEdit() {
            const bioDisplay = document.getElementById('bio-display');
            const bioEdit = document.getElementById('bio-edit');
            const editText = document.getElementById('bio-edit-text');
            
            bioDisplay.classList.add('hidden');
            bioEdit.classList.remove('hidden');
            editText.textContent = 'Cancel';
        }

        function cancelBioEdit() {
            const bioDisplay = document.getElementById('bio-display');
            const bioEdit = document.getElementById('bio-edit');
            const editText = document.getElementById('bio-edit-text');
            
            bioDisplay.classList.remove('hidden');
            bioEdit.classList.add('hidden');
            editText.textContent = 'Add Bio';
        }

        function saveBio() {
            const textarea = document.querySelector('.bio-textarea');
            const bioText = textarea.value.trim();
            
            // Here you would typically send the bio to your Laravel backend
            // For now, we'll just update the display
            const bioDisplay = document.querySelector('.bio-text');
            
            if (bioText) {
                bioDisplay.textContent = bioText;
                bioDisplay.classList.remove('bio-placeholder');
            } else {
                bioDisplay.textContent = 'No bio added yet. Click "Add Bio" to tell others about yourself, your learning journey, and your goals.';
                bioDisplay.classList.add('bio-placeholder');
            }
            
            cancelBioEdit();
            
            // Show success message (you can enhance this)
            alert('Bio saved successfully!');
        }
    </script>
</body>
</html>