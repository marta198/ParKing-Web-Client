<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare('SELECT * FROM Client WHERE email = :username AND password = :password');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    $result = $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Username and password match the result
// Redirect to the dashboard page
        header("Location: ../../user_account.php");
    } else {
        // Username and password do not match the result
// Redirect to the login page with an error message
        header("Location: ../../login.php?invalidCred");
    }
}
?>