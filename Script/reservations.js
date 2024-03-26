function ValiderFormulaire() {
    var nom = document.getElementById('name').value.trim();
    var email = document.getElementById('mail').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var nombre_personnes = document.getElementById('nbrPers').value.trim();
    var heure_selectionnee = document.getElementById('hour').value;
    var date_selectionnee = document.getElementById('date').value; // Correction ici

    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    /*
    if (nombre_personnes === '') {
        alert("Veuillez indiquer le nombre de personnes (minimum 1).");
        return false;
    }
    if (heure_selectionnee === 'hour-select') {
        alert("Veuillez sélectionner une heure.");
        return false;
    }
    if (date_selectionnee === '') { // Correction ici
        alert("Veuillez sélectionner un jour.");
        return false;
    }
*/
    return true;
}