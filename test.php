<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/test.css ">
    <script src="Script/test.js"></script>

</head>
<body>
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
        <img src="Image/logo-Photoroom.png-Photoroom.png" alt="">
    </div>
    <div class="menuAccueil" id="menuAccueil">
        <div class="menuAccueilContent">
            <a href="test.php">Accueil</a>
            <a href="carte.php">Cartes</a>
            <a href="reservation.php">Réservation</a>
            <a href="avis.php">Livre d'or</a>
            <a href="">Nous contacter</a>
        </div>
    </div>
</body>
</html>