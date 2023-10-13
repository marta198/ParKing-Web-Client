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
    popupBackgroundObj.classList.add('hide');
    mainBodyObj.classList.remove('popup-blur');
}

function openDetailedPopup(popup, getPopupObj) {
    popupObj = popup;
    document.getElementById(popupObj).classList.remove('hide');
    popupBackgroundObj.classList.remove('hide');
    mainBodyObj.classList.add('popup-blur');
    console.log(getPopupObj + '-address');
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

function toggleDropdownContent() {
    var dropdownContent = document.getElementById('quick-report-dropdown');
    if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
    } else {
        dropdownContent.style.display = 'block';
    }
}

function selectQuickReport(item) {
    var selectedItem = item.textContent;
    document.getElementById('quick-report-dropdown-btn').textContent = selectedItem;
    closeDropdown();
}

function closeDropdown() {
    var dropdownContent = document.getElementById('quick-report-dropdown');
    dropdownContent.style.display = 'none';
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
