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
    $name = $_POST['register-name'];
    $surname = $_POST['register-form'];
    $username = $_POST['register-username'];
    $email = $_POST['register-email'];
    $password = $_POST['register-password']; // Remember to hash this password securely

    // Example password hashing (use stronger hashing mechanisms)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (name, surname, username, email, password) VALUES ('$name', '$surname', '$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error);
        echo json_encode($response);
    }
}

$conn->close();
?>
