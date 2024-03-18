function ValiderFormulaire() {
    var nom = document.getElementById('name').value.trim();
    var email = document.getElementById('mail').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var nombre_personnes = document.getElementById('nbrPers').value.trim();
    var heure_selectionnee = document.getElementById('hour').value;

    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (nom === '') {
        alert("Veuillez renseigner votre nom.");
        return false;
    }
    if (!regexEmail.test(email)) {
        alert("Veuillez entrer une adresse e-mail valide.");
        return false;
    }
    if (phone === '') {
        alert("Veuillez renseigner votre numéro de téléphone.");
        return false;
    }
    if (nombre_personnes === '' || nombre_personnes < 1) {
        alert("Veuillez indiquer le nombre de personnes (minimum 1).");
        return false;
    }
    if (heure_selectionnee === 'hour-select') {
        alert("Veuillez sélectionner une heure.");
        return false;
    }

    return true;
}
