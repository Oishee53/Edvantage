<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Courses - Edvantage</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --accent: #3b82f6;
      --sidebar-bg: linear-gradient(180deg, #2563eb 0%, #1e40af 100%);
      --card-bg: #fff;
      --card-shadow: 0 8px 32px rgba(30,64,175,0.10);
      --sidebar-width: 270px;
      --transition: 0.25s cubic-bezier(.4,0,.2,1);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      min-height: 100vh;
      background-color: #f4f6fb;
      color: #1e293b;
      font-size: 1.08rem;
    }
    .sidebar {
      width: var(--sidebar-width);
      background: var(--sidebar-bg);
      color: #fff;
      padding: 36px 20px 20px 20px;
      display: flex;
      flex-direction: column;
      align-items: stretch;
      box-shadow: 2px 0 16px rgba(30,64,175,0.06);
      position: relative;
    }
    .logo {
      font-size: 1.35rem;
      font-weight: 700;
      letter-spacing: 1.5px;
      color: #fff;
      text-align: center;
      margin-bottom: 36px;
      text-shadow: 0 2px 8px rgba(0,0,0,0.07);
    }
    .sidebar-nav {
      flex: 1;
    }
    .sidebar a {
      color: #e0e7ff;
      text-decoration: none;
      margin: 8px 0;
      font-weight: 500;
      padding: 12px 18px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 1.08rem;
      outline: none;
      background: none;
      box-shadow: none;
      transition: background var(--transition), color var(--transition);
      cursor: pointer;
    }
    .sidebar a:hover,
    .sidebar a:focus {
      background: var(--primary);
      color: #fff;
    }
    .sidebar .profile {
      margin-top: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 0 0 0;
      border-top: 1px solid rgba(255,255,255,0.12);
      font-size: 1.03rem;
    }
    .sidebar .profile img {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
    }
    .sidebar .logout {
      margin-top: 10px;
      color: #fca5a5;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.03rem;
      padding: 7px 0;
      text-align: left;
      transition: none;
    }
    .main {
      flex: 1;
      padding: 36px 32px;
      overflow-y: auto;
      background: #f8fafc;
      min-width: 0;
    }
    .header {
      font-size: 1.32rem;
      font-weight: 600;
      margin-bottom: 28px;
      color: var(--primary-dark);
      letter-spacing: 0.5px;
      text-shadow: 0 1px 0 #fff;
    }
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 28px;
    }
    .card {
      background: var(--card-bg);
      border-radius: 16px;
      padding: 28px 18px 22px 18px;
      box-shadow: var(--card-shadow);
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 120px;
      position: relative;
      font-size: 1.08rem;
      outline: none;
      justify-content: center;
      transition: box-shadow 0.2s;
    }
    .card:hover,
    .card:focus-within,
    .card:focus {
      outline: 2.5px solid var(--primary);
      outline-offset: 2px;
      z-index: 1;
    }
    .card h3 {
      font-size: 1.22rem;
      margin-bottom: 18px;
      color: #1e293b;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 12px;
      font-weight: 600;
    }
    .card h3 i {
      font-size: 1.3em;
      color: var(--primary);
    }
    .card button {
      padding: 11px 26px;
      font-size: 1.08rem;
      font-weight: 600;
      background: var(--primary);
      border: none;
      border-radius: 8px;
      color: #fff;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(30,64,175,0.07);
      outline: none;
      transition: background 0.2s;
    }
    .card button:hover,
    .card button:focus {
      outline: 2.5px solid var(--primary);
      outline-offset: 2px;
      z-index: 2;
      background: var(--primary-dark);
    }
    @media (max-width: 900px) {
      .main { padding: 18px 8px; }
      .sidebar { width: 160px; padding: 14px 4px 8px 4px; }
      .logo { font-size: 1.08rem; }
      .card-grid { gap: 14px; }
      .card { padding: 14px 6px 10px 6px; min-height: 70px; }
      .card h3 { font-size: 1rem; margin-bottom: 10px; }
      .card h3 i { font-size: 1.1em; }
      .card button { padding: 7px 14px; font-size: 0.95rem; }
    }
    @media (max-width: 640px) {
      body { flex-direction: column; }
      .sidebar { width: 100%; flex-direction: row; align-items: center; justify-content: space-between; padding: 10px 3vw; box-shadow: none; }
      .sidebar-nav { display: flex; gap: 8px; }
      .main { padding: 10px 2vw; }
      .header { font-size: 1.02rem; }
      .card-grid { gap: 8px; }
      .card { padding: 8px 4px; min-height: 50px; }
      .sidebar .profile { display: none; }
      .sidebar .logout { display: none; }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="logo">EDVANTAGE</div>
    <nav class="sidebar-nav">
      <a href="/admin_panel/manage_courses"><i class="fas fa-book"></i> Manage Courses</a>
      <a href="/admin_panel/manage_resources"><i class="fas fa-folder-open"></i> Manage Resources</a>
      <a href="/admin_panel/manage_user"><i class="fas fa-users-cog"></i> Manage Users</a>
      <a href="/admin_panel"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </nav>
    <div class="profile">
      <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff" alt="Admin Profile" />
      <span>Admin</span>
    </div>
    <form method="POST" action="/logout">
      @csrf
      <button class="logout" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </form>
  </aside>

  <!-- Main Content -->
  <main class="main">
    <div class="header">Manage Courses</div>

    @auth
    <div class="card-grid">
      <div class="card" tabindex="0">
        <h3><i class="fas fa-plus-circle"></i> Add a New Course</h3>
        <form action="/admin_panel/manage_courses/add" method="GET">
          <button type="submit">Add Course</button>
        </form>
      </div>

      <div class="card" tabindex="0">
        <h3><i class="fas fa-edit"></i> Update Existing Course</h3>
        <form action="/admin_panel/manage_courses/edit-list" method="GET">
          <button type="submit">Update Course</button>
        </form>
      </div>

      <div class="card" tabindex="0">
        <h3><i class="fas fa-trash-alt"></i> Delete a Course</h3>
        <form action="/admin_panel/manage_courses/delete-course" method="GET">
          <button type="submit">Delete Course</button>
        </form>
      </div>

      <div class="card" tabindex="0">
        <h3><i class="fas fa-eye"></i> View All Courses</h3>
        <form action="/admin_panel/manage_courses/view-list" method="GET">
          <button type="submit">View Courses</button>
        </form>
      </div>
    </div>
    @else
      <p>You are not logged in. <a href="/">Go to Login</a></p>
    @endauth
  </main>

</body>
</html>
