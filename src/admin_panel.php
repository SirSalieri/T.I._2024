 <?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// Check user roles for access control
if ($_SESSION['role'] !== 'admin') {
    header("Location: unauthorized_access.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Include necessary stylesheets, scripts, or libraries -->
    <link rel="stylesheet" href="admin_styles.css">
</head>
<style>
    /* admin_styles.css */

/* General styling for the admin panel */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: white;
    padding: 10px 0;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

main {
    padding: 20px;
}

.admin-functionalities {
    margin-top: 20px;
}

footer {
    text-align: center;
    padding: 10px 0;
    background-color: #333;
    color: white;
    position: absolute;
    bottom: 0;
    width: 100%;
}

</style>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="edit_article.php">Edit Articles</a></li>
                <li><a href="add_article.php">Add New Articles</a></li>
                <li><a href="remove_article.php">Remove Articles</a></li>
                <li><a href="last_login.php">Check User's activity</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to the Admin Panel!</h1>
        <div class="admin-functionalities">
            <button onclick="openUserManagement()">Manage Users</button>
            <button onclick="openArticleManagement()">Manage Articles</button>
        </div>
    </main>

    <footer>
        <!-- Footer content -->
        <p>&copy; 2023 Your Company</p>
    </footer>

    <!-- Include necessary scripts -->
    <script src="admin_scripts.js"></script>
</body>
</html>
