<?php
require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->loadEnv(__DIR__.'/.env');

$databasePath = __DIR__ . '/' . $_ENV['DB_PATH'] ?? 'w3s-dynamic-storage/database.db';

try {
    $conn = new PDO('sqlite:' . $databasePath);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Additional configurations if needed

    echo "Connected to the SQLite database successfully";
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    // Display a generic error message to users
    die("Connection failed. Please contact the administrator.");
}
