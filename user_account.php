<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require('./src/php/loadProfile.php');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$list_id = 0;
?>

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
    <header class="header-container popup-blur" id="header">
        <div class="header">
            <img src="src/img/logo.png" alt="ParKing" class="logo">
            <div class="header-links">
                <div class="header-links-clickable">
                    <a href="index.php" class="link">Homepage</a>
                    <a href="parking_list.php" class="link">Parking List</a>
                    <button class="btn btn-primary" onclick="window.location.href='login.php'">
                        <?php
                        if (!isset($_SESSION)) {
                            session_start();
                        }

                        if (!isset($_SESSION['username'])) {
                            echo "My Parking";
                        } else {
                            echo $_SESSION['username'];
                        }

                        ?>
                    </button>
                </div>
                <div>
                    <svg id="light-theme-toggle" class="theme-change" xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" viewBox="0 0 24 24">
                        <path fill="rgb(var(--primary-color))"
                            d="M12 5q-.425 0-.712-.288Q11 4.425 11 4V2q0-.425.288-.713Q11.575 1 12 1t.713.287Q13 1.575 13 2v2q0 .425-.287.712Q12.425 5 12 5Zm4.95 2.05q-.275-.275-.275-.688q0-.412.275-.712l1.4-1.425q.3-.3.712-.3q.413 0 .713.3q.275.275.275.7q0 .425-.275.7L18.35 7.05q-.275.275-.7.275q-.425 0-.7-.275ZM20 13q-.425 0-.712-.288Q19 12.425 19 12t.288-.713Q19.575 11 20 11h2q.425 0 .712.287q.288.288.288.713t-.288.712Q22.425 13 22 13Zm-8 10q-.425 0-.712-.288Q11 22.425 11 22v-2q0-.425.288-.712Q11.575 19 12 19t.713.288Q13 19.575 13 20v2q0 .425-.287.712Q12.425 23 12 23ZM5.65 7.05l-1.425-1.4q-.3-.3-.3-.725t.3-.7q.275-.275.7-.275q.425 0 .7.275L7.05 5.65q.275.275.275.7q0 .425-.275.7q-.3.275-.7.275q-.4 0-.7-.275Zm12.7 12.725l-1.4-1.425q-.275-.3-.275-.712q0-.413.275-.688q.275-.275.688-.275q.412 0 .712.275l1.425 1.4q.3.275.287.7q-.012.425-.287.725q-.3.3-.725.3t-.7-.3ZM2 13q-.425 0-.712-.288Q1 12.425 1 12t.288-.713Q1.575 11 2 11h2q.425 0 .713.287Q5 11.575 5 12t-.287.712Q4.425 13 4 13Zm2.225 6.775q-.275-.275-.275-.7q0-.425.275-.7L5.65 16.95q.275-.275.688-.275q.412 0 .712.275q.3.3.3.713q0 .412-.3.712l-1.4 1.4q-.3.3-.725.3t-.7-.3ZM12 18q-2.5 0-4.25-1.75T6 12q0-2.5 1.75-4.25T12 6q2.5 0 4.25 1.75T18 12q0 2.5-1.75 4.25T12 18Zm0-2q1.65 0 2.825-1.175Q16 13.65 16 12q0-1.65-1.175-2.825Q13.65 8 12 8q-1.65 0-2.825 1.175Q8 10.35 8 12q0 1.65 1.175 2.825Q10.35 16 12 16Zm0 0q-1.65 0-2.825-1.175Q8 13.65 8 12q0-1.65 1.175-2.825Q10.35 8 12 8q1.65 0 2.825 1.175Q16 10.35 16 12q0 1.65-1.175 2.825Q13.65 16 12 16Z" />
                    </svg>
                    <svg id="dark-theme-toggle" class="hide theme-change" xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 21q-3.75 0-6.375-2.625T3 12q0-3.75 2.625-6.375T12 3q.35 0 .688.025t.662.075q-1.025.725-1.638 1.888T11.1 7.5q0 2.25 1.575 3.825T16.5 12.9q1.375 0 2.525-.613T20.9 10.65q.05.325.075.662T21 12q0 3.75-2.625 6.375T12 21Z" />
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hide-hamburger" width="42" height="42"
                        viewBox="0 0 24 24">
                        <path fill="none" stroke="rgb(var(--primary-color))" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M5 17h14M5 12h14M5 7h14" />
                    </svg>
                </div>
            </div>
        </div>
    </header>
    <!-- User settings popup -->
    <div class="popup dropshadow hide" id="popup-account">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Account Settings</h2>
        <div class="user-account-settings-inputs">
            <div style="background-image: url('src/img/pfp.jpg');" class="user-pfp">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                    class="user-settings-button">
                    <path fill="rgb(var(--primary-color))"
                        d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM4 21q-.425 0-.713-.288T3 20v-2.825q0-.2.075-.388t.225-.337l10.3-10.3l4.25 4.25l-10.3 10.3q-.15.15-.337.225T6.825 21H4Z" />
                </svg>
            </div>
            <div class="user-account-settings-input">
                <label for="email">Email change</label>
                <input type="text" name="email" id="email" placeholder="your@email.com" class="input">
            </div>
            <div class="user-account-password-change">
                <div class="user-account-settings-input">
                    <label for="password">Password change</label>
                    <input type="password" name="password" id="password" placeholder="Current password" class="input">
                </div>
                <div class="user-account-settings-password-confirm">
                    <div>
                        <input type="password" name="new-password" id="new-password" placeholder="New password"
                            class="input">
                    </div>
                    <div>
                        <input type="password" name="confirm-password" id="confirm-password"
                            placeholder="Confirm password" class="input">
                    </div>
                </div>
            </div>
            <div class="user-account-update">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
        <div class="user-delete-account">
            <button class="btn btn-secondary" style="background-color: rgb(var(--danger-color)); color: white;">Cancel
                Subscription</button>
            <button class="btn btn-secondary" style="background-color: rgb(var(--danger-color)); color: white;">Delete
                Account</button>
        </div>
    </div>
    <!-- Add a parking space popup -->
    <div class="popup dropshadow hide" id="popup-add-parking">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Add a parking space</h2>
        <div class="user-account-settings-inputs max-input-width">
            <div class="input-stack">
                <input type="text" placeholder="Address" class="input" name="address" id="address">
                <input type="text" placeholder="Owned by.. (optional)" class="input" name="owned-by" id="owned-by">
                <input type="text" placeholder="Price (optional)" class="input" name="price" id="price">
                <input type="text" placeholder="Spots available" class="input" name="spots-available"
                    id="spots-available">
            </div>
            <div class="user-account-settings-input">
                <label for="email">Additional information (optional)</label>
                <textarea name="additional-info" id="additional-info" cols="30" rows="10" class="input input-textarea"
                    placeholder="Additional information"></textarea>
            </div>
            <div class="user-account-update">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <!-- Check on parking info -->
    <div class="popup dropshadow hide" id="popup-parking-info">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title" id="popup-address">Slokas iela 28, Zemgales priekšpilsēta, Rīga</h2>
        <div class="user-account-settings-inputs max-input-width popup-row">
            <div class="input-stack parking-info-text">
                <div class="input-stack">
                    <div><b>Reserved till:</b> 16:30 (20.09.2023)</div>
                    <div id="popup-price"><b>Price:</b> €3.20/h</div>
                </div>
                <button class="btn btn-secondary"
                    style="background-color: rgb(var(--danger-color)); color: white;">Cancel</button>
            </div>
            <div class="mapouter">
                <iframe class="gmap_canvas" width="200" height="200" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Slokas%20iela%2028&t=&z=17&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>
    <div class="popup-background hide" id="popup-background" onclick="closePopup()"></div>
    <!-- Main user profile page -->
    <div class="account-container" id="main-body">
        <div class="user-lvl-container">
            <div style="background-image: url('src/img/pfp.jpg');" class="user-pfp">
                <svg onclick="openPopup('popup-account')" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 24 24" class="user-settings-button">
                    <path fill="rgb(var(--primary-color))"
                        d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM4 21q-.425 0-.713-.288T3 20v-2.825q0-.2.075-.388t.225-.337l10.3-10.3l4.25 4.25l-10.3 10.3q-.15.15-.337.225T6.825 21H4Z" />
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
                        <p class="user-xp-bar-text">XP -
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
                                    echo '<div class="parking-space-info-'.$list_id.'">';
                                    echo '<h3 id="parking-space-info-'.$list_id.'-address"><b>' . $reservation['address'] . '</b></h3>';
                                    echo '<div class="parking-space-info-details">';
                                    echo '<div>';
                                    echo '<b>Price</b>';
                                    echo '<p id="parking-space-info-'.$list_id.'-price">' . $reservation['price'] . '€ / h</p>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<b style="display: none;">Rating</b>';
                                    echo '<p style="display: none;"></p>'; // Rating not implemented yet
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<button class="btn btn-primary" onclick="openDetailedPopup(\'popup-parking-info\', \'parking-space-info-'.$list_id.'\')">View Parking Space</button>';
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
                                    echo '<h3 id="parking-space-info-'.$list_id.'-address"><b>' . $favorite['address'] . '</b></h3>';
                                    echo '<div class="parking-space-info-details">';
                                    echo '<div>';
                                    echo '<b>Price</b>';
                                    echo '<p id="parking-space-info-'.$list_id.'-price">' . $favorite['price'] . '€ / h</p>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<b style="display: none;">Rating</b>';
                                    echo '<p style="display: none;"></p>'; // Rating not implemented yet
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="parking-fav-buttons">';
                                    echo '<button class="btn btn-secondary">Remove favorite</button>';
                                    echo '<button class="btn btn-primary" onclick="openDetailedPopup(\'popup-parking-info\', \'parking-space-info-'.$list_id.'\')">View Parking Space</button>';
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

</html>