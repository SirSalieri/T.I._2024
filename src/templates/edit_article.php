<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
</head>
<body>
    <?php
    require_once '../includes/connect.php';

    function fetch_article_details_from_database($article_id, $conn) {
        $sql = "SELECT title, content, category, image_url FROM articles WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $article_id = $_POST['article_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $image_url = $_POST['image_url'];

        $sql = "UPDATE articles SET title = :title, content = :content, category = :category, image_url = :image_url WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Article updated successfully!";
        } else {
            echo "Error updating article.";
        }
    }

    // Assuming you have received the article ID through $_GET['id']
    if (isset($_GET['id'])) {
        $article_id = $_GET['id'];
        $article_data = fetch_article_details_from_database($article_id, $conn);
    } else {
        echo "No article ID provided!";
        exit;
    }
    ?>

    <h2>Edit Article</h2>
    <form action="edit_article.php?id=<?php echo $article_id; ?>" method="post">
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
        
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article_data['title']); ?>" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required><?php echo htmlspecialchars($article_data['content']); ?></textarea><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($article_data['category']); ?>" required><br><br>
        
        <label for="image_url">Image URL:</label><br>
        <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($article_data['image_url']); ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
