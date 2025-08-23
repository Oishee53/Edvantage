<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Courses</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    /* Replaced Tailwind CSS with custom CSS variables and styles to match Dashboard theme */
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
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--body-background);
      margin: 0;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 16rem;
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
      color:  #0E1B33;
    }

    .sidebar-nav a.active {
      background-color: var(--primary-light-hover-bg);
      color: #0E1B33;
    }

    /* Main Content Wrapper */
    .main-wrapper {
      margin-left: 15rem;
      flex: 1;
    }

    /* Top bar */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background-color: var(--card-background);
      border-bottom: 1px solid var(--border-color);
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
      transition: opacity 0.2s ease-in-out;
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
      background-color: var(--primary-light-hover-bg);
      color: white;
    }

    .auth-buttons {
      display: flex;
      gap: 0.5rem;
    }

    /* Main Content */
    .main-content {
      padding: 2rem;
    }

    /* Search and Add Section */
    .search-add-section {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .search-input {
      flex: 1;
      border: 1px solid #d1d5db;
      border-radius: 0.25rem;
      padding: 0.5rem 1rem;
      outline: none;
      transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .search-input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(14, 27, 51, 0.2);
    }

    .add-course-button {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      border: 1px solid var(--primary-color);
      color: var(--primary-color);
      background-color: transparent;
      padding: 0.5rem 1rem;
      border-radius: 0.25rem;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
      margin-left: auto;
    }

    .add-course-button:hover {
      background-color: var(--primary-color);
      color: white;
    }

    /* Table */
    .table-wrapper {
      background-color: var(--card-background);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      overflow-x: auto;
    }

    .courses-table {
      min-width: 100%;
      font-size: 0.875rem;
      color: var(--text-gray-700);
      border-collapse: collapse;
    }

    .courses-table thead {
      color: var(--text-gray-500);
      border-bottom: 1px solid var(--border-color);
    }

    .courses-table th {
      padding: 0.75rem 1.5rem;
      text-align: left;
      font-weight: 500;
    }

    .courses-table td {
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--border-color);
    }

    .courses-table tbody tr:last-child td {
      border-bottom: none;
    }

    .course-image {
      width: 6rem;
      height: 4rem;
      object-fit: cover;
      border-radius: 0.375rem;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .course-title-link {
      color: var(--primary-color);
      font-weight: 500;
      text-decoration: none;
      transition: text-decoration 0.2s ease-in-out;
    }

    .course-title-link:hover {
      text-decoration: underline;
    }

    .course-description {
      max-width: 20rem;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .course-price {
      color: var(--green-600);
      font-weight: 700;
    }

    .no-image-text {
      color: #9ca3af;
      font-style: italic;
    }

    /* Action Buttons */
    .actions-container {
      display: flex;
      gap: 0.5rem;
    }

    .edit-button {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background-color: var(--edit-bg);
      color: var(--edit-text);
      padding: 0.25rem 0.75rem;
      border-radius: 0.5rem;
      font-weight: 500;
      font-size: 0.75rem;
      border: none;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.2s ease-in-out;
    }

    .edit-button:hover {
      background-color: #dbeafe;
    }

    .delete-button {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: var(--delete-bg);
      color: var(--delete-icon);
      width: 1.75rem;
      height: 1.75rem;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
      transition: background-color 0.2s ease-in-out;
    }

    .delete-button:hover {
      background-color: #fee2e2;
    }

    .edit-icon, .delete-icon {
      width: 0.75rem;
      height: 0.75rem;
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
    }

    .not-logged-in {
      text-align: center;
      color: var(--text-gray-700);
    }

    .login-link {
      color: var(--primary-color);
      text-decoration: none;
      transition: text-decoration 0.2s ease-in-out;
    }

    .login-link:hover {
      text-decoration: underline;
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
      <a href="/admin_panel">Dashboard</a>
      <a href="/admin_panel/manage_courses" class="active">Manage Course</a>
      <a href="/admin_panel/manage_user">Manage User</a>
      <a href="/admin_panel/manage_resources">Manage Resources</a>
      <a href="/pending-courses">Manage Pending Courses</a>
    </nav>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="main-wrapper">
    <!-- Top bar -->
    <header class="top-bar">
      <h1 class="top-bar-title">Manage Courses</h1>
      @auth
        <div class="user-info">
          <span>{{ auth()->user()->name }}</span>
          <form action="/logout" method="POST">
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
    </header>

    <!-- Main Content -->
    <section class="main-content">
      @auth
      <div class="search-add-section">
        <input type="text" placeholder="Search courses..." class="search-input" />

        <form action="/manage_courses/add" method="GET">
          <button type="submit" class="add-course-button">
            Add Course
          </button>
        </form>
      </div>

      @if(isset($courses) && $courses->isEmpty())
          <p class="no-courses">No courses available.</p>
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
                      <th>Actions</th>
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
                      <td>
                        <div class="actions-container">
                          <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="GET">
                            <button type="submit" class="edit-button">
                              <svg class="edit-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l5-5m-5 5v5h5m-5-5H4m5 0L4 20l5-5"/>
                              </svg>
                              Edit
                            </button>
                          </form>
                          <form action="/admin_panel/manage_courses/delete-course/{{ $course->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this course?');">
                              <svg class="delete-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-3h4a1 1 0 011 1v1H9V5a1 1 0 011-1z" />
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
      <p class="not-logged-in">You are not logged in. <a href="/" class="login-link">Go to Login</a></p>
      @endauth
    </section>
  </div>

</body>
</html>
