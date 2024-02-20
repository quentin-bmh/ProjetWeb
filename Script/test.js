function verifierCheckbox() {
    var checkbox = document.getElementById("checkbox");
    var menuAccueil = document.getElementById("menuAccueil");

    if (checkbox.checked) {
        // La case à cocher est cochée
        console.log("La case à cocher est cochée");
        menuAccueil.classList.add("transitioned");
    } else {
        // La case à cocher n'est pas cochée
        console.log("La case à cocher n'est pas cochée");
        menuAccueil.classList.remove("transitioned");
    }
}