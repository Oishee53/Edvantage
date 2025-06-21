<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - EDVANTAGE</title>
  <style>
    :root {
      --primary-purple: #6A5ACD;
      --primary-purple-hover: #5849b4;
      --background-gradient: linear-gradient(to right, #6A5ACD, #7c3aed);
      --form-bg: #ffffff;
      --input-bg: #f1f5f9;
      --input-border: #6A5ACD;
      --text-dark: #1e293b;
      --link-blue: #6366f1;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: var(--background-gradient), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=2071&q=80') no-repeat center center / cover;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(106, 90, 205, 0.8); /* #6A5ACD with transparency */
      z-index: 1;
    }

    .login-container {
      position: relative;
      z-index: 2;
      background-color: var(--form-bg);
      border-radius: 20px;
      padding: 40px;
      max-width: 400px;
      width: 90%;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .logo {
      color: white;
      font-size: 28px;
      font-weight: bold;
      position: absolute;
      top: 40px;
      left: 60px;
      z-index: 3;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: var(--text-dark);
      font-size: 24px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-size: 14px;
      color: var(--text-dark);
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1.5px solid transparent;
      background-color: var(--input-bg);
      font-size: 14px;
      transition: border-color 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: var(--input-border);
      background-color: #fff;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: var(--background-gradient);
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: linear-gradient(to right, var(--primary-purple-hover), #6A5ACD);
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #555;
    }

    .footer a {
      color: var(--link-blue);
      text-decoration: none;
      font-weight: 500;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .logo {
        top: 20px;
        left: 20px;
        font-size: 22px;
      }

      .login-container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="logo">EDVANTAGE</div>

  <div class="login-container">
    <h2>Sign in</h2>

    @if (session('error'))
      <p style="color: #ef4444; text-align:center; margin-bottom: 10px;">{{ session('error') }}</p>
    @endif

    <form action="/admin/login" method="POST">
      @csrf

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">SIGN IN</button>
    </form>

    <div class="footer">
      Don't have an account? <a href="/register">Create one here</a>
    </div>
  </div>
</body>
</html>
