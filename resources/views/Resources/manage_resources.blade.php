<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Modules</title>
</head>
<body>


    <h2>Module Management</h2>

    <button onclick="location.href='/admin_panel/manage_resources/add'">
        Add New Module
    </button>

    <button onclick="location.href='/admin_panel/manage_resources/view'">
        View All Modules
    </button>
    @if(auth()->user()->role === 2)
    <a href="/admin_panel/manage_resources">← Back to Home Page</a>
    @elseif(auth()->user()->role === 3)
        <a href="/instructor/manage_resources">← Back to Home Page</a>
    @endif

</body>
</html>
