<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EDVANTAGE | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --cream: #FFF2E0;
            --light: #CBD4F4;
            --mid: #A9B2DD;
            --slate: #8F95C6;
            --deep: #7E82B2;
            --text-dark: #1f1f2e;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, rgba(106, 76, 156, 0.7), rgba(78, 42, 132, 0.7)), 
                url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=2071&q=80') center/cover no-repeat fixed;
    color: var(--text-dark);
    min-height: 100vh;
    padding: 15px;
}


        .container {
            max-width: 1000px;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .top-bar h2 {
            font-size: 20px;
            font-weight: bold;
            color: var(--text-dark);
        }

        .emoji {
            display: inline-block;
            animation: wave 2s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(20deg); }
            75% { transform: rotate(-10deg); }
        }

        .icons a {
            font-size: 18px;
            text-decoration: none;
            margin-left: 10px;
            padding: 8px 12px;
            background: var(--light);
            border-radius: 50%;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .icons a:hover {
            background: var(--mid);
            transform: translateY(-2px);
        }

        .header {
            text-align: center;
            margin: 20px 0;
        }

        .header h1 {
            font-size: 38px;
            background: linear-gradient(to right, var(--slate), var(--deep));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header p {
            font-size: 16px;
            margin-top: 5px;
            color: #3f3f50;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 8px 15px;
            border-radius: 8px;
            border: 1px solid #c3e6cb;
            margin-bottom: 15px;
            text-align: center;
        }

        .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .hero {
            background: var(--light);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .hero h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .hero p {
            font-size: 14px;
            color: #444;
            max-width: 85%;
            margin: auto;
            line-height: 1.4;
        }

        .nav-card {
            background: var(--slate);
            padding: 25px;
            border-radius: 20px;
            color: white;
        }

        .nav-card h4 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .nav-card ul {
            list-style: none;
            padding-left: 0;
        }

        .nav-card li {
            margin-bottom: 12px;
        }

        .nav-card a {
            text-decoration: none;
            background: var(--deep);
            display: block;
            padding: 10px 18px;
            border-radius: 10px;
            color: white;
            transition: 0.3s ease;
        }

        .nav-card a:hover {
            background: var(--mid);
        }

        .logout-btn {
            margin-top: 20px;
            background: #EF4444;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .logout-btn:hover {
            background: #B91C1C;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.75);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h2 {
            font-size: 26px;
            margin-bottom: 5px;
            color: var(--text-dark);
        }

        .stat-card p {
            font-size: 12px;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .hero h3 {
                font-size: 22px;
            }

            .hero p {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @php
            $lastName = explode(' ', $user->name);
            $lastName = end($lastName);
        @endphp

        <div class="top-bar">
            <h2>Welcome, {{ $lastName }} <span class="emoji">👋</span></h2>
            <div class="icons">
                <a href="{{ route('cart.all') }}" title="Cart">🛒</a>
                <a href="{{ route('wishlist.all') }}" title="Wishlist">🖤</a>
            </div>
        </div>

        <div class="header">
            <h1>EDVANTAGE</h1>
            <p>Your gateway to explore learning opportunities</p>
        </div>

        <div class="grid">
            <div class="hero">
                <h3>Unlock Your Learning Potential</h3>
                <p>Join thousands of learners advancing their careers with top-rated courses and interactive content tailored to your journey.</p>
            </div>

            <div class="nav-card">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('profile') }}"> View Profile</a></li>
                    <li><a href="{{ route('courses.enrolled') }}"> Courses Enrolled</a></li>
                    <li><a href="{{ route('courses.all') }}"> All Courses</a></li>
                    <li><a href="/user/dashboard"> Dashboard</a></li>
                    <li><a href="/purchase_history"> Purchase History</a></li>
                </ul>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn"> Logout</button>
                </form>
            </div>
        </div>

        <div class="stats">
            <div class="stat-card">
                <h2>500+</h2>
                <p>Courses</p>
            </div>
            <div class="stat-card">
                <h2>50K+</h2>
                <p>Students</p>
            </div>
            <div class="stat-card">
                <h2>95%</h2>
                <p>Success Rate</p>
            </div>
        </div>
    </div>

</body>
</html>
