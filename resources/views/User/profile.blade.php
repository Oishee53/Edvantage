<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - EDVANTAGE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAwesome CDN for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    /* Reset & base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right, #FFF2E0, #C0C9EE, #A2AADB);
      color: #2E2A47;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .profile-container {
      background: rgba(255, 255, 255, 0.8);
      border-radius: 25px;
      padding: 40px 35px;
      max-width: 700px;
      width: 100%;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(15px);
    }

    h2 {
      font-size: 32px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
      color: #4B3F72;
    }

    /* Profile Icon and Title */
    .profile-title {
      text-align: center;
      margin-bottom: 30px;
    }

    .profile-title i {
      font-size: 40px;
      color: #4B3F72;
      margin-bottom: 15px;
    }

    /* Profile info styles */
    .profile-info {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .profile-info strong {
      flex: 0 0 150px;
      font-weight: 600;
      font-size: 15px;
      text-transform: uppercase;
      color: #6B6CA8;
      margin-top: 12px;
    }

    .profile-info p {
      flex: 1;
      background: #E8EAF6;
      padding: 15px 20px;
      border-radius: 12px;
      font-size: 17px;
      color: #333;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-info p:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    a {
      display: block;
      text-align: center;
      background: linear-gradient(to right, #6B6CA8, #4B3F72);
      color: white;
      text-decoration: none;
      padding: 14px 30px;
      border-radius: 12px;
      font-size: 17px;
      font-weight: 600;
      margin-top: 30px;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(107, 108, 168, 0.3);
    }

    a:hover {
      background: linear-gradient(to right, #4B3F72, #2E2A47);
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(75, 63, 114, 0.4);
    }

    @media (max-width: 600px) {
      .profile-info {
        flex-direction: column;
        align-items: flex-start;
      }

      .profile-info strong {
        margin-bottom: 5px;
      }

      .profile-info p {
        width: 100%;
      }

      h2 {
        font-size: 24px;
      }

      a {
        font-size: 16px;
        padding: 12px 25px;
      }
    }
  </style>
</head>
<body>

  <div class="profile-container">
    <!-- Profile Title with Icon -->
    <div class="profile-title">
      <i class="fas fa-user-circle"></i>
      <h2>My Profile</h2>
    </div>

    <!-- Profile Information -->
    <div class="profile-info">
      <strong>Name:</strong>
      <p>{{ $user->name }}</p>
    </div>

    <div class="profile-info">
      <strong>Email:</strong>
      <p>{{ $user->email }}</p>
    </div>

    <div class="profile-info">
      <strong>Phone:</strong>
      <p>{{ $user->phone }}</p>
    </div>

    <div class="profile-info">
      <strong>Field of Interest:</strong>
      <p>{{ $user->field }}</p>
    </div>

    <!-- Back Button -->
    <a href="/homepage">← Back to Homepage</a>
  </div>

</body>
</html>
