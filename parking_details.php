<?php


if (!isset($_SESSION)) {
    session_start();
}
?>


<?php include("src/php/db.php") ?>
<?php include("src/php/statements.php") ?>
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
    <!-- Youre awesome popup -->
    <div class="popup dropshadow hide" id="popup-youre-awesome">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title gradient-text" style="text-align: center; width: 100%;">🎊You're awesome!🎊</h2>
        <label style="text-align: center;">Your feedback is very important to us, and it helps us to make the ParKing
            app better for everyone.
            <br><br><b>Thanks again for your help!</b></label>
        <div class="popup-buttons-multiple">
            <button class="btn btn-primary" onclick="closePopup()">Close</button>
        </div>
    </div>
    </div>
    <!-- Arrived popup -->
    <div class="popup dropshadow hide" id="popup-arrived">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title" style="text-align: center; width: 100%;">Thanks for helping us!</h2>
        <div class="user-account-settings-inputs max-input-width">
            <label style="text-align: center;"><b>One more thing.</b> Can you please roughly count the number of
                available parking spots around you?</label>
            <div class="input-stack payment-slider">
                <input type="text" class="input" placeholder="Enter rough amount">
            </div>
            <div class="popup-buttons-multiple">
                <button class="btn btn-primary" onclick="closePopup(); openPopup('popup-youre-awesome')">Submit</button>
                <button class="btn btn-secondary" onclick="closePopup()">Close</button>
            </div>
            <p class="details-feedback">Your feedback will help other users to find parking more easily. Thanks again!
            </p>
        </div>
    </div>
    <!-- Reserve popup -->
    <div class="popup dropshadow hide" id="popup-reserve">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Reserve Biķernieku iela, bld. 79, Rīga</h2>
        <div class="user-account-settings-inputs max-input-width">
            <label style="text-align: center;">Select for how long you are going to stay there.</label>
            <div class="input-stack payment-slider">
                <input type="range" min="0.5" max="48" class="slider" id="payment-hours" value="0.5" step="0.5"
                    oninput="updateSliderValue(this.value)">
                <h2 id="payment-hours-value">0.5h | €0.25</h2>
            </div>
            <div class="user-account-update">
                <button class="btn btn-primary" onclick="makeReservation()" >Pay</button>
            </div>
        </div>
    </div>

    <!-- Write a report popup -->
    <div class="popup dropshadow hide" id="popup-write-report">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Report a problem</h2>
        <div class="user-account-settings-inputs max-input-width">
            <label>Quick report</label>
            <div class="dropdown">
                <span class="dropdown-toggle" id="quick-report-dropdown-btn-span"
                    onclick="toggleDropdownContent()">Select
                    Quick Report</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z" />
                </svg>
                <div class="dropdown-content" id="quick-report-dropdown" aria-labelledby="quick-report-dropdown-btn">
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Parking space taken</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Wrong parking price</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Construction</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Broken / missing parking meter</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Lack of signage</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Poor lighting</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Safety concerns</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">Damaged pavement</button>
                    <button class="dropdown-item" onclick="selectQuickReport(this)">False parking spot</button>
                </div>
            </div>

            <div class="user-account-settings-input">
                <label>Detailed report (optional)</label>
                <textarea name="additional-info" id="additional-info" cols="30" rows="10" class="input input-textarea"
                    placeholder="Additional information"></textarea>
            </div>
            <div class="user-account-update">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <div class="popup-background hide" id="popup-background" onclick="closePopup()"></div>
    <!-- Write review popup -->
    <div class="popup dropshadow hide" id="popup-write-review">
        <svg class="close-popup" onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
            viewBox="0 0 24 24">
            <path fill="rgb(var(--text-color))"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" />
        </svg>
        <h2 class="popup-title">Write a review</h2>
        <div class="user-account-settings-inputs max-input-width">
            <div class="input-stack">
                <input type="text" placeholder="Title" class="input" name="title" id="title">
                <textarea name="additional-info" id="additional-info" cols="30" rows="10" class="input input-textarea"
                    placeholder="Your review.."></textarea>
            </div>
            <div class="popup-review-stars">

                <div class="review-stars" id="review-stars-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="favorite-star"
                        id="favorite-star-empty-1" onclick="toggleStarReview(1)">
                        <path fill="rgb(var(--star-yellow))"
                            d="M9.6 16.65L12 14.8l2.4 1.85l-.9-3.05l2.25-1.6h-2.8L12 8.9l-.95 3.1h-2.8l2.25 1.6l-.9 3.05Zm2.4.65l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Zm0-4.525Z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="favorite-star hide" id="favorite-star-full-1" onclick="toggleStarReview(1)">
                        <path fill="rgb(var(--star-yellow))"
                            d="m12 17.3l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Z" />
                    </svg>
                </div>

                <div class="review-stars" id="review-stars-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="favorite-star"
                        id="favorite-star-empty-2" onclick="toggleStarReview(2)">
                        <path fill="rgb(var(--star-yellow))"
                            d="M9.6 16.65L12 14.8l2.4 1.85l-.9-3.05l2.25-1.6h-2.8L12 8.9l-.95 3.1h-2.8l2.25 1.6l-.9 3.05Zm2.4.65l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Zm0-4.525Z" />
                    </svg>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="favorite-star hide" id="favorite-star-full-2" onclick="toggleStarReview(2)">
                        <path fill="rgb(var(--star-yellow))"
                            d="m12 17.3l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Z" />
                    </svg>
                </div>
                <div class="review-stars" id="review-stars-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="favorite-star"
                        id="favorite-star-empty-3" onclick="toggleStarReview(3)">
                        <path fill="rgb(var(--star-yellow))"
                            d="M9.6 16.65L12 14.8l2.4 1.85l-.9-3.05l2.25-1.6h-2.8L12 8.9l-.95 3.1h-2.8l2.25 1.6l-.9 3.05Zm2.4.65l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Zm0-4.525Z" />
                    </svg>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="favorite-star hide" id="favorite-star-full-3" onclick="toggleStarReview(3)">
                        <path fill="rgb(var(--star-yellow))"
                            d="m12 17.3l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Z" />
                    </svg>
                </div>

                <div class="review-stars" id="review-stars-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="favorite-star"
                        id="favorite-star-empty-4" onclick="toggleStarReview(4)">
                        <path fill="rgb(var(--star-yellow))"
                            d="M9.6 16.65L12 14.8l2.4 1.85l-.9-3.05l2.25-1.6h-2.8L12 8.9l-.95 3.1h-2.8l2.25 1.6l-.9 3.05Zm2.4.65l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Zm0-4.525Z" />
                    </svg>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="favorite-star hide" id="favorite-star-full-4" onclick="toggleStarReview(4)">
                        <path fill="rgb(var(--star-yellow))"
                            d="m12 17.3l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Z" />
                    </svg>
                </div>

                <div class="review-stars" id="review-stars-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="favorite-star"
                        id="favorite-star-empty-5" onclick="toggleStarReview(5)">
                        <path fill="rgb(var(--star-yellow))"
                            d="M9.6 16.65L12 14.8l2.4 1.85l-.9-3.05l2.25-1.6h-2.8L12 8.9l-.95 3.1h-2.8l2.25 1.6l-.9 3.05Zm2.4.65l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Zm0-4.525Z" />
                    </svg>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="favorite-star hide" id="favorite-star-full-5" onclick="toggleStarReview(5)">
                        <path fill="rgb(var(--star-yellow))"
                            d="m12 17.3l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Z" />
                    </svg>
                </div>
            </div>
            <div class="user-account-update">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <div class="popup-background hide" id="popup-background" onclick="closePopup()"></div>
    <!-- Main parking details page -->
    <div id="main-body" class="parking-details-body">
        <?php
        $getSingleParkingData->execute(["id" => isset($_GET['id']) ? $_GET["id"] : "-1"]);
        $getSingleParkingData->setFetchMode(PDO::FETCH_ASSOC);
        $result = $getSingleParkingData->fetchAll();

        foreach ($result as $row) {
            ?>

            <div class="parking-details-container">
                <div class="details-title">
                    <?php include './src/php/toggleFavIndicator.php'; ?>
                    <h2>
                        <?php echo $row["address"] ?>
                    </h2>
                </div>
                <div class="details-buttons-primary">
                    <button class="btn btn-primary" onclick="openPopup('popup-arrived')">I've arrived</button>
                    <button class="btn btn-primary" onclick="openPopup('popup-reserve')">Reserve</button>
                </div>
            </div>
            <div class="parking-details-container">
                <div class="details-left">
                    <div class="details-info">
                        <h3><b>Information</b></h3>
                        <div class="details-info-content">
                            <p class="details-info-text"><b>Spots available:</b>
                                <?php echo ($row["max_spots"] - $row["spots_taken"]); ?>
                            </p>
                            <p class="details-info-text"><b>Price:</b>
                                <?php echo $row["price"] > 0 ? (sprintf("%.2f", $row["price"]) . "€/h") : "Free"; ?>
                            </p>
                            <p class="details-info-text"><b>Working hours:</b> 24/7</p>
                            <p class="details-info-text"><b>Owned by:</b>
                                <?php echo $row["company_name"]; ?>
                            </p>
                        </div>
                    </div>
                    <div class="details-info">
                        <h3><b>Reviews</b></h3>
                        <div class="details-info-content details-reviews-list">
                            <?php
                            $getReviewListForParking->execute(["id" => isset($_GET['id']) ? $_GET["id"] : "-1"]);
                            $getReviewListForParking->setFetchMode(PDO::FETCH_ASSOC);
                            $resultReviewList = $getReviewListForParking->fetchAll();

                            foreach ($resultReviewList as $review) {
                                ?>
                                <div class="details-info-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                        class="review-star">
                                        <path fill="rgb(var(--star-yellow))"
                                            d="m12 17.3l-3.7 2.825q-.275.225-.6.213t-.575-.188q-.25-.175-.387-.475t-.013-.65L8.15 14.4l-3.625-2.575q-.3-.2-.375-.525t.025-.6q.1-.275.35-.488t.6-.212H9.6l1.45-4.8q.125-.35.388-.538T12 4.475q.3 0 .563.188t.387.537L14.4 10h4.475q.35 0 .6.213t.35.487q.1.275.025.6t-.375.525L15.85 14.4l1.425 4.625q.125.35-.012.65t-.388.475q-.25.175-.575.188t-.6-.213L12 17.3Z" />
                                    </svg>
                                    <p><b>
                                            <?php echo sprintf("%.1f", $review["rating"]) ?>
                                        </b></p>
                                    <p>
                                        <?php echo $review["description"] ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="details-buttons-write">
                        <button class="btn btn-secondary" onclick="openPopup('popup-write-review')">Write a review</button>
                        <button class="btn btn-secondary" onclick="openPopup('popup-write-report')">Report a
                            problem</button>
                    </div>
                </div>
                <div class="details-right">
                    <div class="mapouter map-details">
                        <iframe class="gmap_canvas map-details" width="400" height="500" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=<?php echo $row["address"] ?>&t=&z=17&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<script src="src/js/main.js"></script>

</html>