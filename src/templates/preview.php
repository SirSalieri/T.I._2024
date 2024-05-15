<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="header-content">
            <div class="logo">
                <h1>NordPublica</h1>
            </div>
        </div>
        <div class="slider-container">
            <div class="slider">
                <img src="../pics/road.jpg" alt="Image 1">
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <h2 class="mb-4"><?php echo htmlspecialchars($_POST['title']); ?></h2>
        <div class="content">
            <?php echo $_POST['content']; ?>
        </div>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($_POST['category']); ?></p>
        <img src="<?php echo htmlspecialchars($_POST['image_url']); ?>" alt="Article Image" style="max-width: 100%;">
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
