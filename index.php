<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .alert {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fName">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">----------or--------</p>
      <div class="icons">
      <a href="https://accounts.google.com/login" target="_blank">
        <i class="fab fa-google"></i>
      </a> <a href="https://www.facebook.com/login" target="_blank">
        <i class="fab fa-facebook"></i>
      </a>
      </div>
      <div class="links">
        <p>Already Have Account?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="emailSignIn" placeholder="Email" required>
              <label for="emailSignIn">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="passwordSignIn" placeholder="Password" required>
              <label for="passwordSignIn">Password</label>
          </div>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">----------or--------</p>
        <div class="icons">
        <a href="https://accounts.google.com/login" target="_blank">
        <i class="fab fa-google"></i>
      </a>
      <a href="https://www.facebook.com/login" target="_blank">
        <i class="fab fa-facebook"></i>
      </a>
        </div>
        <div class="links">
          <p>Don't have an account yet?</p>
          <button id="signUpButton">Sign Up</button>
          <p><a href="forgot-password.php" id="forgotPasswordLink">Forgot Password?</a></p>
        </div>
    </div>

    <?php
    // Display error messages
    session_start();
    if (isset($_SESSION['error'])) {
        echo '<p class="alert">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>

    <script src="script.js"></script>
</body>
</html>
