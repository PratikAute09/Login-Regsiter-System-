<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredCode = $_POST['code'];
    $storedCode = $_SESSION['verification_code'];
    $mobile = $_SESSION['mobile'];

    if ($enteredCode == $storedCode) {
        // Code is correct, allow the user to set a new password
        echo 'Verification successful. <a href="reset-password.php">Click here</a> to reset your password.';
        // Optionally, redirect to reset-password.php
        // header("Location: reset-password.php");
    } else {
        echo 'Invalid verification code.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Verify Code</h1>
        <form method="post" action="verify-code.php">
            <div class="input-group">
                <i class="fas fa-key"></i>
                <input type="text" name="code" placeholder="Enter the verification code" required>
                <label for="code">Verification Code</label>
            </div>
            <input type="submit" class="btn" value="Verify">
        </form>
    </div>
</body>
</html>
