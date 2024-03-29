<?php
    session_start();
    //var_dump($_SESSION);
?>

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
        <img id="logo" src="Image/logoRestau2.png" alt="">
            <img src="Image/Union.png" alt="" id="contact" onclick="toggleChecked()">
        <div class="listeContact hidden" id="listeCo" >
            <a href="">Mail: restaurant.qmb@gmail.com</a>
            <a href="">Telephone: 05.00.00.00.00</a>
        </div>
    </div>
    <?php
    /*
        if(isset($_POST['submitConnexion'])) {
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];

            $bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');
            $sqlAdmin = $bdd->prepare('SELECT * FROM Compte WHERE mail = :mail AND mdp = :mdp AND admin = 1');
            $sqlAdmin->execute(['mail' => $mail, 'mdp' => $mdp]);
            $adminRow = $sqlAdmin->fetch(PDO::FETCH_ASSOC);

            if($adminRow) {
                $_SESSION['mail'] = $adminRow['mail'];
                header("Location: admin.php");
                exit();
            } 
        }
        */
    ?>
    
    <div class="menuAccueil" id="menuAccueil">
        <div class="menuAccueilContent">
            <a href="index.php">Accueil</a>
            <a href="carte.php">Cartes</a>
            <a href="reservation.php">Réservation</a>
            <a href="avis.php">Avis</a>
            
            <?php
                if(isset($_SESSION['mail'])) {
                    $bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');
                    $sqlAdmin = $bdd->prepare('SELECT * FROM Compte WHERE mail = :mail');
                    $sqlAdmin->execute(['mail' => $_SESSION['mail']]);
                    $result = $sqlAdmin->fetch(PDO::FETCH_ASSOC);
                    if($result['admin'] == 1){
                        echo "<a href='admin.php'>Admin</a>";
                    }
                }
            ?>
            <?php
            /*
            <a style="display:<?php
                    if(isset($_SESSION['mail'])) {  
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                ?>" href="logout.php"><button class="btnLogout">Log Out</button></a>
            */
            /*
            
            /*
            session_start();
            if(isset($_SESSION['mail'])) {
                echo '<a href="logout.php"><button class="btnLogout">Log Out</button></a>';
            }*/
            ?>
        </div>
    </div>
    <img 

    <?php 
    if(isset($_SESSION['mail'])) {
        echo "style='border: solid 5px rgb(123, 13, 220)'";
    }
    ?>
    
    
    id="connexion" src="Image/profilPicture.jpg" alt="" onclick="showProfil()">
    <div style='display:<?php
                    if(isset($_SESSION['mail'])) {  
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    echo "'class='profil hidden' id='profil'>";
        if(isset($_SESSION['mail'])) {
            try{
                $mysqlConnection = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8','root', '', [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION],);
            }
            catch (Exception $e){
                var_dump('Erreur : ' . $e->getMessage());
            }
            $maTableStatement = $mysqlConnection->prepare("SELECT * FROM compte WHERE mail=:mail");
            $maTableStatement->execute(["mail"=>$_SESSION['mail']]);
            $donnees = $maTableStatement->fetchAll()[0];
            echo $donnees['mail']."<br/>";
            echo $donnees['nom']."<br/>";
            echo $donnees['prenom']."<br/>";
            echo $donnees['tel']."<br/>";
            //echo "<div class='bonjour'>Bienvenue {$resultat['prenom']}</div>";
        }
        ?>
        <a href="logout.php"><button class="btnLogout">Log Out</button></a>        
    </div>
    
    
    <div style="display:<?php
                    if(isset($_SESSION['mail'])) {  
                        echo 'none';
                    } else {
                        echo 'block';
                    }
                ?>"
                class="formConnection hidden" id="form" hidden>
        <div class="container" id="Login">
            <div class="box form-box">
                <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');
                    if(isset($_POST['submitConnexion'])) {
                        $mail = $_POST['mail'];
                        $mdp = $_POST['mdp'];

                        $sql = $bdd->prepare('SELECT * FROM Compte WHERE mail = :mail AND mdp = :mdp');
                        $sql->execute(['mail' => $mail, 'mdp' => $mdp]);
                        $row = $sql->fetch(PDO::FETCH_ASSOC);

                        if($row) {
                            /*
                            $_SESSION['valid'] = $row['mail'];
                            $_SESSION['username'] = $row['nom'];
                            $_SESSION['id'] = $row['mail'];
                            */
                            //session_start();
                            $_SESSION['mail'] = $row['mail'];
                            echo "<script>window.location.href = 'index.php';</script>";
                            echo "<script>alert('".$_SESSION['mail']."')</script>";
                        } else {
                            echo "<div class='message'>
                                <p>Wrong Username or Password</p>
                                </div> <br>";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                        }
                    }else{
                ?>
                <div class="titre">Se connecter</div>
                <form action="" method="post">
                    <div class="field input">
                        <label for="mail">Email</label>
                        <input type="text" name="mail" id="email" required>
                    </div>
                    <div class="field input">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" id="password" required>
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

    <div class="container hidden" id="SignUp">
        <div class="box form-box">
            <div class="titre">S'inscrire</div>
                <form action="" method="post">
                    <div class="field input">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="tel">Telephone</label>
                        <input type="text" name="tel" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="mail">Email</label>
                        <input type="text" name="mail" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submitInscription" value="S'inscrire" required>
                    </div>
                    <div class="links">
                        Déjà membre ? <a href="#" onclick="toggleSection('Login');">Se connecter</a>
                    </div>
                </form>
                <?php 
                    $bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');

                    if(isset($_POST['submitInscription'])) {
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $mail = $_POST['mail'];
                        $mdp = $_POST['mdp'];
                        $tel = $_POST['tel'];

                        $verify_query = $bdd->prepare('SELECT mail FROM Compte WHERE mail = :mail');
                        $verify_query->execute(['mail' => $mail]);
                        $rows = $verify_query->fetchAll(PDO::FETCH_ASSOC);

                        if(count($rows) != 0) {
                            echo "<div class='message'>
                                    <p>Cet e-mail est déjà utilisé. Veuillez en choisir un autre.</p>
                                </div> <br>";
                                echo "<a href='javascript:self.history.back()'><button class='btn'>revenir</button>";
                        } else {
                            $insert_query = $bdd->prepare('INSERT INTO Compte(mail, nom, prenom, mdp, tel) VALUES (:mail, :nom, :prenom, :mdp ,:tel)');
                            $insert_query->execute(['mail' => $mail, 'nom' => $nom, 'prenom' => $prenom, 'mdp' => $mdp, 'tel' => $tel]);

                            echo "<div class='message'>
                                    <p>Inscription réussie !</p>
                                </div> <br>";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Se connecter maintenant</button>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</header>
</html>