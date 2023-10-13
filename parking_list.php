<?php include("src/php/db.php") ?>
<?php include("src/php/statements.php") ?>
<?php include("src/php/filter.php") ?>
<?php include("src/php/sorters.php") ?>
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
    <header class="header-container popup-blur" id="header">
        <div class="header">
            <img src="src/img/logo.png" alt="ParKing" class="logo">
            <div class="header-links">
                <div class="header-links-clickable">
                    <a href="index.php" class="link">Homepage</a>
                    <a href="parking_list.php" class="link">Parking List</a>
                    <button class="btn btn-primary" onclick="window.location.href='login.php'">My Parking</button>
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
    <!-- Main user profile page -->
    <div class="parking-list-container" id="main-body">
        <div class="filters-container">
            <div class="filter">
                <?php
                if (isset($_GET["filter"])) {
                    ?>
                    <select name="sort-by" id="sort-by" class="dropdown" onchange="doReload({'filter':this.value});">
                        <option style="display:none;" selected>Sort By</option>
                        <option value="all" <?php echo $_GET["filter"] == "all" ? "selected" : "" ?>>All spots</option>
                        <option value="distance" <?php echo $_GET["filter"] == "distance" ? "selected" : "" ?>>Zero-Cost spots
                        </option>
                        <option value="price" <?php echo $_GET["filter"] == "price" ? "selected" : "" ?>>Pay-Per-Hour</option>
                        <option value="disabled" <?php echo $_GET["filter"] == "disabled" ? "selected" : "" ?>>Disabled spots
                        </option>
                    </select>
                    <?php
                } else {
                    ?>
                    <select name="sort-by" id="sort-by" class="dropdown" onchange="doReload({'filter':this.value});">
                        <option style="display:none;" selected>Sort By</option>
                        <option value="all">All spots</option>
                        <option value="distance">Zero-Cost spots</option>
                        <option value="price">Pay-Per-Hour</option>
                        <option value="disabled">Disabled spots</option>
                    </select>
                    <?php
                }
                ?>
            </div>
            <div class="filter">
                <input type="text" name="search" id="search" placeholder="Search for address" class="input"
                    value='<?php echo isset($_GET["q"]) ? $_GET["q"] : "" ?>'>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="search-icon">
                    <path fill="rgb(var(--text-color))"
                        d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5q0-2.725 1.888-4.612T9.5 3q2.725 0 4.612 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3l-1.4 1.4ZM9.5 14q1.875 0 3.188-1.313T14 9.5q0-1.875-1.313-3.188T9.5 5Q7.625 5 6.312 6.313T5 9.5q0 1.875 1.313 3.188T9.5 14Z" />
                </svg>
            </div>
        </div>
        <div class="parking-list-explorer-container">
            <?php
            $getParkingList->execute();
            $getParkingList->setFetchMode(PDO::FETCH_ASSOC);
            $result = $getParkingList->fetchAll();
            if (isset($_GET["filter"])) {
                try {
                    if ($_GET["filter"] == "price") {
                        usort($result, "sortByPriceAsc");
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }

            }
            foreach ($result as $row) {
                if (isset($_GET["filter"])) {
                    if (!filterIsValid($row, $_GET["filter"])) {
                        continue;
                    }
                }

                if (isset($_GET["q"])) {
                    if (!str_contains(strtolower($row["address"]), strtolower($_GET["q"]))) {
                        continue;
                    }
                }


                ?>
                <div class="parking-item-main<?php echo $row["is_premium"] == 1 ? " premium-parking-item" : ""; ?>">
                    <div class="parking-item">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                class="availability<?php echo ($row["max_spots"] - $row["spots_taken"]) < 1 ? " hide" : ""; ?>">
                                <path fill="rgb(var(--accept-color))"
                                    d="M12 23c6.075 0 11-4.925 11-11S18.075 1 12 1S1 5.925 1 12s4.925 11 11 11ZM7.5 10.586l3 3l6-6L17.914 9L10.5 16.414L6.086 12L7.5 10.586Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                class="availability<?php echo ($row["max_spots"] - $row["spots_taken"]) < 1 ? "" : " hide"; ?>">
                                <path fill="rgb(var(--danger-color))"
                                    d="M12 23c6.075 0 11-4.925 11-11S18.075 1 12 1S1 5.925 1 12s4.925 11 11 11ZM8.818 7.403L12 10.586l3.181-3.182l1.415 1.414L13.414 12l3.182 3.182l-1.415 1.414L12 13.414l-3.182 3.182l-1.415-1.414L10.586 12L7.403 8.818l1.415-1.415Z" />
                            </svg>
                        </div>
                        <div>
                            <h3><b>
                                    <?php echo $row["address"] ?>
                                </b></h3>
                            <div class="parking-item-info">
                                <p><b>Price:</b>
                                    <?php echo $row["price"] > 0 ? (sprintf("%.2f", $row["price"]) . "€ / h") : "Free"; ?>
                                </p>
                                <p><b>Spaces:</b>
                                    <?php echo ($row["max_spots"] - $row["spots_taken"]); ?>
                                </p>
                                <p><b>Owned by:</b>
                                    <?php echo $row["company_name"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary parking-item-button"
                        onclick="window.location.href='parking_details.php?id=<?php echo $row["id"]; ?>'">View More
                        Info</button>
                </div>



                <?php
            }
            ?>
        </div>
    </div>
</body>

<script>
    document.getElementsByClassName("search-icon")[0].addEventListener("click", (e) => { doReload({ "q": e.view.document.getElementById("search").value }) })
    document.getElementById("search").addEventListener("keyup", (e) => {
        if (e.code == "Enter") {
            doReload({ "q": e.target.value })
        }
    })

    function doReload(reloadData) {
        const urlParams = new URLSearchParams(window.location.search);
        console.log(reloadData)
        const sortByURL = urlParams.get('filter');
        const filterURL = urlParams.get('q');
        if (reloadData["filter"]) {
            urlParams.set('filter', reloadData["filter"]);
        }
        if (reloadData["q"] != undefined) {
            urlParams.set('q', reloadData["q"]);
        }
        window.location.search = urlParams.toString();
    }

</script>


<script src="src/js/main.js"></script>

</html>