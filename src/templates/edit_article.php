<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Articles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
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
        <div class="header-content text-center">
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

    <div class="container mt-5" style="min-height: 40vh;">
        <?php
        // Include the database connection file
        require_once '../includes/connect.php';

        // Function to fetch all articles from the database
        function fetch_all_articles($conn) {
            $sql = "SELECT id, title, category FROM articles";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Function to fetch article details from the database
        function fetch_article_details_from_database($article_id, $conn) {
            $sql = "SELECT title, content, category, image_url FROM articles WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Function to delete an article from the database
        function delete_article_from_database($article_id, $conn) {
            $sql = "DELETE FROM articles WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        // Check for actions: edit or delete
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $article_id = $_GET['id'];
            $article_data = fetch_article_details_from_database($article_id, $conn);
            
            // Check if the form is submitted for updating the article
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the posted data
                $article_id = $_POST['article_id'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                $image_url = $_POST['image_url'];

                // Update the article in the database
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
            ?>

            <h2 class="mb-4">Edit Article</h2>
            <form id="edit-article-form" action="edit_article.php?action=edit&id=<?php echo $article_id; ?>" method="post">
                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($article_data['title']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="4" required><?php echo htmlspecialchars($article_data['content']); ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($article_data['category']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo htmlspecialchars($article_data['image_url']); ?>">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" onclick="submitPreview()">Preview</button>
            </form>
            
            <form id="preview-form" action="preview.php" method="post" target="_blank">
                <input type="hidden" name="title" id="preview-title">
                <input type="hidden" name="content" id="preview-content">
                <input type="hidden" name="category" id="preview-category">
                <input type="hidden" name="image_url" id="preview-image-url">
            </form>

            <script>
            function submitPreview() {
                document.getElementById('preview-title').value = document.getElementById('title').value;
                document.getElementById('preview-content').value = document.getElementById('content').value;
                document.getElementById('preview-category').value = document.getElementById('category').value;
                document.getElementById('preview-image-url').value = document.getElementById('image_url').value;
                document.getElementById('preview-form').submit();
            }

            document.addEventListener('DOMContentLoaded', function() {
                ClassicEditor
                    .create(document.querySelector('#content'))
                    .catch(error => {
                        console.error(error);
                    });
            });
            </script>

            <?php
        } elseif (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $article_id = $_GET['id'];
            if (delete_article_from_database($article_id, $conn)) {
                echo '<div class="alert alert-success" role="alert">Article deleted successfully!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting article.</div>';
            }
            // Redirect to the article list after deletion
            header("Location: edit_article.php");
            exit;
        } else {
            $articles = fetch_all_articles($conn);
            ?>

            <h2 class="mb-4">Available Articles</h2>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($article['id']); ?></td>
                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                            <td><?php echo htmlspecialchars($article['category']); ?></td>
                            <td>
                                <a href="edit_article.php?action=edit&id=<?php echo $article['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="edit_article.php?action=delete&id=<?php echo $article['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this article?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php
        }
        ?>
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
