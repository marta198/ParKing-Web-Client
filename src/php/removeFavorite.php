<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION)) {
    session_start();
}

require "db.php";

if ($_POST['action'] == 'removeFavorite') {

    $parking_id = $_POST['parkingID'];
    $user_id = $_POST['userID'];

    $pdo->query("DELETE FROM favorite_parking WHERE client_id = '$user_id' AND parking_id = '$parking_id'");
}
    ?>