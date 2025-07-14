<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Course | Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts for logo font similarity -->
  <link href="https://fonts.googleapis.com/css2?family=Georgia:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --logo-blue: #0057b8;
      --primary: #2563eb;
      --primary-hover: #1d4ed8;
      --secondary: #f3f4f6;
      --accent: #f59e42;
      --danger: #ef4444;
      --text: #1e293b;
      --muted: #64748b;
      --background: #f8fafc;
      --white: #fff;
      --border: #e5e7eb;
      --shadow: 0 2px 12px 0 rgba(30, 41, 59, 0.07);
    }
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(120deg, #e3edfa 0%, #f8fafc 100%);
      font-family: 'Inter', Arial, sans-serif;
      color: var(--text);
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: var(--white);
      padding: 1.2rem 2rem;
      border-bottom: 1px solid var(--border);
      box-shadow: var(--shadow);
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .navbar .logo {
      font-family: 'Georgia', serif;
      font-size: 2rem;
      font-weight: bold;
      color: var(--logo-blue);
      letter-spacing: -1px;
      user-select: none;
    }
    .navbar .admin-panel-link {
      display: inline-block;
      background: var(--primary);
      color: var(--white);
      font-weight: 600;
      font-size: 1rem;
      border: none;
      border-radius: 0.5rem;
      padding: 0.6rem 1.2rem;
      cursor: pointer;
      text-decoration: none;
      transition: none;
      box-shadow: 0 2px 6px 0 rgba(37, 99, 235, 0.07);
    }
    .navbar .admin-panel-link:focus,
    .navbar .admin-panel-link:hover {
      background: var(--primary);
      color: var(--white);
      transform: none;
      text-decoration: none;
    }
    .edit-card {
      background: var(--white);
      max-width: 480px;
      margin: 2.5rem auto;
      padding: 2.5rem 2rem 2rem 2rem;
      border-radius: 1.2rem;
      box-shadow: var(--shadow);
      border: 2.5px solid var(--primary);
      position: relative;
      overflow: hidden;
    }
    /* Progress bar at the top */
    .progress-bar {
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, var(--primary) 75%, var(--secondary) 75%);
      border-radius: 4px 4px 0 0;
      margin-bottom: 1.2rem;
    }
    .edit-card h2 {
      font-size: 1.4rem;
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 1.3rem;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
      position: relative;
    }
    .form-group .input-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--primary);
      font-size: 1rem;
      opacity: 0.8;
      pointer-events: none;
    }
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group select,
    .form-group textarea {
      padding-left: 2.2rem;
    }
    label {
      font-size: 1rem;
      font-weight: 500;
      color: var(--text);
    }
    .required {
      color: var(--danger);
      font-size: 1rem;
      margin-left: 0.2rem;
    }
    input[type="text"],
    input[type="number"],
    textarea,
    select {
      padding: 0.7rem 0.9rem;
      border: 1px solid var(--border);
      border-radius: 0.5rem;
      font-size: 1rem;
      background: var(--secondary);
      color: var(--text);
      transition: border 0.2s;
      outline: none;
      resize: vertical;
    }
    input:focus,
    textarea:focus,
    select:focus {
      border-color: var(--primary);
      background: #e0e7ff;
    }
    textarea {
      min-height: 80px;
      max-height: 180px;
      padding-left: 2.2rem;
    }
    .current-image {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 0.7rem;
      margin: 0.5rem 0;
      border: 1px solid var(--border);
      display: block;
    }
    small {
      color: var(--muted);
      font-size: 0.92rem;
    }
    .section-divider {
      border: none;
      border-top: 1.5px dashed var(--border);
      margin: 1.6rem 0 1.1rem 0;
      width: 100%;
    }
    button[type="submit"] {
      background: var(--primary);
      color: var(--white);
      font-weight: 600;
      font-size: 1.1rem;
      border: none;
      border-radius: 0.5rem;
      padding: 0.8rem 0;
      cursor: pointer;
      margin-top: 0.7rem;
      box-shadow: 0 2px 6px 0 rgba(37, 99, 235, 0.07);
      transition: none;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      justify-content: center;
    }
    button[type="submit"]:focus,
    button[type="submit"]:hover {
      background: var(--primary);
      box-shadow: 0 2px 6px 0 rgba(37, 99, 235, 0.07);
      transform: none;
    }
    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
      margin-top: 1.4rem;
      transition: none;
    }
    .back-link:hover {
      color: var(--primary);
      text-decoration: none;
    }
    .auth-error {
      color: var(--danger);
      background: #fef2f2;
      padding: 1.2rem 1rem;
      border-radius: 0.7rem;
      text-align: center;
      margin-top: 2rem;
      font-size: 1.05rem;
    }
    .auth-error a {
      color: var(--primary);
      text-decoration: underline;
      margin-left: 0.4rem;
      font-weight: 500;
      transition: none;
    }
    .auth-error a:hover {
      color: var(--primary);
    }
    @media (max-width: 600px) {
      .edit-card {
        padding: 1.2rem 0.6rem;
        max-width: 98vw;
      }
      .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.8rem;
        padding: 1rem 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Top Navbar -->
  <div class="navbar">
    <div class="logo">Edvantage</div>
    <a href="/admin_panel" class="admin-panel-link"><i class="fas fa-user-circle"></i> Admin Panel</a>
  </div>

  <div class="edit-card">
    <div class="progress-bar"></div>
    @auth
    <h2><i class="fas fa-pen-to-square"></i> Edit Course</h2>
    <form action="/admin/manage_courses/courses/{{ $course->id }}/edit" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label>Course Image</label>
        <span class="input-icon"><i class="fas fa-image"></i></span>
        @if($course->image)
          <small>Current Image:</small>
          <img src="{{ asset('storage/' . $course->image) }}" class="current-image" alt="{{ $course->title }}">
          <small>Choose new image to replace:</small>
        @else
          <small>No image uploaded.</small>
        @endif
        <input type="file" name="image" accept="image/*" style="padding-left:2.2rem;" />
      </div>

      <div class="form-group">
        <label for="title">Course Title <span class="required">*</span></label>
        <span class="input-icon"><i class="fas fa-heading"></i></span>
        <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" required />
      </div>

      <div class="form-group">
        <label for="description">Course Description</label>
        <span class="input-icon"><i class="fas fa-align-left"></i></span>
        <textarea id="description" name="description">{{ old('description', $course->description) }}</textarea>
      </div>

      <div class="form-group">
        <label for="category">Category <span class="required">*</span></label>
        <span class="input-icon"><i class="fas fa-list"></i></span>
        <select id="category" name="category" required>
          <option value="">Select Category</option>
          <option value="Web Development" {{ old('category', $course->category) == 'Web Development' ? 'selected' : '' }}>Web Development</option>
          <option value="Mobile Development" {{ old('category', $course->category) == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
          <option value="Data Science" {{ old('category', $course->category) == 'Data Science' ? 'selected' : '' }}>Data Science</option>
          <option value="Machine Learning" {{ old('category', $course->category) == 'Machine Learning' ? 'selected' : '' }}>Machine Learning</option>
          <option value="Design" {{ old('category', $course->category) == 'Design' ? 'selected' : '' }}>Design</option>
          <option value="Business" {{ old('category', $course->category) == 'Business' ? 'selected' : '' }}>Business</option>
          <option value="Marketing" {{ old('category', $course->category) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
          <option value="Other" {{ old('category', $course->category) == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="video_count">Number of Videos <span class="required">*</span></label>
        <span class="input-icon"><i class="fas fa-video"></i></span>
        <input type="number" id="video_count" name="video_count" value="{{ old('video_count', $course->video_count) }}" min="1" required />
      </div>

      <div class="form-group">
        <label for="approx_video_length">Approx. Video Length (minutes) <span class="required">*</span></label>
        <span class="input-icon"><i class="fas fa-clock"></i></span>
        <input type="number" id="approx_video_length" name="approx_video_length" value="{{ old('approx_video_length', $course->approx_video_length) }}" min="1" required />
      </div>

      <div class="form-group">
        <label for="total_duration">Total Duration (hours) <span class="required">*</span></label>
        <span class="input-icon"><i class="fas fa-hourglass-half"></i></span>
        <input type="number" id="total_duration" name="total_duration" value="{{ old('total_duration', $course->total_duration) }}" step="0.1" min="0.1" required />
      </div>

      <div class="form-group">
        <label for="price">Price (৳) <span class="required">*</span></label>
        <span class="input-icon"><i class="fas fa-coins"></i></span>
        <input type="number" id="price" name="price" value="{{ old('price', $course->price) }}" step="0.1" min="0" required />
      </div>

      <hr class="section-divider" />

      <button type="submit"><i class="fas fa-save"></i> Update Course</button>
    </form>

    <a href="/admin_panel" class="back-link"><i class="fas fa-arrow-left"></i> Back to Home Page</a>
    @else
      <p class="auth-error">You are not logged in.<a href="/">Go to Login</a></p>
    @endauth
  </div>
</body>
</html>
