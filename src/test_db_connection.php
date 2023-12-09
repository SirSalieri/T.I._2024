<?php
$databaseFile = '/home/SirSalieri/public_html/w3s-dynamic-storage/database.db'; // Replace with the correct path to your SQLite database file

try {
    $conn = new SQLite3($databaseFile);

    if (!$conn) {
        throw new Exception("Failed to connect to the database.");
    }

    echo "Connection successful!";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
