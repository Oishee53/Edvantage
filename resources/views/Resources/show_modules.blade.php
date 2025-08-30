<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Modules - Course Title</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        /* Custom CSS Variables */
        :root {
            --primary-color: #0E1B33;
            --primary-light-hover-bg: #E3E6F3;
            --body-background: #f9fafb;
            --card-background: #ffffff;
            --text-default: #333;
            --text-gray-600: #4b5563;
            --text-gray-700: #374151;
            --text-gray-500: #6b7280;
            --border-color: #e5e7eb;
            --edit-bg: #EDF2FC;
            --edit-text: #0E1B33;
            --delete-bg: #FEF2F2;
            --delete-icon: #DC2626;
            --green-600: #059669;
            --warning-color: #f59e0b;
            --success-color: #059669;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--body-background);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar - Matching Dashboard Style */
        .sidebar {
            width: 17.5rem;
            background-color: var(--card-background);
            min-height: 100vh;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.25rem;
        }

        .sidebar-header img {
            height: 2.5rem;
        }

        .sidebar-nav {
            margin-top: 2.5rem;
            display: flex;
            flex-direction: column;
        }

        .sidebar-nav a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }

        .sidebar-nav a:hover {
            background-color: var(--primary-light-hover-bg);
            color: var(--primary-color);
        }

        .sidebar-nav a.active {
            background-color: var(--primary-light-hover-bg);
            color: var(--primary-color);
        }

        /* Main Content Wrapper - Matching Dashboard Style */
        .main-wrapper {
            margin-left: 17.5rem;
            flex: 1;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
        }

        /* Top bar - Matching Dashboard Style */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .top-bar-title {
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--primary-color);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info span {
            color: var(--primary-color);
            font-weight: 500;
        }

        .logout-button {
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.2s ease-in-out;
            background-color: var(--primary-color);
            color: white;
        }

        .logout-button:hover {
            opacity: 0.9;
        }

        /* Course Header */
        .course-header {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .course-header h2 {
            color: var(--primary-color);
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
        }

        .course-title {
            color: var(--text-gray-600);
            font-size: 1.125rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        /* Module Form Styles */
        .module-form-container {
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .module-form-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--edit-bg);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .module-form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .toggle-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
            transition: opacity 0.2s ease-in-out;
        }

        .toggle-btn:hover {
            opacity: 0.9;
        }

        .module-form-content {
            padding: 1.5rem;
            display: none;
        }

        .module-form-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s ease-in-out;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(14, 27, 51, 0.2);
        }

        .form-input-small {
            width: auto;
            display: inline-block;
            min-width: 80px;
        }

        .lectures-container {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .lecture-section {
            background-color: var(--body-background);
            border-radius: 0.375rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
        }

        .lecture-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .file-upload-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .file-input {
            padding: 0.5rem;
            border: 2px dashed var(--border-color);
            border-radius: 0.375rem;
            background-color: var(--card-background);
            transition: border-color 0.2s ease-in-out;
        }

        .file-input:hover {
            border-color: var(--primary-color);
        }

        .file-input input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border: none;
            background: transparent;
            font-size: 0.875rem;
        }

        /* Quiz Section Styles */
        .quiz-section {
            background-color: #f8fafc;
            border-radius: 0.375rem;
            padding: 1.5rem;
            margin-top: 1rem;
            border: 1px solid var(--border-color);
        }

        .quiz-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .quiz-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .add-quiz-btn {
            background-color: var(--success-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            font-size: 0.875rem;
            transition: opacity 0.2s ease-in-out;
        }

        .add-quiz-btn:hover {
            opacity: 0.9;
        }

        .quiz-form {
            display: none;
            margin-top: 1rem;
        }

        .quiz-form.active {
            display: block;
        }

        .question-section {
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background-color: var(--card-background);
        }

        .question-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .option-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
            padding: 0.5rem;
            background-color: #fafbfc;
            border-radius: 0.25rem;
            border: 1px solid var(--border-color);
        }

        .option-input {
            flex: 1;
            border: none;
            outline: none;
            padding: 0.25rem;
            font-family: 'Montserrat', sans-serif;
        }

        .radio-input {
            margin: 0;
        }

        .radio-label {
            font-size: 0.875rem;
            color: var(--text-gray-600);
            margin: 0;
            font-weight: 500;
        }

        .submit-btn {
            background-color: var(--success-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 0.375rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #047857;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary-color);
            border-radius: 0.375rem;
            transition: all 0.2s ease-in-out;
            font-size: 0.875rem;
        }

        .back-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
        }

        /* Not logged in state */
        .not-logged-in-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: var(--body-background);
        }

        .not-logged-in {
            text-align: center;
            color: var(--text-gray-700);
            padding: 2rem;
            background-color: var(--card-background);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .login-link {
            color: var(--primary-color);
            text-decoration: none;
            transition: text-decoration 0.2s ease-in-out;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                width: 16rem;
            }
            
            .main-wrapper {
                margin-left: 16rem;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            
            .main-wrapper {
                margin-left: 0;
            }
            
            .main-content {
                padding: 1rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .file-upload-group {
                grid-template-columns: 1fr;
            }

            .course-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="/image/Edvantage.png" alt="Edvantage Logo">
        </div>
        <nav class="sidebar-nav">
            <a href="/instructor_homepage">Dashboard</a>
            <a href="/instructor/manage_courses">Manage Courses</a>
            <a href="/instructor/manage_user">Manage Users</a>
            <a href="/instructor/manage_resources/add" class="active">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="main-wrapper">
        <!-- Main Content -->
        <main class="main-content">
            <!-- Top bar -->
            <div class="top-bar">
                <div class="top-bar-title">Course Modules</div>
                <div class="user-info">
                    <span>Instructor Name</span>
                    <form action="/logout" method="POST" style="display: inline;">
                        <button class="logout-button">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Course Header -->
            <div class="course-header">
                <h2>Sample Course Title</h2>
                <div class="course-title">Course Modules Management</div>
            </div>

<!-- Module Forms -->
@foreach ($modules as $index => $module)
<div class="module-form-container">
    <div class="module-form-header">
        <h3 class="module-form-title">Module {{ $index + 1 }}</h3>
        <button type="button" class="toggle-btn" onclick="toggleModule({{ $index }})">
            Toggle Form
        </button>
    </div>
    <div class="module-form-content active" id="module-{{ $index }}">
        <form action="{{ route('modules.store', ['course' => $course->id, 'module' => $module['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Module Basic Info -->
            <div class="form-group">
                <label for="module_name_{{ $index }}" class="form-label">Module Name</label>
                <input type="text" 
                       id="module_name_{{ $index }}" 
                       name="module_name" 
                       class="form-input" 
                       placeholder="Enter module name"
                       required>
            </div>

            <div class="form-group">
                <label for="lecture_count_{{ $index }}" class="form-label">Number of Lectures</label>
                <select id="lecture_count_{{ $index }}" 
                        name="lecture_count" 
                        class="form-select"
                        onchange="generateLectures({{ $index }}, this.value)"
                        required>
                    <option value="">Select number of lectures</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }} Lecture{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>

            <!-- Dynamic Lectures Container -->
            <div id="lectures-container-{{ $index }}" class="lectures-container" style="display: none;">
                <h4 class="lecture-title">Lecture Details</h4>
                <div id="lectures-list-{{ $index }}">
                    <!-- Lectures will be generated here -->
                </div>
            </div>

            <!-- Module Quiz Section -->
            <div class="quiz-section" style="margin-top: 2rem;">
                <div class="quiz-header">
                    <h5 class="quiz-title">Module {{ $index + 1 }} Quiz</h5>
                    <button type="button" class="add-quiz-btn" onclick="toggleModuleQuiz({{ $index }})">
                        Add Quiz
                    </button>
                </div>
                
                <div id="module-quiz-form-{{ $index }}" class="quiz-form">
                    <div class="form-group">
                        <label class="form-label">Quiz Title:</label>
                        <input type="text" name="module_quiz_title" class="form-input" placeholder="Enter quiz title">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Quiz Description:</label>
                        <textarea name="module_quiz_description" class="form-input" rows="3" placeholder="Enter quiz description"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Number of Questions:</label>
                        <input type="number" 
                               id="module_question_count_{{ $index }}" 
                               name="module_question_count" 
                               class="form-input form-input-small" 
                               min="1" 
                               max="20" 
                               value="5" 
                               onchange="generateModuleQuestions({{ $index }}, this.value)">
                    </div>

                    <div id="module-questions-section-{{ $index }}">
                        <!-- Questions will be generated here -->
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Save Module</button>
        </form>
    </div>
</div>
@endforeach

    </div>

    <script>
        // Toggle module form visibility
        function toggleModule(moduleIndex) {
            const content = document.getElementById(`module-${moduleIndex}`);
            content.classList.toggle('active');
        }

        // Generate lecture fields dynamically
        function generateLectures(moduleIndex, lectureCount) {
            const container = document.getElementById(`lectures-container-${moduleIndex}`);
            const lecturesList = document.getElementById(`lectures-list-${moduleIndex}`);
            
            if (lectureCount === '') {
                container.style.display = 'none';
                return;
            }

            container.style.display = 'block';
            lecturesList.innerHTML = '';

            for (let i = 1; i <= lectureCount; i++) {
                const lectureSection = document.createElement('div');
                lectureSection.className = 'lecture-section';
                lectureSection.innerHTML = `
                    <div class="lecture-title">Lecture ${i}</div>
                    
                    <div class="form-group">
                        <label for="lecture_name_${moduleIndex}_${i}" class="form-label">Lecture Name</label>
                        <input type="text" 
                               id="lecture_name_${moduleIndex}_${i}" 
                               name="lectures[${i-1}][name]" 
                               class="form-input" 
                               placeholder="Enter lecture ${i} name"
                               required>
                    </div>

                    <div class="file-upload-group">
                        <div class="file-input">
                            <label for="video_${moduleIndex}_${i}" class="form-label">Video Upload</label>
                            <input type="file" 
                                   id="video_${moduleIndex}_${i}" 
                                   name="lectures[${i-1}][video]" 
                                   accept="video/*">
                        </div>
                        
                        <div class="file-input">
                            <label for="pdf_${moduleIndex}_${i}" class="form-label">PDF Upload</label>
                            <input type="file" 
                                   id="pdf_${moduleIndex}_${i}" 
                                   name="lectures[${i-1}][pdf]" 
                                   accept=".pdf">
                        </div>
                    </div>
                `;
                lecturesList.appendChild(lectureSection);
            }
        }

        // Toggle module quiz form
        function toggleModuleQuiz(moduleIndex) {
            const quizForm = document.getElementById(`module-quiz-form-${moduleIndex}`);
            quizForm.classList.toggle('active');
            
            // Generate default questions if not already generated
            const questionsSection = document.getElementById(`module-questions-section-${moduleIndex}`);
            if (quizForm.classList.contains('active') && questionsSection.innerHTML === '') {
                generateModuleQuestions(moduleIndex, 5);
            }
        }

        // Generate module quiz questions
        function generateModuleQuestions(moduleIndex, questionCount) {
            const container = document.getElementById(`module-questions-section-${moduleIndex}`);
            if (!container) return;
            
            container.innerHTML = '';

            for (let q = 1; q <= questionCount; q++) {
                const questionDiv = document.createElement('div');
                questionDiv.className = 'question-section';
                questionDiv.innerHTML = `
                    <h4 class="question-title">Question ${q}</h4>
                    <div class="form-group">
                        <label class="form-label">Question Text:</label>
                        <input type="text" name="module_questions[${q-1}][text]" class="form-input" placeholder="Enter question ${q}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Number of Options:</label>
                        <input type="number" 
                               id="option_count_${moduleIndex}_${q}"
                               name="module_questions[${q-1}][option_count]" 
                               class="form-input form-input-small" 
                               min="2" 
                               max="6" 
                               value="4" 
                               onchange="generateModuleOptions(${moduleIndex}, ${q}, this.value)">
                    </div>

                    <div id="module-options-${moduleIndex}-${q}">
                        <!-- Options will be generated here -->
                    </div>
                `;
                container.appendChild(questionDiv);
                generateModuleOptions(moduleIndex, q, 4); // Default 4 options
            }
        }

        // Generate options for module quiz questions
        function generateModuleOptions(moduleIndex, questionIndex, optionCount) {
            const optContainer = document.getElementById(`module-options-${moduleIndex}-${questionIndex}`);
            if (!optContainer) return;
            
            optContainer.innerHTML = '';

            for (let o = 1; o <= optionCount; o++) {
                const optionDiv = document.createElement('div');
                optionDiv.className = 'option-group';
                optionDiv.innerHTML = `
                    <input type="text" 
                           name="module_questions[${questionIndex-1}][options][${o-1}][text]" 
                           class="option-input" 
                           placeholder="Option ${o}" 
                           required>
                    <input type="radio" 
                           name="module_questions[${questionIndex-1}][correct]" 
                           value="${o-1}" 
                           class="radio-input" 
                           id="correct_${moduleIndex}_${questionIndex}_${o}"
                           required>
                    <label class="radio-label" for="correct_${moduleIndex}_${questionIndex}_${o}">Correct</label>
                `;
                optContainer.appendChild(optionDiv);
            }
        }

        // Initialize the first module as expanded on page load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded - Module forms ready');
        });
    </script>
</body>
</html>