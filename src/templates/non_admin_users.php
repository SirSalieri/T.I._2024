<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';

// Assuming 'role' column uses 'admin' to designate admin users, we'll fetch non-admin users
$query = "SELECT id, name, surname, username, email, role FROM users WHERE role != 'admin'";
$users = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Non-Admin User Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<style>
        header {
            width: 100%;
            color: white;
            background-color: #333;
            padding: 10px 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between; /* Aligns children to the edges */
            align-items: center;
        }

        .logo {
            margin: 0 auto; /* Centers the logo within the flex container */
            padding: 5px;
            background-color: transparent;
            border-radius: 5px;
            font-family: 'Orbitron', sans-serif;
            text-align: center;
        }

        .slider-container {
            width: 100%;
            overflow: hidden;
            max-height: 300px;
        }

        .slider img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            display: block;
        }

        .button-container {
            margin-bottom: 20px;
        }
        footer {
            background-color: rgba(51, 51, 51, 0.9); /* Darker background for footer */
            color: #fff;
            bottom: 0;
            left: 0; 
            width: 100%;
        }

        .footer-container {
            max-width: 1200px;
            min-height: 20vh;
            margin: 0 auto;
            display: flex;
            justify-content: space-around;
            text-align: center;
        }
    </style>
<body>
    <header class="mainheader">
        <div class="header-content">
            <div class="logo">
                <h1>NordPublica</h1>
            </div>
            <div class="logout">
                <a href="../LOG_IN_SYSTEM/logout.php" class="btn btn-outline-light">LOGG UT</a>
            </div>
        </div>
        <div class="slider-container">
            <div class="slider">
                <img src="../pics/road.jpg" alt="Image 1">
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../dashboard/admin_panel.php">Back to Dashboard</a>
    </nav>
    <div class="container mt-3">
        <a href="management.php" style="text-decoration: none;">&larr; Back to Users Management Dashboard</a>
    </div>

    <div class="container mt-4">
        <h2>Non-Admin Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['surname']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                        <td>
                            <!-- Example Action Buttons -->
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="slett_nona_bruker.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            <!-- You might want to use POST requests for actions like 'delete' for security reasons -->
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-designer">
                <h4>Designed by</h4>
                <p>Designer Name</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
