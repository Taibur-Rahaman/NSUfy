<?php
// Include database connection
require_once 'database.php';

// Include user functions
require_once 'user_functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($email) || empty($password)) {
        // Handle empty fields error
        // Redirect back to login page with error message
        header("Location: login.html?error=empty_fields");
        exit();
    } else {
        // Authenticate user
        $user = getUserByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            // Handle invalid credentials error
            // Redirect back to login page with error message
            header("Location: login.html?error=invalid_credentials");
            exit();
        } else {
            // Start session and set session variables
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to dashboard or homepage
            header("Location: dashboard.php");
            exit();
        }
    }
} else {
    // Redirect back to login page if accessed directly
    header("Location: login.html");
    exit();
}
?>
