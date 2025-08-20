<?php
// You can add any PHP logic here for authentication, data fetching, etc.
$totalModules = 24;
$activeModules = 18;
$newThisMonth = 3;
$adminName = "Admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Management - Edvantage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-item {
            transition: all 0.2s ease;
        }
        .sidebar-item:hover {
            background-color: #f3f4f6;
        }
        .sidebar-item.active {
            background-color: #e2e8f0;
            color: #1e293b;
        }
    </style>
</head>
<body>

    <h2>Module Management</h2>

    <button onclick="location.href='/admin_panel/manage_resources/add'">
        Add New Module
    </button>

    <button onclick="location.href='/admin_panel/manage_resources/view'">
        View All Modules
    </button>

</body>
</html>