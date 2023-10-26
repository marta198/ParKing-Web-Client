<?php
require_once 'db.php';

function uploadImage($filePath) {
    $url = 'https://api.imgbb.com/1/upload';
    $apiKey = 'b99334dc3298f1742144a6a51ab0619f'; //AFTER SHOWCASE THIS KEY WILL BE DELETED

    if (function_exists('curl_file_create')) {
        $cFile = curl_file_create($filePath);
    } else {
        $cFile = '@' . realpath($filePath);
    }

    $postFields = array('image' => $cFile, 'key' => $apiKey);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error API:' . curl_error($ch) . '<br>';
        return null;
    }

    curl_close ($ch);

    $responseData = json_decode($response, true);

    if ($responseData['success']) {
        return $responseData['data']['url'];
    } else {
        echo 'Error API: ' . $responseData['status_txt'] . '<br>';
        return null;
    }
}

session_start();

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

if (isset($_POST['update_info'])) {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        echo 'Error: User session not found.';
        exit();
    }

    // Hander username
    if (isset($_POST['username'])) {
        $newUsername = $_POST['username'];
        $sql = "SELECT COUNT(*) FROM client WHERE username = :newUsername";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newUsername', $newUsername, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            echo 'Username already exists in the database';
            header('Location: ../../user_account.php?usernameExists');
        } else {
            $sql = "UPDATE client SET username = :newUsername WHERE id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':newUsername', $newUsername, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                echo 'Error updating username in the database: ' . $stmt->errorInfo()[2];
            }
        }
    }

    // Handle profile picture update
    if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture'])) {
        $file = $_FILES['profile_picture'];
    
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Use the uploadImage function to upload the image
            $imgbbUrl = uploadImage($file['tmp_name']);
    
            if ($imgbbUrl !== null) {
                // Update the image URL in the database
                $imageUrl = $imgbbUrl;
                $sql = "UPDATE client SET image = :imageUrl WHERE id = :userId";
    
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':imageUrl', $imageUrl, PDO::PARAM_STR);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    
                if (!$stmt->execute()) {
                    echo 'Error updating image URL in the database: ' . $stmt->errorInfo()[2];
                }
            } else {
                echo 'Error uploading the image to ImgBB.';
            }
        } else {
            echo 'Error: ' . $file['error'];
        }
    }
    

    // Handle email update
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $newEmail = $_POST['email'];
        $checkEmailSql = "SELECT COUNT(*) FROM client WHERE email = :newEmail AND id != :userId";

        $checkStmt = $pdo->prepare($checkEmailSql);
        $checkStmt->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
        $checkStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $checkStmt->execute();

        $emailExists = $checkStmt->fetchColumn();

        if ($emailExists > 0) {
            echo 'Error: Email already exists.';
            header('Location: ../../user_account.php?emailExists');
        } else {
            $updateEmailSql = "UPDATE client SET email = :newEmail WHERE id = :userId";

            $stmt = $pdo->prepare($updateEmailSql);
            $stmt->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo 'Error updating email in the database: ' . $stmt->errorInfo()[2];
            }
        }
    }


    // Handle password update
    if ((isset($_POST['new_password'], $_POST['confirm_password'], $_POST['current_password'])) || $_POST['new_password'] !== '' || $_POST['confirm_password'] !== '' || $_POST['current_password'] !== '') {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmNewPassword = $_POST['confirm_password'];

        if ($newPassword === $confirmNewPassword) {
            $stmt = $pdo->prepare("SELECT password FROM client WHERE id = :userId");
            $stmt->execute(['userId' => $userId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty($row) && $row['password'] === $currentPassword) {
                $stmt = $pdo->prepare("UPDATE client SET password = :newPassword WHERE id = :userId");
                $stmt->execute(['newPassword' => $newPassword, 'userId' => $userId]);
                // Update successful
            } else {
                echo 'Error: Current password is incorrect.';
            }
        } else {
            echo 'Error: New passwords do not match.';
            header('Location: ../../user_account.php?passwordsDoNotMatch');
        }
    }
}

$pdo = null;
header('Location: ../../user_account.php?updateSuccess');
