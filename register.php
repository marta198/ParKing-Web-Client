<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['username'])) {
    header("Location: user_account.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ParKing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="src/css/colors-light.css" id="theme-style">
    <link rel="apple-touch-icon" sizes="180x180" href="src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="src/img/favicon/site.webmanifest">
</head>

<body>
<?php include("src/php/header.php") ?>
    <div class="login-container">
        <h1 class="login-title">Register</h1>
        <form action="./src/php/check_register.php" method="post" class="login-form" onsubmit="return checkRegisterData()">
            <div class="login-body">
                <div class="login-input-container">
                    <label for="username" class="login-label">Email</label>
                    <input type="text" name="username" id="username" placeholder="example@email.com" required
                        class="input">
                </div>
                <div class="login-input-container">
                    <label for="password" class="login-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" required
                        class="input registerPassword">
                </div>
                <div class="login-input-container">
                    <label for="password" class="login-label">Password repeat</label>
                    <input type="password" name="password" id="passwordRepeat" placeholder="Your password" required
                        class="input registerPasswordRepeat">
                </div>
                <div>
                    <input type="submit" value="Register" class="btn btn-primary">
                </div>
            </div>
            <div class="register-footer">
                <p>Have an account?</p>
                <a href="login.php" class="link"> Click here to Login</a>
            </div>
        </form>
    </div>
</body>
<script src="src/js/main.js"></script>
<script src="src/js/checkURLParams.js"></script>