<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';

// Assuming you have a column in your users table that defines the user role, such as 'role'

$stmt = $conn->prepare("SELECT * FROM users WHERE role = 'admin'");
$stmt->execute();
$admin_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/../myadmin/dashboard/admin_panel.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="../dashboard/admin_panel.php">Admin's Panel</a>
                <a class="nav-item nav-link" href="manage_users.php">Users</a>
                <a class="nav-item nav-link" href="edit_article.php">Articles</a>
                <a class="nav-item nav-link" href="tracker.php">Activity Tracker</a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h2>Admin Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin_users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <!-- Add other fields as necessary -->
                        <td>
                            <!-- Add action buttons or links here -->
                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and other dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
