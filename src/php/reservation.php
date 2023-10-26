<?php
include("db.php");
session_start();
$baseLink = "$_SERVER[HTTP_HOST]";
$return = "";
$parkingid = "";
$type = "";
$price = "";
$time = "";


if (isset($_GET["return"]))
    $return = $_GET["return"];
else {
    header("Location: /");
    exit();
}

if (isset($_GET["parkingid"]))
    $parkingid = $_GET["parkingid"];
else {
    header("Location: /");
    exit();
}
if (isset($_GET["type"]))
    $type = $_GET["type"];
else {
    header("Location: " . $return . "?id=" . $parkingid);
    exit();
}

if ($type == "make") {
    if (isset($_GET["cost"]))
        $price = $_GET["cost"];
    else {
        header("Location: " . $return . "?id=" . $parkingid);
        exit();
    }

    if (isset($_GET["time"]))
        $time = $_GET["time"];
    else {
        header("Location: " . $return . "?id=" . $parkingid);
        exit();
    }
}

if ($type == "cancel") {
    $activeReservations = $_SESSION["reservation_list"];
    $cancelID = "-1";
    $userID = $_SESSION['user_id'];
    foreach ($activeReservations as $key => $value) {
        if ($value["parking_id"] == $parkingid) {
            $cancelID = $key;
            break;
        }
    }
    if ($cancelID >= 0) {
        $stmt = "SELECT * FROM `reservation` WHERE parking_id = :pid AND client_id = :cid LIMIT 1";
        $delStmt = "DELETE FROM reservation WHERE parking_id=:pid AND client_id = :cid;";
        $getIfInList = $pdo->prepare($stmt);
        $deleteItem = $pdo->prepare($delStmt);
        $getIfInList->execute(["pid" => $parkingid, "cid" => $userID]);
        $result = $getIfInList->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            $deleteItem->execute(["pid" => $parkingid, "cid" => $userID]);
            unset($_SESSION["reservation_list"][$cancelID]);
        }
        ;
        header("Location: " . $return);
        exit();
    }
}


if ($type == "make") {
    date_default_timezone_set('Europe/Riga');
    $owner = "";
    $itemName = "";
    $userID = $_SESSION['user_id'];


    $stmt = "SELECT * FROM `reservation` WHERE parking_id = :pid AND client_id = :cid LIMIT 1";
    $insertStmt = "INSERT INTO `reservation`(`parking_id`, `client_id`, `end_time`) VALUES (:pid,:cid,:dtime)";
    $now = date("Y-m-d H:i:s");
    $minutes = $time * 60;
    $dtime = date('Y-m-d H:i:s', strtotime('+' . $minutes . ' minutes', strtotime($now)));
    $getIfInList = $pdo->prepare($stmt);
    $getIfInList->execute(["pid" => $parkingid, "cid" => $userID]);
    $result = $getIfInList->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) < 1) {
        echo count($result);
        $insertPrep = $pdo->prepare($insertStmt);
        $insertPrep->execute(["pid" => $parkingid, "cid" => $userID, "dtime" => $dtime]);
    }

    $ownerStmt = "SELECT * FROM `parking_list` WHERE id = :pid LIMIT 1";
    $getOwnerParking = $pdo->prepare($ownerStmt);
    $getOwnerParking->execute(["pid" => $parkingid]);
    
    $resultOwner = $getOwnerParking->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultOwner) > 0) {
        $owner =  $resultOwner[0]["company_name"];
        $itemName =  $resultOwner[0]["address"];
        header("Location: http://fenix.x10.mx/login.php/paymentAmount=".$price."&itemName=".$itemName."&owner=".$owner."");
        exit();
    }
}






?>