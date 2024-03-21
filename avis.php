<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style\avis.css">
    <link rel="stylesheet" href="Style\global.css">
    <script src="Script\avis.js"></script> 
</head>

<?php
    try{
        $mysqlConnection = new PDO(
            'mysql:host=localhost;dbname=projetweb;charset=utf8',
            'root', '', [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION],);  
    }
    catch (Exception $e){
        var_dump('Erreur : ' . $e->getMessage());
    }
?>

<body>
    <?php include 'header.inc.php'; ?>

    <div class="container_avis">
    <div class="haut">
        <div> 
            <?php
                $maTableStatement = $mysqlConnection->prepare('SELECT AVG(note) AS moyenne_notes FROM avis');
                $maTableStatement->execute();
                $resultatRequete = $maTableStatement->fetchAll();
                $moyenneNotes = $resultatRequete[0]['moyenne_notes'];
                echo "<p>La note moyenne est $moyenneNotes</p>";
                if ($moyenneNotes >= 0 && $moyenneNotes < 1) {
                    $etoiles = "☆☆☆☆☆";
                } elseif ($moyenneNotes >= 1 && $moyenneNotes < 2) {
                    $etoiles = "★☆☆☆☆";
                } elseif ($moyenneNotes >= 2 && $moyenneNotes < 3) {
                    $etoiles = "★★☆☆☆";
                } elseif ($moyenneNotes >= 3 && $moyenneNotes < 4) {
                    $etoiles = "★★★☆☆";
                } elseif ($moyenneNotes >= 4 && $moyenneNotes <= 5) {
                    $etoiles = "★★★★☆";
                } elseif ($moyenneNotes == 5) {
                    $etoiles = "★★★★★";
                } else {
                    $etoiles = "Erreur : Note invalide";
                }
                echo "<p>$etoiles</p>";
            ?>
        </div>
        <div>
            <?php
                $maTableStatement = $mysqlConnection->prepare('SELECT COUNT(*) AS count_prenom FROM avis');
                $maTableStatement->execute();
                $resultatRequete = $maTableStatement->fetchAll();
                $nombreDePrenoms = $resultatRequete[0]['count_prenom'];
                echo "<p>$nombreDePrenoms avis</p>";
            ?>
        </div>
        <div class="tri">
        <?php
            $tri = $_GET['tri'] ?? 'Bon Avis';

            switch ($tri) {
                case 'bon':
                    //$sql = 'SELECT * FROM avis ORDER BY note DESC';
                    $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY note DESC';
                    break;
                case 'mauvais':
                    //$sql = 'SELECT * FROM avis ORDER BY note ASC';
                    $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY note ASC';
                    break;
                case 'Ancien':
                    //$sql = 'SELECT * FROM avis ORDER BY date ASC';
                    $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY date ASC';
                    break;
                case 'Récent':
                    //$sql = 'SELECT * FROM avis ORDER BY date DESC';
                    $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY date DESC';
                    break;
                default:
                    //$sql = 'SELECT * FROM avis ORDER BY note DESC';
                    $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY note DESC';
                    break;
            }

            $maTableStatement = $mysqlConnection->prepare($sql);
            $maTableStatement->execute();
            $donnees = $maTableStatement->fetchAll();

            //$maTableStatement = $mysqlConnection->prepare('SELECT * FROM compte AS c INNER JOIN avis AS a ON c.mail== ');

        ?>
        </div>
        <div>
            <label for="tri">Trier par:</label>
            <select id="tri" onchange="trierDonnees()">
                <option value="bon" <?php if ($tri == 'bon') echo 'selected'; ?>>Bon</option>
                <option value="mauvais" <?php if ($tri == 'mauvais') echo 'selected'; ?>>Mauvais</option>
                <option value="Ancien" <?php if ($tri == 'Ancien') echo 'selected'; ?>>Ancien</option>
                <option value="Récent" <?php if ($tri == 'Récent') echo 'selected'; ?>>Récent</option>
            </select>
        </div>
        <div>
            <input style="display:
                 <?php
                    if(isset($_SESSION['mail'])) {  //définir $_SESSION lorsqu'on se connecte||isset vérif que c'est défini||si ça l'est
                        echo 'none';               //alors une session a été crée
                    } else {
                        echo 'block';
                    }
                ?>" type="submit" id="seConnecter" value="Se connecter pour ajouter un Avis" />
            <input style="display:
                <?php
                    if(isset($_SESSION['mail'])) {  //définir $_SESSION lorsqu'on se connecte||isset vérif que c'est défini||si ça l'est
                        echo 'block';               //alors une session a été crée
                    } else {
                        echo 'none';
                    }
                ?>
            " type="submit" id="ajouterAvis" value="Ajouter un Avis">
        </div>
        <div>
            <form id="formulaireAvis" method="post" style="display:none" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div>
                    <label for="reviewText">Votre avis :</label><br>
                    <textarea id="reviewText" name="reviewText" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <label for="rating">Votre note :</label><br>
                    <div class="stars" onclick="selectRating(event)">
                        <span class="star" data-value="1"></span>
                        <span class="star" data-value="2"></span>
                        <span class="star" data-value="3"></span>
                        <span class="star" data-value="4"></span>
                        <span class="star" data-value="5"></span>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="0">
                </div>
                <input type="submit" value="Envoyer l'avis">
            </form>
        </div>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rating']) && isset($_POST['reviewText'])) {
                    $note = $_POST['rating'];
                    $avis = $_POST['reviewText'];
                    $mail = $_SESSION['mail'];
                    /*
                    $mail = $_SESSION['mail'];
                    $sqlQuery= 'INSERT INTO avis (mail,note, avis, date) VALUES (:mail, :note, :avis, CURRENT_DATE())';
                    $insertRequete->execute(['mail' => $mail,'note' => $note,'avis' => $avis]);
                    */
                    $sqlQuery= 'INSERT INTO avis (mail, note, avis, date) VALUES (:mail, :note, :avis, CURRENT_DATE())';
                    $insertRequete = $mysqlConnection->prepare($sqlQuery);
                    $insertRequete->execute([
                        'mail' => $mail,
                        'note' => $note,
                        'avis' => $avis
                    ]);
                    echo "<script>window.location.href = 'avis.php';</script>";
                }
            ?>
        </div>
            
        <div>
            <?php
                //var_dump($donnees);
                foreach ($donnees as $resultat) {
                    
                    echo "<div class='personne'>";
                    echo "<div class='prenom'>Prénom: {$resultat['prenom']}</div>";
                    echo "<div class='commentaire'>Commentaire: {$resultat['avis']}</div>";
                    echo "<div class='date'>Date: {$resultat['date']}</div>";
                    echo "<div class='note'>Note: {$resultat['note']}</div>";
                    echo "</div>";
                }
            ?>
        </div>
</body>
</html> 
</html>