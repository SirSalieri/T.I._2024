<?php
// Establish database connection
$servername = "127.0.0.1";
$username = "root";
$password = "Admin123";
$dbname = "unity_pulse";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the article ID from the URL
if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Query to retrieve article details based on ID
    $sql = "SELECT * FROM articles WHERE id = $article_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display article details
        while ($article = $result->fetch_assoc()) {
            echo "<h2>" . $article["title"] . "</h2>";
            echo "<p>" . $article["content"] . "</p>";
            // Display other relevant details as needed
        }
    } else {
        echo "Article not found";
    }
} else {
    echo "Invalid article ID";
}

$conn->close();
?>
