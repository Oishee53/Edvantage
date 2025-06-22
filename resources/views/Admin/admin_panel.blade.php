<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #333;
      min-height: 100vh;
      overflow-x: hidden;
      display: flex;
    }

    .sidebar {
      width: 280px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(15px);
      height: 100vh;
      padding: 2rem 1rem;
      box-shadow: 5px 0 20px rgba(0, 0, 0, 0.1);
      position: fixed;
      left: 0;
      top: 0;
      z-index: 100;
    }

    .sidebar h2 {
      font-size: 1.6rem;
      color: #667eea;
      margin-bottom: 2rem;
      text-align: center;
    }

    .sidebar a {
      display: block;
      margin: 10px 0;
      padding: 12px 20px;
      border-radius: 10px;
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .sidebar a:hover {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
    }

    .main-content {
      margin-left: 280px;
      flex: 1;
      padding: 2rem;
    }

    .header {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      padding: 1rem 2rem;
      border-radius: 12px;
      margin-bottom: 2rem;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 1.8rem;
      font-weight: bold;
      color: #667eea;
      text-decoration: none;
    }

    .admin-container {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .admin-container p {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 2rem;
    }

    .admin-container button {
      margin-top: 20px;
      padding: 12px 24px;
      font-size: 1rem;
      font-weight: bold;
      color: white;
      background: #7c3aed;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .admin-container button:hover {
      background: #6d28d9;
      transform: scale(1.05);
      box-shadow: 0 0 12px #d8b4fe;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        left: -100%;
        transition: left 0.3s ease;
      }

      .sidebar.active {
        left: 0;
      }

      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <nav class="sidebar" id="sidebar">
    <h2>EDVANTAGE</h2>
    <a href="/admin_panel/manage_courses"><i class="fas fa-book"></i> Course Management</a>
    <a href="/admin_panel/manage_resources"><i class="fas fa-folder-open"></i> Resource Management</a>
    <a href="/admin_panel/manage_user"><i class="fas fa-users-cog"></i> User Management</a>
  </nav>

  <!-- Main Content -->
  <main class="main-content">
    <header class="header">
      <a href="/" class="logo">EDVANTAGE</a>
    </header>

    <div class="admin-container">
      @auth
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <form action="/logout" method="POST">
          @csrf
          <button>Logout</button>
        </form>
      @else
        <p>You are not logged in.</p>
        <a href="/">Go to Login</a>
      @endauth
    </div>
  </main>
</body>
</html>
