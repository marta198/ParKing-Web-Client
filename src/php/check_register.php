<?php

if (!isset($_SESSION)) {
    session_start();
}
include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare('SELECT * FROM client WHERE email = :username AND password = :password');
    $stmt->execute(["username"=>$username,"password"=>$password]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        $stmt = $pdo->prepare('SELECT * FROM client WHERE email = :username AND password = :password');
        $stmt->execute(["username"=>$username,"password"=>$password]);
        $_SESSION['user_id'] = $stmt->fetchColumn(0);
        if($stmt->rowCount() > 0){
            header("Location: ../../user_account.php");
            exit();
        }
    }
    else{

        // add to db and login
        $stmt = $pdo->prepare('INSERT INTO client (username, email, password) VALUES (:username, :email, :password)');
        $stmt->execute(["username"=>explode("@",$username)[0],"email"=>$username,"password"=>$password]);


        $stmt = $pdo->prepare('SELECT * FROM client WHERE email = :username AND password = :password');
        $stmt->execute(["username"=>$username,"password"=>$password]);
        $_SESSION['user_id'] = $stmt->fetchColumn(0);
        if($stmt->rowCount() > 0){
            header("Location: ../../user_account.php");
            exit();
        }
    }
    

}
?>