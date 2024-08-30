<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email'])) {
        // Handle email-based password reset
        $email = $_POST['email'];

        // Validate the email
        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmail);

        if ($result === FALSE) {
            echo "Error in SQL query: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            // Generate a reset token and save it in the database
            $resetToken = bin2hex(random_bytes(16));
            $updateTokenQuery = "UPDATE users SET reset_token='$resetToken' WHERE email='$email'";
            if ($conn->query($updateTokenQuery) === TRUE) {
                // Send the reset link via email (this is a placeholder, use a real email function)
                $resetLink = "http://yourdomain.com/reset-password.php?token=$resetToken";
                echo "A password reset link has been sent to $email. <br> Reset link: $resetLink";
            } else {
                echo "Error updating reset token: " . $conn->error;
            }
        } else {
            echo "Email not found.";
        }
    } elseif (!empty($_POST['mobile'])) {
        // Handle mobile-based password reset
        $mobile = $_POST['mobile'];

        // Validate the mobile number
        $checkMobile = "SELECT * FROM users WHERE mobile='$mobile'";
        $result = $conn->query($checkMobile);

        if ($result === FALSE) {
            echo "Error in SQL query: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            // Generate a random verification code
            $verificationCode = rand(100000, 999999);

            // Save the verification code in the session
            $_SESSION['verification_code'] = $verificationCode;
            $_SESSION['mobile'] = $mobile;

            // Simulate sending the verification code via SMS
            echo "A verification code has been sent to $mobile. Code: $verificationCode";

            // Redirect to a page where the user can enter the verification code
            header("Location: verify-code.php");
            exit();
        } else {
            echo "Mobile number not found.";
        }
    } else {
        echo "Please enter either your email or mobile number.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <form method="post" action="forgot-password.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email address" />
                <label for="email">Email</label>
            </div>
            <p>Or</p>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="mobile" placeholder="Enter your mobile number" />
                <label for="mobile">Mobile Number</label>
            </div>
            <input type="submit" class="btn" value="Submit" />
            <p><a href="index.php">Back to Sign In</a></p>
        </form>
    </div>
</body>
</html>
