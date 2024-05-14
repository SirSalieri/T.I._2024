<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';

$message = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and prepare inputs
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $author = filter_var($_POST['author'] ?? 'Anonymous', FILTER_SANITIZE_STRING); // Default to 'Anonymous' if not provided
    $category = filter_var($_POST['category'] ?? 'Uncategorized', FILTER_SANITIZE_STRING); // Default to 'Uncategorized' if not provided
    $image_url = filter_var($_POST['image_url'] ?? '', FILTER_SANITIZE_URL); // Default to empty string if not provided

    // Prepare and execute the insert statement
    $insert_stmt = $conn->prepare("INSERT INTO articles (title, content, author, category, image_url) VALUES (?, ?, ?, ?, ?)");
    $success = $insert_stmt->execute([$title, $content, $author, $category, $image_url]);

    if ($success) {
        $message = "New article added successfully.";
    } else {
        $message = "Failed to add a new article.";
    }
}

// Display operation message if there is one
if ($message) {
    echo "<p>$message</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #f4f4f4;
    }
    .container {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
    }
    .form-control {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
    }
    .form-control textarea {
        resize: vertical;
    }
    .btn {
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #0056b3;
    }

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
        <a class="navbar-brand" href="../dashboard/admin_panel.php">Back to Dashboard!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
 
                <li class="nav-item">
                    <a class="nav-link" href="management.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="last_login.php">Tracker<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Add New Article</h2>
        <form action="add_article.php" method="post">
            <input type="text" name="title" class="form-control" placeholder="Title" required>
            <textarea name="content" class="form-control" placeholder="Content" required rows="5"></textarea>
            <input type="text" name="author" class="form-control" placeholder="Author">
            <input type="text" name="category" class="form-control" placeholder="Category">
            <input type="text" name="image_url" class="form-control" placeholder="Image URL">
            <button type="submit" class="btn">Add Article</button>
        </form>
    </div>
    <footer>
    <div class="footer-container">
        <div class="footer-designer">
            <h4>Designed by</h4>
            <p>Designer Name</p>
        </div>
    </div>
    </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
