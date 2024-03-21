<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <img id="logo" src="Image/logo.png" alt="">
            <img src="Image/Union.png" alt="" id="contact" onclick="toggleChecked()">
        <div class="listeContact hidden" id="listeCo" >
            <a href="">Mail: restaurant.qmb@gmail.com</a>
            <a href="">Telephone: 05.00.00.00.00</a>
        </div>
    </div>
    
    <div class="menuAccueil" id="menuAccueil">
        <div class="menuAccueilContent">
            <a href="index.php">Accueil</a>
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
    <div class="formConnection" id="form" >
        <div class="container" id="Login">
            <div class="box form-box">
                <?php 
                
                $con = mysqli_connect("localhost","root","","projetWeb") or die("Error connect");
                if(isset($_POST['submitConnexion'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<button class='btn'>Go Back</button>";
            
                }
                /*
                if(isset($_SESSION['valid'])){
                    header("Location: accueil.php");
                }*/
                }else{
                ?>
                <div class="titre">Se connecter</div>
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
            <?php } ?>
                </div>
            </div>
        </div> 
        <div class="container hidden" id="SignUp">
            <div class="box form-box">
                <div class="titre">S'inscrire</div>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Nom</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="username">Prenom</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="username">Telephone</label>
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
                            echo "<button class='btn'>Revenir</button>";
                        }
                        else{
                            mysqli_query($con,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Une erreur s'est produite.");
                            echo "<div class='message'>
                                      <p>Inscription réussie !</p>
                                  </div> <br>";
                            echo "<button class='btn'>Se connecter maintenant</button>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</header>
</html>