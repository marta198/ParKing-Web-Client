<?php
session_start();
require('db.php');

$stmt = "SELECT * FROM client_data WHERE clientID = " . $_SESSION['user_id'];
$result = $pdo->query($stmt);
$row = $result->fetch(PDO::FETCH_ASSOC);

$_SESSION['user_level'] = $row['level'];
$_SESSION['xp'] = $row['XP'];
$_SESSION['isPremium'] = $row['premiumID'];
$_SESSION['premiumExpDate'] = $row['Premium_ends'];

?>