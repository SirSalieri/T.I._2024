<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';

$message = '';
$userData = null;

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $role = $_POST['role'];

        $stmt = $conn->prepare("UPDATE users SET name = ?, role = ? WHERE id = ?");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $role);
        $stmt->bindParam(3, $userId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $message = "Brukeren ble oppdatert.";
        } else {
            $message = "Ingen endringer ble gjort.";
        }
    } 

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bindParam(1, $userId);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger Bruker</title>
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
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        margin: 0 auto;
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
        background-color: rgba(51, 51, 51, 0.9); 
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

    <div class="container mt-5">
        <h2>Rediger Bruker</h2>
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="rediger_bruker.php?id=<?php echo htmlspecialchars($userId); ?>" method="post">
            <div class="form-group">
                <label for="name">Navn</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($userData['name'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Rolle</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="user" <?php echo ($userData['role'] ?? '') === 'user' ? 'selected' : ''; ?>>USER</option>
                    <option value="admin" <?php echo ($userData['role'] ?? '') === 'admin' ? 'selected' : ''; ?>>ADMIN</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Oppdater Bruker</button>
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
