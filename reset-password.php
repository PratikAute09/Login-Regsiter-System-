<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = md5($_POST['new_password']);
    $mobile = $_SESSION['mobile'];

    // Update the user's password
    $updatePassword = "UPDATE users SET password='$newPassword' WHERE mobile='$mobile'";
    if ($conn->query($updatePassword) === TRUE) {
        echo "Password reset successfully.";
        unset($_SESSION['verification_code']);
        unset($_SESSION['mobile']);
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <form method="post" action="reset-password.php">
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="new_password" placeholder="Enter new password" required>
                <label for="new_password">New Password</label>
            </div>
            <input type="submit" class="btn" value="Reset Password">
        </form>
    </div>
</body>
</html>
