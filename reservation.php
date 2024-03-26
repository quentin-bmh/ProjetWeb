<?php 
$bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');

if(isset($_POST['submit'])) {
   
   
    echo "<script>console.log('mail : ".$_POST['mail']."');</script>";
    echo "<script>console.log('nom : ".$_POST['nom']."');</script>";
    echo "<script>console.log('tel : ".$_POST['tel']."');</script>";
    echo "<script>console.log('heure : ".$_POST['heure']."');</script>";
    echo "<script>console.log('date : ".$_POST['date']."');</script>";
    try {
        if(!empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['tel']) && !empty($_POST['nbPers']) && !empty($_POST['heure']) && !empty($_POST['date'])) {
            $mail = $_POST['mail'];
            $date = $_POST['date'];
            $nbPers = $_POST['nbPers'];
            $heure = $_POST['heure'];
            
            $nom = $_POST['nom'];
            $tel = $_POST['tel'];


            $sql = $bdd->prepare('INSERT INTO Reservation(mail, date, nbPers, heure) VALUES (:mail, :date, :nbPers, :heure)');
            $sql->execute(['mail' => $mail, 'date' => $date, 'nbPers' => $nbPers, 'heure' => $heure]);
            
            echo "<script>window.location.href = 'reservation.php';</script>";
            //echo "<script>alert('Réservation effectuée avec succès !');</script>";

            // Envoi d'un e-mail
            /*
            $to = "montoulieu.quentin@gmail.com";
            $subject = "Nouvelle réservation";
            $message = "Une nouvelle réservation a été effectuée.\nNom: $nom\nE-mail: $email\nTéléphone: $phone\nNombre de personnes: $nbPers\nJour: $days\nHeure: $hours";
            $headers = "From: montoulieu.quentin@gmail.com";

            // Configuration SMTP pour Gmail avec connexion sécurisée TLS
            ini_set("SMTP", "smtp.monfai.fr");
            ini_set("smtp_port", "25");


            // Authentification SMTP
            ini_set('smtp_auth', 'true');
            ini_set('username', 'montoulieu.quentin@gmail.com');
            ini_set('password', 'ncjy hhvq lned owwc');

            // Connexion sécurisée TLS
            ini_set('smtp_secure', 'tls');

            mail($to, $subject, $message, $headers);
            */
        } else {
            echo "<script>alert('Veuillez remplir tous les champs du formulaire.');</script>";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style\reservation.css">
    <link rel="stylesheet" href="Style\global.css">
    <script src="Script\reservations.js"></script>
</head>
<body>
    <?php include 'header.inc.php'; ?>
    <div>
            <input style="display:
                 <?php
                    if(isset($_SESSION['mail'])) {  //définir $_SESSION lorsqu'on se connecte||isset vérif que c'est défini||si ça l'est
                        echo 'none';                //alors une session a été crée
                    } else {
                        echo 'block';                        
                    }
                ?>" type="submit" id="seConnecter" value="Se connecter pour pouvoir réserver" onclick="showProfil()" />
                </div>
                <?php if(isset($_SESSION['mail'])) {
                    $maTableStatement = $mysqlConnection->prepare("SELECT * FROM compte WHERE mail=:mail");
                    $maTableStatement->execute(["mail"=>$_SESSION['mail']]);
                    $donnees = $maTableStatement->fetchAll()[0];
                    ?>
                    <div class='envoyerReservation' id='envoyerReservation'>
                        <section class="banner">
                            <h2>Reservez votre table!!</h2>
                            <div class="card-container">
                                <div class="card-content">
                                    <h3>Reservation</h3>
                                    <form action="" method="post" onsubmit="return ValiderFormulaire()">
                                        <div class="form-row">
                                        <input type="date" id="date" name="date">
                                            <select name="heure" id="heure">
                                                <option value="hour-select">Selectionnez une heure</option>
                                                <option disabled="disabled">--------------</option>
                                                <option disabled="disabled">Service midi:</option>
                                                <option value="12">12h/13h</option>
                                                <option value="13">13h/14h</option>
                                                <option disabled="disabled">--------------</option>
                                                <option disabled="disabled">Service soir:</option>
                                                <option value="19">19h/20h</option>
                                                <option value="20">20h/21h</option>
                                                <option value="21">21h/22h</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php echo $donnees['nom']; ?>" required>
                                            <input type="text" placeholder="Téléphone" id="tel" name="tel" value="<?php echo $donnees['tel']; ?>" required>
                                            <input type="email" placeholder="Mail" id="mail" name="mail" value="<?php echo $_SESSION['mail']; ?>" readonly>
                                        </div>
                                        <div class="form-row">
                                            <input type="number" placeholder="Nombre de personne?" min="1" max="10" id="nbPers" name="nbPers">
                                            <input type="submit" value="Réserver la table" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class='mesReservations'>
                        <?php
                            $sql = $bdd->prepare('SELECT * FROM reservation AS a INNER JOIN compte AS c ON c.mail = a.mail');
                            $sql->execute();
                            $rep = $sql->fetchAll();
                            //var_dump($rep);
                            foreach($rep as $line){
                                echo "<tr>";
                                //echo "<tr data-id='".$line["id"].""."'>";
                                echo "<td>".$line['date']."</td>";
                                echo "<td>".$line['heure']."</td>";
                                echo "<td>".$line['nbPers']." pers</td>";
                                echo "<td>".$line['nom']."</td>";
                                echo "<td>".$line['prenom']."</td>";
                                echo "<td>".$line['mail']."</td>";
                                echo "<td><a href='reservation.php?del=".$line["id"]."'>"."X"."</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </div>
                <?php 
                } 
            ?>
    </body>
</html>