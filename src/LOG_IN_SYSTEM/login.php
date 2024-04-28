<?php
// Establish a database connection
$servername = "127.0.0.1";
$username = "root";
$password = "Admin123";
$dbname = "unity_pulse";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrUsername = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database based on email or username
    $sql = "SELECT * FROM users WHERE email = '$emailOrUsername' OR username = '$emailOrUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $response = array("success" => true);
            echo json_encode($response);
            // Start session or perform any necessary actions upon successful login
        } else {
            $response = array("success" => false, "message" => "Invalid credentials");
            echo json_encode($response);
        }
    } else {
        $response = array("success" => false, "message" => "User not found");
        echo json_encode($response);
    }
}

$conn->close();
?>

<!DOCTYPE="html">
<html>
<h1>Login system</h1>
</html>