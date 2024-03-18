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
            <img id="logo" src="Image/LogoRestau4.png" alt="">
            <img id="contact" src="Image/Union.png" alt="" onclick="">
            
        <div class="listeContact , hidden" id="listeCo" >
            <a href="">Mail: restaurant.qmb@gmail.com</a>
            <a href="">Telephone: 05.00.00.00.00</a>
        </div>
    </div>
    
    <div class="menuAccueil" id="menuAccueil">
        <div class="menuAccueilContent">
            <a href="accueil.php">Accueil</a>
            <a href="carte.php">Cartes</a>
            <a href="reservation.php">Réservation</a>
            <a href="avis.php">Livre d'or</a>
            <a href="">Nous contacter</a>
        </div>
    </div>
    <a id="connexion" onclick="showConnection()">
        <img src="Image/profilPicture.jpg" alt="">
    </a>
    <div class="formConnection" id="form" hidden>
        <div class="container" id="Login">
            <div class="box form-box">
                <header>Se connecter</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="field input">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submitConnexion" value="Se connecter" required>
                    </div>
                    <div class="links">
                        Vous n'avez pas encore de compte ? <a href="#" onclick="toggleSection('SignUp');">S'inscrire</a>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="container hidden" id="SignUp">
            <div class="box form-box">
                <header>S'inscrire</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
    
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>
    
                    <div class="field input">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
    
                    <div class="field">
                        <input type="submit" class="btn" name="submitInscription" value="S'inscrire" required>
                    </div>
                    <div class="links">
                        Déjà membre ? <a href="#" onclick="toggleSection('Login');">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</header>
</html>