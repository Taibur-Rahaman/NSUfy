<?php
// Include database connection
require_once 'database.php';

// Include user functions
require_once 'user_functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verification_code = $_POST['code'];

    // Validate form data
    if (empty($name) || empty($email) || empty($password) || empty($verification_code)) {
        // Handle empty fields error
        // Redirect back to signup page with error message
        header("Location: signup.html?error=empty_fields");
        exit();
    } else {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Handle invalid email error
            // Redirect back to signup page with error message
            header("Location: signup.html?error=invalid_email");
            exit();
        }

        // Validate verification code (you might implement this)
        // if (!isValidVerificationCode($verification_code)) {
        //     // Handle invalid verification code error
        //     // Redirect back to signup page with error message
        //     header("Location: signup.html?error=invalid_verification_code");
        //     exit();
        // }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $hashed_password]);

        // Redirect to login page with success message
        header("Location: login.html?signup=success");
        exit();
    }
} else {
    // Redirect back to signup page if accessed directly
    header("Location: signup.html");
    exit();
}
?>
