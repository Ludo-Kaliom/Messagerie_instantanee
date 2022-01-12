
// On cree une fonction valid()  de validation sans paramétre qui renvoie 
function valid() {
    let password = document.getElementById("password");
    let checkPassword = document.getElementById("check-password");
    let message = document.getElementById("message");
    let button = document.getElementById("submit");

    if (password.value === checkPassword.value) {
        message.style.color = "green"
        message.innerHTML = "Les mots de passe sont identiques.";
        button.disabled = false;
        return true;
    } else {
        message.style.color = "red"
        message.innerHTML = "Les mots de passe ne sont pas identiques.";
        button.disabled = true;
        checkPassword.focus();
        return false;
    }
}


function checkAvailability(str) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "check_availability.php?emailId=" + str);
    xhr.responseType = "text";
    xhr.send();

    xhr.onload = function() {
        document.getElementById('user-availability-status').innerHTML = xhr.response;
    }
    xhr.onerror = function() {
        alert("Une erreur s'est produite");
    }
}