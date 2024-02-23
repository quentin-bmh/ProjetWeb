function verifierCheckbox() {
    var checkbox = document.getElementById("checkbox");
    var menuAccueil = document.getElementById("menuAccueil");

    if (checkbox.checked) {
        menuAccueil.classList.add("transitioned");
    } else {
        menuAccueil.classList.remove("transitioned");
    }
}

