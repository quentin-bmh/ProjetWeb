var ajouterAvis;
var formulaireAvis;
var seConnecter;
var form;
var overlay;

function trierDonnees() {
    var tri = document.getElementById("tri").value;
    window.location.href = "http://localhost/ProjetWeb/avis.php?tri=" + encodeURIComponent(tri);
}

window.onload = function(){

    overlay = document.createElement('div');
    overlay.className = 'overlay';
    ajouterAvis = document.getElementById("ajouterAvis");
    formulaireAvis = document.getElementById("formulaireAvis");
    seConnecter = document.getElementById("seConnecter");
    form = document.getElementById("form");


    ajouterAvis.addEventListener('click', function(){
        //document.body.appendChild(overlay); // Ajoute le fond de recouvrement
        //overlay.style.display = 'block'; // Affiche le fond de recouvrement
        ajouterAvis.style.display = 'none';
        formulaireAvis.style.display = 'block';
    });

    seConnecter.addEventListener('click', function(){
        if (form.hasAttribute('hidden')) {
            form.removeAttribute('hidden');
            document.body.appendChild(overlay); // Ajoute le fond de recouvrement
            overlay.style.display = 'block'; // Affiche le fond de recouvrement
            }
    });

    overlay.addEventListener ('click', function(){
        overlay.style.display = 'none'; // Masque le fond de recouvrement
        form.setAttribute('hidden', true);
        //ajouterAvis.style.display = 'block';
        //formulaireAvis.style.display = 'none';
    });
}