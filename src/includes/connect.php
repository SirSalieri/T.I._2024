<?php
require_once __DIR__ . '/../../src/vendor/autoload.php'; // Adjusted the path to match your structure

use Dotenv\Dotenv;

// Check if the file exists
$envFilePath = __DIR__ . '/../../support/.env';
if (!file_exists($envFilePath)) {
    die(".env file not found at: $envFilePath");
}

// Load environment variables from the .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../support');
$dotenv->load();

// Fetch environment variables
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

// Print environment variables to debug
echo "Host: $host, Database: $dbname, Username: $username, Password: $password<br>";

if (!$host || !$dbname || !$username) {
    die("One or more environment variables are missing.");
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the MySQL database successfully";
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die("Connection failed. Please contact the administrator.");
}
?>
