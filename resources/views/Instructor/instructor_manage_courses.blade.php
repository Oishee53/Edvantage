<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Courses</title>
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
      --success-color: #059669;
      --warning-color: #f59e0b;
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

    .logout-button, .login-button, .signup-button {
      padding: 0.5rem 0.75rem;
      border-radius: 0.25rem;
      border: none;
      cursor: pointer;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }

    .logout-button, .signup-button {
      background-color: var(--primary-color);
      color: white;
    }

    .logout-button:hover, .signup-button:hover {
      opacity: 0.9;
    }

    .login-button {
      border: 1px solid var(--primary-color);
      color: var(--primary-color);
      background-color: transparent;
    }

    .login-button:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .auth-buttons {
      display: flex;
      gap: 0.5rem;
    }

    /* Search and Add Section */
    .search-add-section {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      padding: 1.5rem;
      margin-bottom: 2rem;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .search-input {
      flex: 1;
      border: 1px solid var(--border-color);
      border-radius: 0.375rem;
      padding: 0.75rem 1rem;
      outline: none;
      transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
      font-size: 0.875rem;
    }

    .search-input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(14, 27, 51, 0.1);
    }

    .add-course-button {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background-color: var(--primary-color);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 0.375rem;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease-in-out;
      border: none;
      cursor: pointer;
      font-size: 0.875rem;
    }

    .add-course-button:hover {
      background-color: #1a2645;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(14, 27, 51, 0.2);
    }

    /* Section Headers */
    .section-header {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--primary-color);
      margin: 2rem 0 1rem 0;
      padding-left: 0.5rem;
      border-left: 4px solid var(--primary-color);
    }

    .section-header:first-of-type {
      margin-top: 1rem;
    }

    /* Table */
    .table-wrapper {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      overflow: hidden;
      margin-bottom: 2rem;
    }

    .courses-table {
      width: 100%;
      font-size: 0.875rem;
      color: var(--text-gray-700);
      border-collapse: collapse;
    }

    .courses-table thead {
      background-color: var(--edit-bg);
      color: var(--primary-color);
    }

    .courses-table th {
      padding: 1rem 1.5rem;
      text-align: left;
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      border-bottom: 1px solid var(--border-color);
    }

    .courses-table td {
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--border-color);
      vertical-align: middle;
    }

    .courses-table tbody tr:hover {
      background-color: var(--body-background);
    }

    .courses-table tbody tr:last-child td {
      border-bottom: none;
    }

    .course-image {
      width: 6rem;
      height: 4rem;
      object-fit: cover;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .course-title-link {
      color: var(--primary-color);
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease-in-out;
    }

    .course-title-link:hover {
      text-decoration: underline;
      color: #1a2645;
    }

    .course-description {
      max-width: 20rem;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      color: var(--text-gray-600);
    }

    .course-price {
      color: var(--success-color);
      font-weight: 700;
      font-size: 1rem;
    }

    .no-image-text {
      color: var(--text-gray-500);
      font-style: italic;
      font-size: 0.75rem;
    }

    .status-submitted {
      color: var(--success-color);
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .status-not-submitted {
      color: var(--warning-color);
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* Action Buttons */
    .actions-container {
      display: flex;
      gap: 0.5rem;
      align-items: center;
    }

    .edit-button {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background-color: var(--edit-bg);
      color: var(--edit-text);
      padding: 0.5rem 0.75rem;
      border-radius: 0.375rem;
      font-weight: 500;
      font-size: 0.75rem;
      border: none;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s ease-in-out;
    }

    .edit-button:hover {
      background-color: #dbeafe;
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(14, 27, 51, 0.1);
    }

    .delete-button {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: var(--delete-bg);
      color: var(--delete-icon);
      width: 2rem;
      height: 2rem;
      border-radius: 0.375rem;
      border: none;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
    }

    .delete-button:hover {
      background-color: #fee2e2;
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(220, 38, 38, 0.2);
    }

    .edit-icon, .delete-icon {
      width: 0.875rem;
      height: 0.875rem;
    }

    .delete-icon {
      width: 1rem;
      height: 1rem;
    }

    /* No courses message */
    .no-courses {
      text-align: center;
      color: var(--text-gray-500);
      font-style: italic;
      padding: 3rem 2rem;
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      margin-bottom: 2rem;
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

      .search-add-section {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
      }

      .table-wrapper {
        overflow-x: auto;
      }

      .courses-table {
        min-width: 800px;
      }
    }

    /* Icons */
    .icon {
      width: 16px;
      height: 16px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="/image/Edvantage.png" alt="Edvantage Logo">
      <span></span>
    </div>
    <nav class="sidebar-nav">
      <a href="/instructor_homepage">Dashboard</a>
      <a href="/instructor/manage_courses" class="active">Manage Course</a>
      <a href="/instructor/manage_resources/add">Manage Resources</a>
    </nav>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="main-wrapper">
    <!-- Main Content -->
    <main class="main-content">
      <!-- Top bar -->
      <div class="top-bar">
        <div class="top-bar-title">Manage Courses</div>
        @auth
          <div class="user-info">
            <span>{{ auth()->user()->name }}</span>
            <form action="/logout" method="POST" style="display: inline;">
              @csrf
              <button class="logout-button">Logout</button>
            </form>
          </div>
        @else
          <div class="auth-buttons">
            <a href="/login" class="login-button">Login</a>
            <a href="/register" class="signup-button">Sign Up</a>
          </div>
        @endauth
      </div>

      @auth
      <!-- Search and Add Section -->
      <div class="search-add-section">
        <input type="text" placeholder="Search courses..." class="search-input" />
        <form action="/manage_courses/add" method="GET">
          <button type="submit" class="add-course-button">
            <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add Course
          </button>
        </form>
      </div>

      <!-- Approved Courses Section -->
      <p class="section-header">Approved Courses</p>
      @if(isset($courses) && $courses->isEmpty())
          <div class="no-courses">No courses available.</div>
      @else
      <div class="table-wrapper">
          <table class="courses-table">
              <thead>
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
              </thead>
              <tbody>
                  @foreach($courses as $course)
                  <tr>
                      <td>
                          @if($course->image)
                              <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image">
                          @else
                              <span class="no-image-text">No image</span>
                          @endif
                      </td>
                      <td>
                          <a href="/admin/manage_courses/courses/{{ $course->id }}/edit" class="course-title-link">{{ $course->title }}</a>
                      </td>
                      <td class="course-description">{{ $course->description }}</td>
                      <td>{{ $course->category }}</td>
                      <td>{{ $course->video_count }}</td>
                      <td>{{ $course->approx_video_length }} mins</td>
                      <td>{{ $course->total_duration }} hrs</td>
                      <td class="course-price">{{ $course->price }}</td>
                      <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @endif

      <!-- Pending Courses Section -->
      <p class="section-header">Pending Courses</p>
      @if(isset($pendingCourses) && $pendingCourses->isEmpty())
          <div class="no-courses">No pending courses available.</div>
      @else
      <div class="table-wrapper">
          <table class="courses-table">
              <thead>
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
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($pendingCourses as $course)
                  <tr>
                      <td>
                          @if($course->image)
                              <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image">
                          @else
                              <span class="no-image-text">No image</span>
                          @endif
                      </td>
                      <td>
                          <a href="/admin/manage_courses/courses/{{ $course->id }}/edit" class="course-title-link">{{ $course->title }}</a>
                      </td>
                      <td class="course-description">{{ $course->description }}</td>
                      <td>{{ $course->category }}</td>
                      <td>{{ $course->video_count }}</td>
                      <td>{{ $course->approx_video_length }} mins</td>
                      <td>{{ $course->total_duration }} hrs</td>
                      <td class="course-price">{{ $course->price }}</td>
                      <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
                      <td>
                        @if(\App\Models\CourseNotification::where('pending_course_id', $course->id)->exists())
                          <span class="status-submitted">Submitted</span>
                        @else
                          <span class="status-not-submitted">Not Submitted</span>
                        @endif
                      </td>
                      <td>
                        <div class="actions-container">
                          <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="GET">
                            <button type="submit" class="edit-button">
                              <svg class="edit-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                              Edit
                            </button>
                          </form>
                          <form action="/admin_panel/manage_courses/delete-course/{{ $course->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this course?');">
                              <svg class="delete-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                              </svg>
                            </button>
                          </form>
                        </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @endif

      @else
      <div class="not-logged-in-container">
        <div class="not-logged-in">
          <p>You are not logged in. <a href="/" class="login-link">Go to Login</a></p>
        </div>
      </div>
      @endauth
    </main>
  </div>
</body>
</html>