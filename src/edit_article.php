<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
    <?php
    // Assuming you have received the article ID through $_GET['id']
    $article_id = $_GET['id'];

    $article_data = fetch_article_details_from_database($article_id);
    
    // Example article data
    $article_data = [
        'title' => 'Sample Title',
        'content' => 'Sample content goes here...',
        'category' => 'Sample Category',
        'image_url' => 'https://example.com/image.jpg'
    ];
    ?>

    <h2>Edit Article</h2>
    <form action="edit_article.php" method="post">
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
        
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $article_data['title']; ?>" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required><?php echo $article_data['content']; ?></textarea><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo $article_data['category']; ?>" required><br><br>
        
        <label for="image_url">Image URL:</label><br>
        <input type="text" id="image_url" name="image_url" value="<?php echo $article_data['image_url']; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
