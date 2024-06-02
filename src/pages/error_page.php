<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error Notification</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
  .notification {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 5px;
    background-color: #f44336;
    color: white;
    text-align: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.notification h1 {
    margin-top: 0;
}

/* Close button */
.close {
    color: white;
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #ccc;
}
</style>
<body>
    <!-- This will trigger the JavaScript function to display the notification -->
    <button onclick="displayError()">Show Error Notification</button>

    <!-- This will be the hidden notification container -->
    <div id="errorNotification" class="notification">
        <span class="close" onclick="closeNotification()">&times;</span>
        <h1>Error!</h1>
        <p>Sorry, something went wrong. Please try again later.</p>
    </div>

    <script>
    // Function to display the error notification
function displayError() {
    var notification = document.getElementById("errorNotification");
    notification.style.display = "block";
}

// Function to close the notification
function closeNotification() {
    var notification = document.getElementById("errorNotification");
    notification.style.display = "none";
}
    </script>
</body>
</html>
