<?php
session_start();
require('./src/php/loadProfile.php');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$list_id = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ParKing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="src/css/colors-light.css" id="theme-style">
    <link rel="apple-touch-icon" sizes="180x180" href="src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="src/img/favicon/site.webmanifest">
</head>

<body>
    <?php include("src/php/header.php") ?>
    <!-- User settings popup -->
    <div class="popup dropshadow hide" id="popup-account">
        <svg class="close-popup" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" onclick="closePopup(); loadOldImage();">
            <path fill="rgb(var(--text-color))" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Account Settings</h2>
        <form action="src/php/updateUserInfo.php" method="POST" enctype="multipart/form-data">
            <div class="user-account-settings-inputs">
                <div class="user-pfp" id="user-pfp-settings" style="
            background-image: url('<?php
                                    if (isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        $sql = "SELECT image FROM client WHERE id = $user_id";
                                        $result = $pdo->query($sql);
                                        $row = $result->fetch(PDO::FETCH_ASSOC);
                                        if (!empty($row['image'])) {
                                            echo $row['image'];
                                        } else {
                                            echo 'src/img/pfp.jpg';
                                        }
                                    } else {
                                        echo 'src/img/pfp.jpg';
                                    }
                                    ?>');">
                    <label for="fileInput">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="user-settings-button">
                            <path fill="rgb(var(--primary-color))" d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM4 21q-.425 0-.713-.288T3 20v-2.825q0-.2.075-.388t.225-.337l10.3-10.3l4.25 4.25l-10.3 10.3q-.15.15-.337.225T6.825 21H4Z" />
                        </svg>
                    </label>
                    <input type="file" name="profile_picture" id="fileInput" style="display: none;" accept="image/*" onchange="loadFile(this)">
                </div>

                <div class="user-account-settings-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username" class="input" value="<?php
                                                                                                                        if (isset($_SESSION['user_id'])) {
                                                                                                                            $user_id = $_SESSION['user_id'];
                                                                                                                            $sql = "SELECT username FROM client WHERE id = $user_id";
                                                                                                                            $result = $pdo->query($sql);
                                                                                                                            $row = $result->fetch(PDO::FETCH_ASSOC);
                                                                                                                            if (!empty($row['username'])) {
                                                                                                                                echo $row['username'];
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>" required>
                </div>

                <div class="user-account-settings-input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="your@email.com" class="input" value="<?php
                                                                                                                    if (isset($_SESSION['user_id'])) {
                                                                                                                        $user_id = $_SESSION['user_id'];
                                                                                                                        $sql = "SELECT email FROM client WHERE id = $user_id";
                                                                                                                        $result = $pdo->query($sql);
                                                                                                                        $row = $result->fetch(PDO::FETCH_ASSOC);
                                                                                                                        if (!empty($row['email'])) {
                                                                                                                            echo $row['email'];
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>" required>
                </div>

                <div class="user-account-password-change">
                    <div class="user-account-settings-input">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" placeholder="Current password" class="input">
                    </div>

                    <div class="user-account-settings-password-confirm">
                        <div>
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" placeholder="New password" class="input">
                        </div>
                        <div>
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" class="input">
                        </div>
                    </div>
                </div>
                <div class="user-account-update">
                    <button type="submit" class="btn btn-primary" name="update_info">Update</button>
                </div>
            </div>
        </form>


        <div class="user-delete-account">
            <button class="btn btn-secondary" style="background-color: rgb(var(--danger-color)); color: white;">Cancel
                Subscription</button>
            <button class="btn btn-secondary" style="background-color: rgb(var(--danger-color)); color: white;">Delete
                Account</button>
        </div>
    </div>
    <!-- Add a parking space popup -->
    <div class="popup dropshadow hide" id="popup-add-parking">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Add a parking space</h2>
        <div class="user-account-settings-inputs max-input-width">
            <div class="input-stack">
                <input type="text" placeholder="Address" class="input" name="address" id="address">
                <input type="text" placeholder="Owned by.. (optional)" class="input" name="owned-by" id="owned-by">
                <input type="text" placeholder="Price (optional)" class="input" name="price" id="price">
                <input type="text" placeholder="Spots available" class="input" name="spots-available" id="spots-available">
            </div>
            <div class="user-account-settings-input">
                <label for="email">Additional information (optional)</label>
                <textarea name="additional-info" id="additional-info" cols="30" rows="10" class="input input-textarea" placeholder="Additional information"></textarea>
            </div>
            <div class="user-account-update">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <!-- Check on parking info -->
    <div class="popup dropshadow hide" id="popup-parking-info">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title" id="popup-address">Slokas iela 28, Zemgales priekšpilsēta, Rīga</h2>
        <div class="user-account-settings-inputs max-input-width popup-row">
            <div class="input-stack parking-info-text">
                <div class="input-stack">
                    <div><b>Reserved till:</b> 16:30 (20.09.2023)</div>
                    <div id="popup-price"><b>Price:</b> €3.20/h</div>
                </div>
                <button class="btn btn-secondary" style="background-color: rgb(var(--danger-color)); color: white;"  onclick="cancelReservation()">Cancel</button>
            </div>
            <div class="mapouter">
                <iframe class="gmap_canvas" width="200" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=Slokas%20iela%2028&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>
    <div class="popup-background hide" id="popup-background" onclick="closePopup()"></div>
    <!-- Main user profile page -->
    <div class="account-container" id="main-body">
        <div class="user-lvl-container">
            <div style="<?php if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT image FROM client WHERE id = $user_id";
                            $result = $pdo->query($sql);
                            $row = $result->fetch(PDO::FETCH_ASSOC);
                            if (!empty($row['image'])) {
                                echo 'background-image: url(' . $row['image'] . ');';
                            } else {
                                echo 'background-image: url(\'src/img/pfp.jpg\');';
                            }
                        } else {
                            echo 'background-image: url(\'src/img/pfp.jpg\');';
                        }
                        ?>
            ) " class="user-pfp" id="user-pfp">
                <svg onclick="openPopup('popup-account')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="user-settings-button">
                    <path fill="rgb(var(--primary-color))" d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM4 21q-.425 0-.713-.288T3 20v-2.825q0-.2.075-.388t.225-.337l10.3-10.3l4.25 4.25l-10.3 10.3q-.15.15-.337.225T6.825 21H4Z" />
                </svg>
            </div>
            <div class="user-current-lvl">
                <h2>Level</h2>
                <h1 class="gradient-text">
                    <?php echo $_SESSION['user_level'] ?>
                </h1>
            </div>
            <div class="user-xp-container">
                <div class="user-xp-bar">
                    <div class="user-xp-bar-fill">
                        <p class="user-xp-bar-text">
                            <?php echo $_SESSION['xp']; ?>/6000
                        </p>
                    </div>
                </div>
                <div class="current-plan">
                    <p>Current plan: <b class="gradient-text" style="text-transform: uppercase;">
                            <?php
                            if ($_SESSION['isPremium'] == NULL) {
                                echo 'not premium';
                            } else {
                                echo 'premium';
                            }
                            ?>
                        </b></p>
                    <?php
                    if ($_SESSION['isPremium'] != NULL) {
                        echo '<p>Expiration date: <b class="gradient-text">' . $_SESSION['premiumExpDate'] . '</b></p>';
                    }
                    ?>
                    <button class="btn btn-primary add-space-button" onclick="openPopup('popup-add-parking')">
                        Add A Parking Space
                    </button>
                </div>
            </div>
        </div>
        <div class="user-info-container">
            <div class="user-info-left">
                <div class="user-parking-spaces-container">
                    <h2>My Parking Spaces</h2>
                    <div class="parking-spaces">

                        <?php
                        if (empty($_SESSION['reservation_list'])) {
                            echo '<p>You have no parking spaces reserved.</p>';
                        } else {
                            if (!empty($_SESSION['reservation_list'])) {
                                foreach ($_SESSION['reservation_list'] as $reservation) {
                                    echo '<div class="parking-space">';
                                    echo '<div class="parking-space-info-' . $list_id . '"  parkingID='.$reservation["parking_id"].'>';
                                    echo '<h3 id="parking-space-info-' . $list_id . '-address"><b>' . $reservation['address'] . '</b></h3>';
                                    echo '<div class="parking-space-info-details">';
                                    echo '<div>';
                                    echo '<b>Price</b>';
                                    echo '<p id="parking-space-info-' . $list_id . '-price">' . $reservation['price'] . '€/h</p>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<b style="display: none;">Rating</b>';
                                    echo '<p style="display: none;"></p>'; // Rating not implemented yet
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<button class="btn btn-primary" onclick="openDetailedPopup(\'popup-parking-info\', \'parking-space-info-' . $list_id . '\')">View Parking Space</button>';
                                    echo '</div>';
                                    $list_id++;
                                }
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="user-info-right">
                <div class="user-parking-spaces-container">
                    <h2>Favorites</h2>
                    <div class="parking-spaces">
                        <?php
                        if (empty($_SESSION['favorites_list'])) {
                            echo '<p>You have no parking spaces reserved.</p>';
                        } else {
                            if (!empty($_SESSION['favorites_list'])) {
                                foreach ($_SESSION['favorites_list'] as $favorite) {
                                    echo '<div class="parking-space">';
                                    echo '<div class="parking-space-info">';
                                    echo '<h3 id="parking-space-info-' . $list_id . '-address"><b>' . $favorite['address'] . '</b></h3>';
                                    echo '<div class="parking-space-info-details">';
                                    echo '<div>';
                                    echo '<b>Price</b>';
                                    echo '<p id="parking-space-info-' . $list_id . '-price">' . $favorite['price'] . '€/h</p>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<b style="display: none;">Rating</b>';
                                    echo '<p style="display: none;"></p>'; // Rating not implemented yet
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="parking-fav-buttons">';
                                    echo '<button class="btn btn-secondary">Remove favorite</button>';
                                    echo '<button class="btn btn-primary" onclick="openDetailedPopup(\'popup-parking-info\', \'parking-space-info-' . $list_id . '\')">View Parking Space</button>';
                                    echo '</div>';
                                    echo '</div>';
                                    $list_id++;
                                }
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="src/js/main.js"></script>
<?php
if (isset($_GET['updateSuccess'])){
    echo '<script>setTimeout(function(){alert("Information updated.")}, 100);</script>';
}
if (isset($_GET['usernameExists'])){
    echo '<script>setTimeout(function(){alert("Username already exists.")}, 100);</script>';
}
if (isset($_GET['emailExists'])){
    echo '<script>setTimeout(function(){alert("Email already exists.")}, 100);</script>';
}
if (isset($_GET['passwordsDoNotMatch'])){
    echo '<script>setTimeout(function(){alert("Passwords do not match.")}, 100);</script>';
}
?>
</html>