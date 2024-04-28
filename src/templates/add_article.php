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
    <title>Add New Article</title>
    <!-- Minimal styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
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
    </style>
</head>
<body>
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
</body>
</html>
