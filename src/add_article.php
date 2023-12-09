<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $image_url = $_POST['image_url'];

    // Establish database connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "Admin123";
    $dbname = "unity_pulse";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_erroar);
    }

    // Insert the new article into the database
    $sql = "INSERT INTO articles (title, content, category, image_url) VALUES ('$title', '$content', '$category', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        // Article added successfully
        header("Location: articles.php"); // Redirect to articles page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New</title>
</head>
<body>
    <h2>Add Article</h2>
    <form action="add_article.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br><br>
        
        <label for="image_url">Image URL:</label><br>
        <input type="text" id="image_url" name="image_url"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
