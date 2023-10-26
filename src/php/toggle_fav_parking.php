<?php


if (!isset($_SESSION)) {
    session_start();
}

if ($_POST['action'] == 'toggle_fav_parking') {

    include 'db.php';

    $parking_id = $_POST['parkingID'];

    if (!empty($parking_id)) {

        //DEBUG
        echo $parking_id;

        $username = $_SESSION["username"];
        $result = $pdo->query("SELECT id from client where username='$username'");

        //get user id from username
        $username = $_SESSION["username"];
        $result = $pdo->query("SELECT id FROM client WHERE username='$username'");
        if ($result->rowCount() == 1) {
            $user_id = $result->fetchColumn();
        }


        //check if user has parking spot in faves
        $result = $pdo->query("SELECT * from favorite_parking WHERE client_id = '$user_id' AND parking_id = '$parking_id'");
        if ($result->rowCount() == 0) {
            $pdo->query("INSERT INTO favorite_parking (client_id, parking_id) VALUES ('$user_id', '$parking_id')");
        } else {
            $pdo->query("DELETE FROM favorite_parking WHERE client_id = '$user_id' AND parking_id = '$parking_id'");
        }

    }
}
?>