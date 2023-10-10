// Get the URL parameters
const urlParams = new URLSearchParams(window.location.search);

// Check if the "invalidCred" parameter exists. Display message if the login creds are invalid.
if (urlParams.has("invalidCred")) {
    const newDiv = document.createElement('div');
    newDiv.className = 'd-flex justify-content-center';

    // Create a new paragraph element
    const errormsg = document.createElement("p");
    errormsg.style = "color: red;"
    errormsg.innerText = 'Invalid email or password entered, please try again!';

    newDiv.appendChild(errormsg);

    const loginButtonDiv = document.querySelector('.login-body > div:nth-last-child(2)');
    loginButtonDiv.parentNode.insertBefore(newDiv, loginButtonDiv.nextSibling);
}
