<?php 
$bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');

if(isset($_POST['submit'])) {
    try {
        if(!empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['phone']) && !empty($_POST['nbrPers']) && !empty($_POST['hours']) && !empty($_POST['days'])) {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $nbrPers = $_POST['nbrPers'];
            $hours = $_POST['hours'];
            $days = $_POST['days'];

            $sql = $bdd->prepare('INSERT INTO reservation(day, hour, name, mail, phone, nbrPers) VALUES (:day, :hour, :nom, :email, :phone, :nbrPers)');
            $sql->execute(['day' => $days, 'hour' => $hours, 'nom' => $nom, 'email' => $email, 'phone' => $phone, 'nbrPers' => $nbrPers]);
            echo "<script>alert('Réservation effectuée avec succès !');</script>";
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
    <section class="banner">
        <h2>Reservez votre table!!</h2>
        <div class="card-container">
            <div class="card-content">
                <h3>Reservation</h3>
                <form action="" method="post" onsubmit="return ValiderFormulaire()">
                    <div class="form-row">
                        <select name="days" id="day">
                            <option value="day-select">Sélectionnez le jour</option>
                            <option value="sunday">Lundi</option>
                            <option value="monday">Mardi</option>
                            <option value="tuesday">Mercredi</option>
                            <option value="wednesday">Jeudi</option>
                            <option value="thursday">Vendredi</option>
                            <option value="friday">Samedi</option>
                            <option value="saturday">Dimanche</option>
                        </select>

                        <select name="hours" id="hour">
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
                        <input type="text" placeholder="Nom" id="name" name="nom">
                        <input type="text" placeholder="Telephone" id="phone" name="phone">
                        <input type="email" placeholder="Mail" id="mail" name="email">
                    </div>
                    <div class="form-row">
                        <input type="number" placeholder="Nombre de personne?" min="1" id="nbrPers" name="nbrPers">
                        <input type="submit" value="Réserver la table" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
