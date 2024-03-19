var s1;
var s2;
var overlay;

// Fonction pour vérifier si l'utilisateur est connecté
function estConnecte() {
    // Mettre le mode de vérif. (boolean lorsqu'on valide la connexion avec le truc de quentin?)
}

function verifierConnexion() {
    var estConnecteBool = estConnecte();

    if (estConnecteBool) {
        document.getElementById("ajouterAvis").style.display = "block";
        document.getElementById("seConnecter").style.display = "none";
    } else {
        document.getElementById("ajouterAvis").style.display = "none";
        document.getElementById("seConnecter").style.display = "block";
    }
}

function trierDonnees() {
    var tri = document.getElementById("tri").value;
    window.location.href = "http://localhost/ProjetWeb/avis.php?tri=" + encodeURIComponent(tri);
}

function trierAvis() {
    var tri = document.getElementById('tri').value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'trier_avis.php?tri=' + encodeURIComponent(tri), true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            document.getElementById('avisContainer').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

window.onload = function(){
    overlay = document.createElement('div');
    overlay.className = 'overlay';

    s1 = document.getElementById("ajouterAvis");
    s2 = document.getElementById("creerAvis");

    s1.addEventListener('click', function(){
        document.body.appendChild(overlay); // Ajoute le fond de recouvrement
        overlay.style.display = 'block'; // Affiche le fond de recouvrement
        s1.style.display = 'none';
        s2.style.display = 'block';
    });

    overlay.addEventListener ('click', function(){
        overlay.style.display = 'none'; // Masque le fond de recouvrement
        s1.style.display = 'block';
        s2.style.display = 'none';
    });

    verifierConnexion();
}