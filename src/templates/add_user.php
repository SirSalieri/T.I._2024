<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';

$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and prepare inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $role = $_POST['role'];

    // Prepare and execute the insert statement
    $insert_stmt = $conn->prepare("INSERT INTO users (name, surname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    $insertSuccess = $insert_stmt->execute([$name, $surname, $username, $email, $password, $role]);

    if ($insertSuccess) {
        $successMessage = "New user added successfully.";
    } else {
        $successMessage = "Failed to add a new user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
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

    <div class="container mt-5">
        <?php if ($successMessage): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
                <a href="../dashboard/admin_panel.php" class="btn btn-primary">Back to Dashboard</a>
            </div>
        <?php endif; ?>

        <h2>Add New User</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="user" selected>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
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
