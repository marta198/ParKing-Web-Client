//For switching between light and dark theme
const lightThemeBtn = document.getElementById('light-theme-toggle');
const darkThemeBtn = document.getElementById('dark-theme-toggle');

lightThemeBtn.addEventListener('click', () => {
    lightThemeBtn.classList.add('hide');
    darkThemeBtn.classList.remove('hide');
    document.getElementById('theme-style').href = 'src/css/colors-dark.css';
});

darkThemeBtn.addEventListener('click', () => {
    darkThemeBtn.classList.add('hide');
    lightThemeBtn.classList.remove('hide');
    document.getElementById('theme-style').href = 'src/css/colors-light.css';
});

const popupBackgroundObj = document.getElementById("popup-background");
const mainBodyObj = document.getElementById("main-body");
let popupObj = null;

//For closing and opening popups
function closePopup() {
    document.getElementById(popupObj).classList.add('hide');
    document.getElementById(popupObj).removeAttribute("parkingid");
    popupBackgroundObj.classList.add('hide');
    mainBodyObj.classList.remove('popup-blur');
}

function openDetailedPopup(popup, getPopupObj) {
    popupObj = popup;
    document.getElementById(popupObj).classList.remove('hide');
    popupBackgroundObj.classList.remove('hide');
    mainBodyObj.classList.add('popup-blur');
    document.getElementById(popupObj).setAttribute("parkingid", document.getElementsByClassName(getPopupObj)[0].getAttribute("parkingid"));
    const address = document.getElementById(getPopupObj + '-address').innerText;
    const price = document.getElementById(getPopupObj + '-price').innerText;

    const gmap_canvas = document.getElementById('gmap_canvas');
    gmap_canvas.src = "https://maps.google.com/maps?q=" + address + "&t=&z=13&ie=UTF8&iwloc=&output=embed";

    document.getElementById('popup-address').innerText = address;
    document.getElementById('popup-price').innerText = price;
}

function openPopup(popup) {
    popupObj = popup;
    document.getElementById(popupObj).classList.remove('hide');
    popupBackgroundObj.classList.remove('hide');
    mainBodyObj.classList.add('popup-blur');
}

/*function toggleDropdownContent() {
    var dropdownContent = document.getElementById('quick-report-dropdown');
    if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
    } else {
        dropdownContent.style.display = 'block';
    }
}*/

function selectQuickReport(button) {
    button.style.boxShadow = "0 3px 4px rgba(0, 0, 0, 0.6)";
}
    // JavaScript function to handle star rating
    function handleStarClick(starElement) {
        const rating = parseInt(starElement.getAttribute('data-rating'));

        // Get the parent element that contains the stars
        const starsContainer = starElement.parentElement;

        // Loop through all stars in the container and update their appearance
        const starElements = starsContainer.getElementsByClassName('review-star');
        for (let i = 0; i < starElements.length; i++) {
            const currentStar = starElements[i];
            if (i < rating) {
                currentStar.classList.remove('hide'); // Show selected stars
            } else {
                currentStar.classList.add('hide'); // Hide unselected stars
            }
        }
    }

function closeDropdown() {
    var dropdownContent = document.getElementById('quick-report-dropdown');
    dropdownContent.style.display = 'none';
}

function toggleStarReview(starNumber) {
    var emptyStar = document.getElementById('favorite-star-empty-' + starNumber);
    var fullStar = document.getElementById('favorite-star-full-' + starNumber);
    if (emptyStar.classList.contains('hide')) {
        emptyStar.classList.remove('hide');
        fullStar.classList.add('hide');
    } else {
        emptyStar.classList.add('hide');
        fullStar.classList.remove('hide');
    }
}

//Toggle favorite star on in parking details
function toggleFavoriteStar() {
    var emptyStar = document.getElementById('favorite-star-empty');
    var fullStar = document.getElementById('favorite-star-full');
    if (emptyStar.classList.contains('hide')) {
        emptyStar.classList.remove('hide');
        fullStar.classList.add('hide');
    } else {
        emptyStar.classList.add('hide');
        fullStar.classList.remove('hide');
    }

    var urlParams = new URLSearchParams(window.location.search);
    let parkingID = urlParams.get('id');

    // Make an AJAX request to the server
    $.ajax({
        type: 'POST',
        url: '/src/php/toggle_fav_parking.php',
        data: {
            action: 'toggle_fav_parking',
            parkingID: parkingID // Include parkingID in the data
        },
        success: function (response) {
            console.log('Content from server: ' + response);
        },
        error: function () {
            console.error('Error loading content from the server.');
        }
    });

}

//when id hamburger-menu is clicked, remove hide from phone-menu and set add class phone-menu-open, make it togglable
function openPhoneMenu() {
    var phoneMenu = document.getElementById('phone-menu');
    if (phoneMenu.classList.contains('hide')) {
        phoneMenu.classList.remove('hide');
        phoneMenu.classList.add('phone-menu-open');
    } else {
        phoneMenu.classList.add('hide');
        phoneMenu.classList.remove('phone-menu-open');
    }
}

//auto detect user screen size
function checkScreenSize() {
    if (window.matchMedia("(min-width: 920px)").matches) {
        var phoneMenu = document.getElementById('phone-menu');
        phoneMenu.classList.add('hide');
        phoneMenu.classList.remove('phone-menu-open');
    }
}
checkScreenSize();
window.matchMedia("(min-width: 920px)").addEventListener("change", checkScreenSize);

//slider
function updateSliderValue(value) {
    const displayValue = `${value}h | €${(value * 0.5).toFixed(2)}`;
    document.getElementById("payment-hours-value").textContent = displayValue;
}

//load a preview of the new profile image
function loadFile(image) {
    console.log(image.files[0]);
    var output = document.getElementById('user-pfp-settings');
    output.style.backgroundImage = "url(" + URL.createObjectURL(image.files[0]) + ")";
}

//reset back to default iamge after closing the settings popup
function loadOldImage() {
    var oldImage = document.getElementById('user-pfp');
    var output = document.getElementById('user-pfp-settings');
    output.style.backgroundImage = oldImage.style.backgroundImage;
}



//reservations cancel
function cancelReservation() {
    window.location.href = "/src/php/reservation.php?type=cancel&parkingid=" +
        document.getElementById("popup-parking-info").getAttribute("parkingid") +
        "&return=" + window.location.pathname;
}


//reservation make
function makeReservation() {
    const urlParams = new URLSearchParams(window.location.search);
    window.location.href = "/src/php/reservation.php?type=make&parkingid="
        + urlParams.get("id") + "&time="
        + document.getElementById("payment-hours-value").textContent.split("|")[0].replace("h", "").trim()
        + "&cost="
        + document.getElementById("payment-hours-value").textContent.split("|")[1].replace("€", "").trim()
        + "&return=" + window.location.pathname;

}