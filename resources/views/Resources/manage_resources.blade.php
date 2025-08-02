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
<body class="min-h-screen bg-gray-50 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center gap-2">
            <img src="/image/Edvantage.png" class="h-10" alt="Edvantage Logo">
        </div>
        <nav class="mt-8 flex-1">
            <a href="/admin_panel" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Dashboard</a>
            <a href="/admin_panel/manage_courses" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage Course</a>
            <a href="/admin_panel/manage_user" class="block py-3 px-6 text-primary hover:bg-primaryLight font-semibold">Manage User</a>
            <a href="/admin_panel/manage_resources" class="block py-3 px-6 text-primary bg-primaryLight font-semibold">Manage Resources</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-slate-800 text-white px-6 py-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Module Management</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-sm"><?php echo htmlspecialchars($adminName); ?></span>
                    <a href="/admin_panel/logout" class="bg-slate-700 hover:bg-slate-600 px-3 py-1 rounded text-sm transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6">
            <div class="max-w-4xl mx-auto">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Resource Management</h3>
                    <p class="text-gray-600">Manage and organize your learning modules and resources</p>
                </div>

                <!-- Action Cards -->
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <!-- Add New Module Card -->
                    <div class="bg-white rounded-lg shadow-sm border cursor-pointer" onclick="location.href='/admin_panel/manage_resources/add'">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-green-100 rounded-lg">
                                    <i class="fas fa-plus text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900">Add New Module</h4>
                                    <p class="text-gray-600 text-sm">Create and configure new learning modules</p>
                                </div>
                            </div>
                            <button class="w-full bg-slate-800 hover:bg-slate-700 text-white py-2 px-4 rounded transition-colors" onclick="location.href='/admin_panel/manage_resources/add'">
                                <i class="fas fa-plus mr-2"></i>
                                Add New Module
                            </button>
                        </div>
                    </div>

                    <!-- View All Modules Card -->
                    <div class="bg-white rounded-lg shadow-sm border cursor-pointer" onclick="location.href='/admin_panel/manage_resources/view'">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <i class="fas fa-eye text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900">View All Modules</h4>
                                    <p class="text-gray-600 text-sm">Browse and manage existing learning modules</p>
                                </div>
                            </div>
                            <button class="w-full bg-slate-800 hover:bg-slate-700 text-white py-2 px-4 rounded transition-colors" onclick="location.href='/admin_panel/manage_resources/view'">
                                <i class="fas fa-eye mr-2"></i>
                                View All Modules
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Total Modules</p>
                                    <p class="text-3xl font-bold text-gray-900"><?php echo $totalModules; ?></p>
                                </div>
                                <div class="p-3 bg-slate-100 rounded-full">
                                    <i class="fas fa-book-open text-slate-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Active Modules</p>
                                    <p class="text-3xl font-bold text-gray-900"><?php echo $activeModules; ?></p>
                                </div>
                                <div class="p-3 bg-green-100 rounded-full">
                                    <i class="fas fa-cogs text-green-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">New This Month</p>
                                    <p class="text-3xl font-bold text-gray-900"><?php echo $newThisMonth; ?></p>
                                </div>
                                <div class="p-3 bg-blue-100 rounded-full">
                                    <i class="fas fa-plus text-blue-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Add some interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for cards
            const cards = document.querySelectorAll('.bg-white.rounded-lg.shadow-sm.border.cursor-pointer');
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
                    // Prevent double navigation if button is clicked
                    if (e.target.tagName === 'BUTTON') {
                        e.stopPropagation();
                    }
                });
            });

            // Add hover effects for sidebar only
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.backgroundColor = '#f3f4f6';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.backgroundColor = 'transparent';
                    }
                });
            });
        });
    </script>
</body>
</html>