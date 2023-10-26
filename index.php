<?php
if (!isset($_SESSION)) {
    session_start();
}
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
    <div class="header-dropshadow"></div>
    <div class="container">
        <div class="hero-container">
            <div class="hero">
                <div class="hero-text">
                    <h1>Welcome to <b class="gradient-text">ParKing</b></h1>
                    <h2>The easiest way to find and reserve parking</h2>
                    <h3>
                        Whether you need a place to park for an hour, a day, or a week, <b
                            class="gradient-text">ParKing</b> has you covered. browse a list of available parking spaces
                        near you, see the price and location, and book them with a few taps.
                    </h3>
                </div>
                <img src="src/img/car.svg" alt="Car" class="hero-img dark-glow">
            </div>
        </div>
        <div class="functions">
            <h2 class="gradient-text dark-glow-text">How it works</h2>
            <div class="functions-container">
                <div class="function gradient-functions">
                    <h2 class="function-number">#1</h2>
                    <div class="function-info">
                        <img src="src/img/function1.svg" alt="function 1" class="function-img">
                        <div class="function-text">
                            <h2>Browse</h2>
                            <p>Browse a map of available parking spots in the area.</p>
                        </div>
                    </div>
                </div>
                <div class="function gradient-functions">
                    <h2 class="function-number">#2</h2>
                    <div class="function-info">
                        <img src="src/img/function2.svg" alt="function 2" class="function-img">
                        <div class="function-text">
                            <h2>Select</h2>
                            <p>Select a spot and make a reservation.</p>
                        </div>
                    </div>
                </div>
                <div class="function gradient-functions">
                    <h2 class="function-number">#3</h2>
                    <div class="function-info">
                        <img src="src/img/function1.svg" alt="function 3" class="function-img">
                        <div class="function-text">
                            <h2>Drive</h2>
                            <p>Drive to the spot and park your car.</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3><b>That's it!</b></h3>
            <p><b class="gradient-text">ParKing</b> makes parking easy and convenient.</p>
        </div>
        <div class="features">
            <h2 class="gradient-text features-title dark-glow-text">Features</h2>
            <div class="features-container">
                <div class="feature">
                    <div class="feature-title dark-glow">
                        <img src="src/img/feature1.svg" alt="feature 1" class="feature-img">
                        <h2>Find parking</h2>
                    </div>
                    <p>Browse and view information about parking spots in your local area.</p>
                </div>
            </div>
            <div class="features-container">
                <div class="feature">
                    <div class="feature-title dark-glow">
                        <img src="src/img/feature2.svg" alt="feature 2" class="feature-img">
                        <h2>Free Parking</h2>
                    </div>
                    <p>Check out local community parking spot reports.</p>
                </div>
            </div>
            <div class="features-container">
                <div class="feature">
                    <div class="feature-title dark-glow">
                        <img src="src/img/feature3.svg" alt="feature 3" class="feature-img">
                        <h2>Premium Parking</h2>
                    </div>
                    <p>Reserve premium parking spots at popular locations, such as airports, train stations, and
                        sporting events.</p>
                </div>
            </div>
            <div class="features-container">
                <div class="feature">
                    <div class="feature-title">
                        <img src="src/img/feature4.svg" alt="feature 4" class="feature-img">
                        <h2>Feedback</h2>
                    </div>
                    <p>Become part of the community! Report and list free parking spaces in your area.</p>
                </div>
            </div>
            <div class="features-container">
                <div class="feature">
                    <div class="feature-title">
                        <img src="src/img/feature5.svg" alt="feature 5" class="feature-img">
                        <h2>Rewards</h2>
                    </div>
                    <p>Receive rewards and level up for posting reports about your near by parking pots.</p>
                </div>
            </div>
        </div>
        <div class="app-dl graident-app-dl">
            <h2 class="gradient-text dark-glow-text">Give it a test drive</h2>
            <div class="app-dl-container">
                <img src="src/img/google-play.svg" alt="Google Play" class="google-play">
                <p>Download the ParKing app today and see how easy it is to find and reserve parking!</p>
            </div>
        </div>
        <div class="plans">
            <h2 class="gradient-text dark-glow-text">Plans & Pricing</h2>
            <div class="plans-container">
                <div class="plan">
                    <h2>Basic</h2>
                    <h3>0$</h3>
                    <ul class="premium-list">
                        <li>Find parking spots in your local area based on community reports</li>
                        <li>Favorite your most visited parking spots for later</li>
                        <li>View your parking history</li>
                    </ul>
                    <button class="btn btn-secondary">Sign up</button>
                </div>
                <div class="plan plan-premium dark-glow">
                    <div class="plan-title">
                        <img src="src/img/feature3.svg" alt="Premium" class="premium-img">
                        <h2>Premium</h2>
                    </div>
                    <h3>9.99$ / month</h3>
                    <ul class="premium-list">
                        <li>Reserve premium parking spots at popular locations</li>
                        <li>Receive discounts on parking</li>
                        <li>Get priority support from customer service</li>
                        <li>Enjoy the ParKing app without any ads</li>
                    </ul>
                    <button class="btn btn-primary">Sign up</button>
                </div>
            </div>
        </div>
        <div class="footer">
            <img src="src/img/logo.png" alt="ParKing" class="footer-logo">
            <p>Copyright © 2023 ParKing. All rights reserved.</p>
        </div>
</body>
<script src="src/js/main.js"></script>

</html>