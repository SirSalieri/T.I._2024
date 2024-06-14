<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$envFilePath = __DIR__ . '/../support/.env';
if (!file_exists($envFilePath)) {
    die(".env file not found at: $envFilePath");
}

$dotenv = Dotenv::createImmutable(__DIR__ . '/../support');
$dotenv->load();

$host = $_ENV['DB_HOST'] ?? null;
$dbname = $_ENV['DB_NAME'] ?? null;
$username = $_ENV['DB_USER'] ?? null;
$password = $_ENV['DB_PASS'] ?? null;

echo "Host: $host, Database: $dbname, Username: $username, Password: $password<br>";

if (!$host || !$dbname || !$username || !$password) {
    die("One or more environment variables are missing.");
}

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO($dsn, $username, $password, $options);
    echo "Connected to the MySQL database successfully";
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die("Connection failed: " . $e->getMessage());
}
?>
