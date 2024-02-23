<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Style/header.css">
    <script src="Script/header.js"></script>

</head>
<header>
    <div class="navbar">
        <div class="accueil">
            <span class="transition"></span>
            <input id="checkbox" type="checkbox" onclick="verifierCheckbox()">
            <label class="toggle" for="checkbox">
                <div id="stick1" class="barre"></div>
                <div id="stick2" class="barre"></div>
                <div id="stick3" class="barre"></div>
            </label>
        </div>
        <div class="logo">
            <img src="Image/logo.png" alt="">
        </div>
        <div class="contact">
            <img src="Image/Union.png" alt="" onclick="">
        </div>
    </div>
    
    <div class="menuAccueil" id="menuAccueil">
        <div class="menuAccueilContent">
            <a href="header.inc.php">Accueil</a>
            <a href="carte.php">Cartes</a>
            <a href="reservation.php">Réservation</a>
            <a href="avis.php">Livre d'or</a>
            <a href="">Nous contacter</a>
        </div>
    </div>
</header>
</html>