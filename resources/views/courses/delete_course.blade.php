<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            padding-top: 70px;
        }
        h2 {
            color: #facc15;
        }
        .table-dark-custom {
            background-color: #343a40;
            color: #fff;
        }
        .table-dark-custom th {
            background-color: #495057;
            color: #facc15;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
        a.back-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #212529;
            text-decoration: none;
        }
        a.back-link:hover {
            color: #facc15;
        }
    </style>
</head>
<body>
    <!-- Admin Panel Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Delete Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        @auth
        <h2 class="text-center my-4">Delete A Course</h2>

        @if($courses->isEmpty())
            <p class="text-center fst-italic">No courses available.</p>
        @else
            <div class="table-responsive">
                <table class="table table-dark-custom table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
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
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->video_count }}</td>
                            <td>{{ $course->approx_video_length }} mins</td>
                            <td>{{ $course->total_duration }} hrs</td>
                            <td>{{ $course->price }}</td>
                            <td>{{ $course->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <form action="/admin_panel/manage_courses/delete-course" method="POST" class="my-4">
                @csrf
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Enter Course Title to Delete" required>
                </div>
                <button type="submit" class="btn btn-danger">
                    ❌ Delete Course
                </button>
            </form>
        @endif

        <a href="/admin_panel/manage_courses" class="back-link">← Back to Manage Courses</a>
        @else
        <p class="text-center">You are not logged in. <a href="/">Go to Login</a></p>
        @endauth
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
