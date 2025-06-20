<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses - EDVANTAGE</title>
    <style>
        /* Global Style */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(106, 76, 156, 0.8), rgba(78, 42, 132, 0.8)),
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=2071&q=80') center/cover no-repeat fixed;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 0.9rem;  /* Smaller font size */
            text-align: center;
        }

        /* Course Container */
        .courses-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.3); /* Transparent white background */
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
        }

        h2 {
            font-size: 1.8rem;  /* Smaller font size */
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            color: #fff;
            letter-spacing: 1px;
        }

        .course-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #C0C9EE; /* Light Purple */
            padding: 15px;  /* Smaller padding */
            border-radius: 15px;
            margin-bottom: 15px;  /* Smaller margin */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .course-item img {
            width: 100px;  /* Smaller image size */
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;  /* Smaller margin */
        }

        .course-item h3 {
            font-size: 1.2rem;  /* Smaller course title font size */
            color: #333;
            margin-bottom: 8px;  /* Smaller margin */
        }

        .course-item p {
            font-size: 0.9rem;  /* Smaller course description font size */
            color: #666;
            margin-bottom: 8px;  /* Smaller margin */
            flex-grow: 1;
        }

        .course-item .actions {
            display: flex;
            align-items: center;
        }

        .actions a, .actions button {
            text-decoration: none;
            color: white;
            background: #7C3AED; /* Purple */
            padding: 6px 12px;  /* Smaller padding */
            margin-right: 8px;  /* Smaller margin */
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;  /* Smaller font size */
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .actions a:hover, .actions button:hover {
            background: #6D28D9;
        }

        .actions button {
            background: #EF4444; /* Red */
            border: none;
        }

        .actions button:hover {
            background: #B91C1C;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;  /* Smaller font size for mobile */
            }

            .course-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .course-item img {
                width: 80px;  /* Smaller image size */
                height: 80px;
                margin-bottom: 15px;
            }

            .actions {
                flex-direction: column;
                align-items: flex-start;
            }

            .actions a, .actions button {
                margin-right: 0;
                margin-bottom: 8px;  /* Smaller margin */
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
                <div>
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->description }}</p>
                </div>
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
