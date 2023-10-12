<?php
session_start();
require('db.php');

$stmt = "SELECT * FROM Client WHERE id = " . $_SESSION['user_id'];
$result = $pdo->query($stmt);
$row = $result->fetch(PDO::FETCH_ASSOC);

$_SESSION['user_level'] = $row['Level'];
$_SESSION['xp'] = $row['XP'];
$_SESSION['isPremium'] = $row['PremiumID'];
//WIP
//$_SESSION['premiumExpDate'] = 

?>