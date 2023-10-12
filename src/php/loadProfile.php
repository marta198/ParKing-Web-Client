<?php
if (!isset($_SESSION)) {
    session_start();
}
require('db.php');

// DEBUG
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$stmt = "SELECT * FROM client_data WHERE clientID = " . $_SESSION['user_id'];
$result = $pdo->query($stmt);
$row = $result->fetch(PDO::FETCH_ASSOC);

$_SESSION['user_level'] = $row['level'];
$_SESSION['xp'] = $row['XP'];
$_SESSION['isPremium'] = $row['premiumID'];
$_SESSION['premiumExpDate'] = $row['Premium_ends'];
$_SESSION['username'] = $row['username'];



$stmt = "SELECT * FROM reservation_list WHERE username = '" . $_SESSION['username'] . "' ORDER BY start_time DESC";
$result = $pdo->query($stmt);
$_SESSION["reservation_list"] = $result->fetchAll(PDO::FETCH_ASSOC);

$stmt = "SELECT * FROM favorites_list WHERE username = '" . $_SESSION['username'] . "'";
$result = $pdo->query($stmt);
$_SESSION["favorites_list"] = $result->fetchAll(PDO::FETCH_ASSOC);
?>