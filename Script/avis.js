var s1;
var s2;
var s3;
var s4;
var overlay;

// Fonction pour vérifier si l'utilisateur est connecté
function estConnecte() {
    // Mettre le mode de vérif. (boolean lorsqu'on valide la connexion avec le truc de quentin?)
}

function verifierConnexion() {
    var estConnecteBool = estConnecte();

    if (estConnecteBool) {
        //document.getElementById("ajouterAvis").style.display = "block";
        //document.getElementById("seConnecter").style.display = "none";
    } else {
        //document.getElementById("ajouterAvis").style.display = "block";
        //document.getElementById("seConnecter").style.display = "none";
}
}

function trierDonnees() {
var tri = document.getElementById("tri").value;
window.location.href = "http://localhost/ProjetWeb/avis.php?tri=" + encodeURIComponent(tri);
}

window.onload = function(){
overlay = document.createElement('div');
overlay.className = 'overlay';

//s1 = document.getElementById("ajouterAvis");
s2 = document.getElementById("creerAvis");
s3 = document.getElementById("seConnecter");
s4 = document.getElementById("form");

/*
s1.addEventListener('click', function(){
    document.body.appendChild(overlay); // Ajoute le fond de recouvrement
    overlay.style.display = 'block'; // Affiche le fond de recouvrement
    s1.style.display = 'none';
    s2.style.display = 'block';
});
*/

s3.addEventListener('click', function(){
    if (s4.hasAttribute('hidden')) {
        s4.removeAttribute('hidden');
        document.body.appendChild(overlay); // Ajoute le fond de recouvrement
        overlay.style.display = 'block'; // Affiche le fond de recouvrement

        }
    //alert("ee");
});

overlay.addEventListener ('click', function(){
    overlay.style.display = 'none'; // Masque le fond de recouvrement
    s4.setAttribute('hidden', true);
    //s1.style.display = 'block';
    //s2.style.display = 'none';
});

verifierConnexion();
}