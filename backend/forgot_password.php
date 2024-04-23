<?php


// Include database connection
require_once 'database.php';

// Include user functions
require_once 'user_functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store form data
    $email = $_POST['email'];

    // Validate form data
    if (empty($email)) {
        // Handle empty email field error
        // Redirect back to forgot password page with error message
        header("Location: forgot_password.html?error=empty_email");
        exit();
    } else {
        // Check if email exists in the database
        $user = getUserByEmail($email);

        if (!$user) {
            // Handle non-existing email error
            // Redirect back to forgot password page with error message
            header("Location: forgot_password.html?error=email_not_found");
            exit();
        } else {
            // Generate and store password reset token
            $token = generatePasswordResetToken($email);

            // Send password reset email with token
            sendPasswordResetEmail($email, $token);

            // Redirect to a confirmation page or display a success message
            header("Location: password_reset_confirmation.php");
            exit();
        }
    }
} else {
    // Redirect back to forgot password page if accessed directly
    header("Location: forgot_password.html");
    exit();
}
?>
