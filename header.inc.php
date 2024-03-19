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
        <div class="contact" id="contact">
            <img src="Image/Union.png" alt="" id="img" onclick="toggleChecked()">
        </div>
        <div class="listeContact , hidden" id="listeCo" >
            <a href="">Mail: restaurant.qmb@gmail.com</a>
            <a href="">Telephone: 05.00.00.00.00</a>
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
    <a id="connexion" onclick="showConnection()">
        <img src="Image/profilPicture.jpg" alt="">
    </a>
    <div class="profil">
        <h4>profil</h4>
    </div>
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
                <?php 
                    $con = mysqli_connect("localhost","root","","projetWeb") or die("Error connect");
                    if(isset($_POST['submitInscription'])){
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
            
                        $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
                        if(mysqli_num_rows($verify_query) !=0 ){
                            echo "<div class='message'>
                                      <p>Cet e-mail est déjà utilisé. Veuillez en choisir un autre.</p>
                                  </div> <br>";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Revenir</button>";
                        }
                        else{
                            mysqli_query($con,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Une erreur s'est produite.");
                            echo "<div class='message'>
                                      <p>Inscription réussie !</p>
                                  </div> <br>";
                            echo "<a href='accueil.php'><button class='btn'>Se connecter maintenant</button>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
</header>
</html>