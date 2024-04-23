<?php
// Include database connection
require_once 'database.php';

// Test query
$query = "SELECT * FROM users";
$stmt = $pdo->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output user data
print_r($users);
?>
