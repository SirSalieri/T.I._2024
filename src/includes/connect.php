<?php
$autoloadPath = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    die("The required loader is missing. Please run 'composer install'.");
}

$username = $_ENV['DB_USERNAME'] ?? null;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../support');
$dotenv->load();

$host = $_ENV['DB_HOST'] ?? null;
$dbname = $_ENV['DB_NAME'] ?? null;
$password = $_ENV['DB_PASSWORD'] ?? null;

// Print environment variables to debug
echo "Host: $host, Database: $dbname, Username: $username";

if (!$host || !$dbname || !$username || !$password) {
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