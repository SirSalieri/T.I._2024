<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles Administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .menu-button {
            width: 100%;
            padding: 20px;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/../myadmin/dashboard/admin_panel.php">Back to Dashboard!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard/admin_panel.php">Admin's Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_users.php">Users</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="articles.php">Articles<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Articles</h1>
        <div class="row">
            <div class="col-md-4">
                <a href="edit_article.php" class="btn btn-secondary menu-button">EDIT ARTICLES</a>
            </div>
            <div class="col-md-4">
                <a href="search_articles.php" class="btn btn-secondary menu-button">ARTICLES HISTORY</a>
            </div>
            <div class="col-md-4">
                <a href="add_article.php" class="btn btn-secondary menu-button">ADD A NEW ARTICLE</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
