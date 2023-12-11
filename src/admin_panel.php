<?php
session_start();

function handleUnauthorizedAccess() {
    header("Location: unauthorized_access.php");
    exit();
}

// Function to handle login redirection
function redirectToLogin() {
    header("Location: avatars.html");
    exit();
}

// Check if the user is logged in
function checkLoggedIn() {
    if (!isset($_SESSION['role'])) {
        redirectToLogin();
    }
}

// Check user roles for access control
function checkUserRole() {
    if ($_SESSION['role'] !== 'admin') {
        handleUnauthorizedAccess();
    }
}

// Bypass role checks based on a specific condition (e.g., a GET parameter)
if (isset($_GET['admin_access']) && $_GET['admin_access'] === 'true') {
    // If the condition is met, set the user as an admin for testing purposes
    $_SESSION['role'] = 'admin';
}

try {
    checkLoggedIn();
    checkUserRole();
} catch (Exception $e) {
    header("Location: error_page.php");
    error_log($e->getMessage());
    echo "An error occurred. Please try again later.";
    exit();
}
header("Location: avatars.html?access=false");
exit();
header("Location: admin_panel.php");
exit();
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<style>
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
                <li><a href="index.html">Home</a></li>
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
    <script src="admin_scripts.js"></script>
</body>
</html>
