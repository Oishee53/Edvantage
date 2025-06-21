<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Courses - EDVANTAGE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #FFF2E0, #C0C9EE, #A2AADB); /* New color palette for the background */
      color: #2E2A47;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .courses-container {
      background: rgba(255, 255, 255, 0.85); /* Light background */
      padding: 40px;
      border-radius: 25px;
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 1200px;
      text-align: center;
      backdrop-filter: blur(15px);
    }

    h2 {
      font-size: 36px;
      font-weight: 700;
      color: #4B3F72;
      margin-bottom: 40px;
      text-align: center;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .course-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      padding: 0;
      list-style-type: none;
    }

    .course-card {
      background: #C0C9EE; /* Light Lavender background for card */
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      text-align: center;
    }

    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
      background: rgba(255, 255, 255, 0.8);
    }

    .course-img {
      max-width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .course-title {
      font-size: 22px;
      font-weight: 600;
      color: #4B3F72;
      text-decoration: none;
      margin-bottom: 10px;
      transition: color 0.3s ease;
    }

    .course-title:hover {
      color: #A2AADB; /* Light Blue-Purple on hover */
    }

    .course-description {
      font-size: 16px;
      color: #898AC4; /* Muted Purple */
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      body {
        padding: 20px;
      }

      .courses-container {
        padding: 20px;
        width: 100%;
      }

      .course-title {
        font-size: 18px;
      }

      .course-description {
        font-size: 14px;
      }
    }

  </style>
</head>
<body>

  <div class="courses-container">
    <h2>My Courses</h2>

    <div class="course-list">
      @foreach ($enrolledCourses as $course)
        <div class="course-card">
          <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="course-img">
          <a href="{{ route('user.course.modules', $course->id) }}" class="course-title">{{ $course->title }}</a>
          <p class="course-description">{{ $course->description }}</p>
        </div>
      @endforeach
    </div>
  </div>

</body>
</html>
