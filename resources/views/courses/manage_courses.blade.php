<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Courses</title>
</head>
<body>
    @auth
    <h2>📚 Manage Courses</h2>

    <form action="/admin_panel/manage_courses/add" method="GET" style="margin-bottom: 10px;">
        <button type="submit">➕ Add a New Course</button>
    </form>

    <form action="/admin_panel/manage_courses/edit-list" method="GET" style="margin-bottom: 10px;">
        <button type="submit">✏️ Update Existing Course</button>
    </form>

    <form action="/admin_panel/manage_courses/delete-course" method="GET" style="margin-bottom: 10px;">
        <button type="submit">🗑️ Delete a Course</button>
    </form>

     <form action="/admin_panel/manage_courses/view-list" method="GET">
        <button type="submit">📖 View All Course</button>
    </form>

    <br>
    <a href="/admin_panel">← Back to Home Page</a>
    @else
    <p>You are not logged in. <a href="/">Go to Login</a></p>
@endauth

</body>
</html>