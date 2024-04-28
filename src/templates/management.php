<?php
// Start the session and include your authentication and connection logic here
session_start();
require_once __DIR__ . '/../includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/../myadmin/dashboard/admin_panel.php">Admin's Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="admin_dashboard.php">Dashboard</a>
                <a class="nav-item nav-link" href="manage_users.php">Users</a>
                <a class="nav-item nav-link" href="edit_article.php">Articles</a>
                <a class="nav-item nav-link" href="tracker.php">Activity Tracker</a>
                <!-- Add more navigation items here -->
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Manage User Roles</h1>

        <!-- User Role Links -->
        <div class="mb-3">
            <a href="admin_users.php" class="btn btn-primary">Admin Users</a>
            <a href="non_admin_users.php" class="btn btn-secondary">Non-Admin Users</a>
            <a href="add_user.php" class="btn btn-success">Add New User</a>
        </div>
        
        <!-- You can add dashboard content here if needed -->

        <!-- Possibly other content here -->
    </div>

    <!-- Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
