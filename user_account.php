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
    <header class="header-container" id="header">
        <div class="header">
            <img src="src/img/logo.png" alt="ParKing" class="logo">
            <div class="header-links">
                <div class="header-links-clickable">
                    <a href="index.php" class="link">Homepage</a>
                    <a href="parking_list.php" class="link">Parking List</a>
                    <button class="btn btn-primary" onclick="window.location.href='login.php'">My Parking</button>
                </div>
                <div>
                    <svg id="light-theme-toggle" class="theme-change" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="rgb(var(--primary-color))" d="M12 5q-.425 0-.712-.288Q11 4.425 11 4V2q0-.425.288-.713Q11.575 1 12 1t.713.287Q13 1.575 13 2v2q0 .425-.287.712Q12.425 5 12 5Zm4.95 2.05q-.275-.275-.275-.688q0-.412.275-.712l1.4-1.425q.3-.3.712-.3q.413 0 .713.3q.275.275.275.7q0 .425-.275.7L18.35 7.05q-.275.275-.7.275q-.425 0-.7-.275ZM20 13q-.425 0-.712-.288Q19 12.425 19 12t.288-.713Q19.575 11 20 11h2q.425 0 .712.287q.288.288.288.713t-.288.712Q22.425 13 22 13Zm-8 10q-.425 0-.712-.288Q11 22.425 11 22v-2q0-.425.288-.712Q11.575 19 12 19t.713.288Q13 19.575 13 20v2q0 .425-.287.712Q12.425 23 12 23ZM5.65 7.05l-1.425-1.4q-.3-.3-.3-.725t.3-.7q.275-.275.7-.275q.425 0 .7.275L7.05 5.65q.275.275.275.7q0 .425-.275.7q-.3.275-.7.275q-.4 0-.7-.275Zm12.7 12.725l-1.4-1.425q-.275-.3-.275-.712q0-.413.275-.688q.275-.275.688-.275q.412 0 .712.275l1.425 1.4q.3.275.287.7q-.012.425-.287.725q-.3.3-.725.3t-.7-.3ZM2 13q-.425 0-.712-.288Q1 12.425 1 12t.288-.713Q1.575 11 2 11h2q.425 0 .713.287Q5 11.575 5 12t-.287.712Q4.425 13 4 13Zm2.225 6.775q-.275-.275-.275-.7q0-.425.275-.7L5.65 16.95q.275-.275.688-.275q.412 0 .712.275q.3.3.3.713q0 .412-.3.712l-1.4 1.4q-.3.3-.725.3t-.7-.3ZM12 18q-2.5 0-4.25-1.75T6 12q0-2.5 1.75-4.25T12 6q2.5 0 4.25 1.75T18 12q0 2.5-1.75 4.25T12 18Zm0-2q1.65 0 2.825-1.175Q16 13.65 16 12q0-1.65-1.175-2.825Q13.65 8 12 8q-1.65 0-2.825 1.175Q8 10.35 8 12q0 1.65 1.175 2.825Q10.35 16 12 16Zm0 0q-1.65 0-2.825-1.175Q8 13.65 8 12q0-1.65 1.175-2.825Q10.35 8 12 8q1.65 0 2.825 1.175Q16 10.35 16 12q0 1.65-1.175 2.825Q13.65 16 12 16Z" />
                    </svg>
                    <svg id="dark-theme-toggle" class="hide theme-change" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 21q-3.75 0-6.375-2.625T3 12q0-3.75 2.625-6.375T12 3q.35 0 .688.025t.662.075q-1.025.725-1.638 1.888T11.1 7.5q0 2.25 1.575 3.825T16.5 12.9q1.375 0 2.525-.613T20.9 10.65q.05.325.075.662T21 12q0 3.75-2.625 6.375T12 21Z" />
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hide-hamburger" width="42" height="42" viewBox="0 0 24 24">
                        <path fill="none" stroke="rgb(var(--primary-color))" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17h14M5 12h14M5 7h14" />
                    </svg>
                </div>
            </div>
        </div>
    </header>
    <div class="account-container">
        <div class="user-lvl-container">
            <div class="user-current-lvl">
                <h2>Level</h2>
                <h1 class="gradient-text">16</h1>
            </div>
            <div class="user-xp-container">
                <div class="user-xp-bar">
                    <div class="user-xp-bar-fill"></div>
                </div>
                <p>XP - 5210/6000</p>
            </div>
            <button class="btn btn-primary">
                <h3>Add Parking Space<h3>
            </button>
        </div>
        <div class="user-info-container">
            <div class="user-info-left">
                <div class="current-plan">
                    <p>Current plan: <b class="gradient-text" style="text-transform: uppercase;">premium</b></p>
                    <p>Expiration date: <b class="gradient-text">5th Jun, 2024 23:59</b></p>
                </div>
                <div class="user-parking-spaces-container">
                    <h2>My Parking Spaces</h2>
                    <div class="parking-spaces">
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-right">
                <div class="user-account-settings">
                    <h2>Account Settings</h2>
                    <div class="user-account-settings-inputs">
                        <div class="user-account-settings-input">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="your@email.com" class="input">
                        </div>
                        <div class="user-account-settings-input">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Current password" class="input">
                        </div>
                        <div class="user-account-settings-password-confirm">
                            <div class="user-account-settings-input">
                                <label for="new-password">New Password</label>
                                <input type="password" name="new-password" id="new-password" placeholder="New password" class="input">
                            </div>
                            <div class="user-account-settings-input">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password" class="input">
                            </div>
                        </div>
                        <div class="user-account-update">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <div class="user-delete-account">
                    <button class="btn btn-secondary" style="background-color: rgb(var(--danger-color)); color: white;">Cancel Subscription</button>
                </div>
            </div>
        </div>
        <div class="fav-parking-spots-container">
        <div class="user-parking-spaces-container">
                    <h2>Favorites</h2>
                    <div class="parking-spaces">
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                        <div class="parking-space">
                            <div class="parking-space-info">
                                <h3><b>Slokas iela 28, Zemgales priekšpilsēta, Rīga</b></h3>
                                <div class="parking-space-info-details">
                                    <div>
                                        <b>Price</b>
                                        <p>10$</p>
                                    </div>
                                    <div>
                                        <b>Rating</b>
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">View Parking Space</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
<script src="src/js/main.js"></script>