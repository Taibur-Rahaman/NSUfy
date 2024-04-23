<?php
// Database configuration
$host = 'localhost'; // If your database is hosted locally
$dbname = 'user_authentication'; // Your database name
$username = 'root'; // Default username for XAMPP
$password = ''; // Default password for XAMPP is empty

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
