<?php
$autoloadPath = __DIR__ . '\..\..\vendor\autoload.php';

if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    die("The required loader is missing. Please run 'composer install'.");
}


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../support');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the MySQL database successfully";
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die("Connection failed. Please contact the administrator.");
}
?>

