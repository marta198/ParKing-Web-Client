<?php

if (!isset($_SESSION)) {
    session_start();
}

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare('SELECT * FROM Client WHERE email = :username AND password = :password');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    $result = $stmt->execute();
    $_SESSION['user_id'] = $stmt->fetchColumn(0);
    if ($stmt->rowCount() > 0) {
        header("Location: ../../user_account.php");
    } else {
        // Username and password do not match the result
// Redirect to the login page with an error message
        header("Location: ../../login.php?invalidCred");


    }
}
?>