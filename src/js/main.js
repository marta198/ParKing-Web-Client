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