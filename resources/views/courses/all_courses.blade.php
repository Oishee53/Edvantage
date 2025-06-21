<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Courses - EDVANTAGE</title>
  <style>
    :root {
      --cream: #FFF2E0;
      --light-purple: #CCD3F3;
      --mid-purple: #B1B9E8;
      --deep-purple: #949CDC;
      --action-purple: #6A5ACD;
      --action-purple-hover: #5849b4;
      --text-dark: #2F2F2F;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom, var(--cream), var(--light-purple));
      color: var(--text-dark);
      min-height: 100vh;
      padding: 40px 20px;
    }

    .courses-container {
      max-width: 1200px;
      margin: 0 auto;
      background-color: white;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: var(--deep-purple);
      font-size: 2.5rem;
      margin-bottom: 40px;
    }

    .alert {
      background-color: #d4edda;
      color: #155724;
      padding: 15px;
      border: 1px solid #c3e6cb;
      border-radius: 8px;
      text-align: center;
      margin-bottom: 30px;
    }

    .course-item {
      display: flex;
      align-items: center;
      background-color: var(--light-purple);
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 25px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
    }

    .course-item:hover {
      transform: translateY(-5px);
    }

    .course-item img {
      width: 200px;
      height: 160px;
      object-fit: cover;
      flex-shrink: 0;
    }

    .course-content {
      flex: 1;
      padding: 20px 25px;
    }

    .course-content h3 {
      font-size: 1.6rem;
      color: #333;
      margin-bottom: 12px;
    }

    .course-content p {
      font-size: 1rem;
      color: #444;
      margin-bottom: 15px;
    }

    .actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .actions a,
    .actions button {
      padding: 10px 20px;
      font-size: 0.95rem;
      font-weight: 600;
      color: white;
      background-color: var(--action-purple);
      border: none;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .actions a:hover,
    .actions button:hover {
      background-color: var(--action-purple-hover);
    }

    @media (max-width: 768px) {
      .course-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .course-item img {
        width: 100%;
        height: auto;
      }

      .course-content {
        padding: 20px;
      }

      .actions {
        flex-direction: column;
        width: 100%;
      }

      .actions a,
      .actions button {
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <div class="courses-container">
    @if(session('success'))
      <div class="alert">
        {{ session('success') }}
      </div>
    @endif

    <h2>All Courses</h2>

    @foreach($courses as $course)
      <div class="course-item">
        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image">
        <div class="course-content">
          <h3>{{ $course->title }}</h3>
          <p>{{ $course->description }}</p>
          <div class="actions">
            <a href="{{ route('courses.details', $course->id) }}">🔍 Details</a>
            <form action="{{ route('cart.add', $course->id) }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit">🛒 Add to Cart</button>
            </form>
            <form action="{{ route('wishlist.add', $course->id) }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit">🖤 Add to Wishlist</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if(session('cart_added'))
    <script>
      if (confirm("{{ session('cart_added') }} Go to cart?")) {
        window.location.href = "{{ route('cart.all') }}";
      }
    </script>
  @endif

</body>
</html>
