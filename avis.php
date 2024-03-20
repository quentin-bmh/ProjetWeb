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
            'mysql:host=localhost;dbname=ProjetWeb;charset=utf8',
            'root',
            ''
        );
    }
    catch (Exception $e){
        dd('Erreur : ' . $e->getMessage());
    }
?>

<body>
    <?php include 'header.inc.php'; ?>

    <div class="container_avis">
    <div class="haut">
        <div> 
            <?php
            $maTableStatement = $mysqlConnection->prepare('SELECT AVG(score) AS moyenne_notes FROM ProjetWeb');
            $maTableStatement->execute();
            $resultatRequete = $maTableStatement->fetch(PDO::FETCH_ASSOC);//prend que ce qu'il faut
            $moyenneNotes = $resultatRequete['moyenne_notes'];            //le fetchall prend tt donc
            echo "<p>La note moyenne est $moyenneNotes</p>";              //ça économise
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
            } else {
                $etoiles = "Erreur : Note invalide";
            }
            echo "<p>$etoiles</p>";
            ?>
        </div>
        <div> 
            <?php
            $maTableStatement = $mysqlConnection->prepare('SELECT COUNT(prenom) AS count_prenom FROM ProjetWeb');
            $maTableStatement->execute();
            $resultatRequete = $maTableStatement->fetch(PDO::FETCH_ASSOC);
            $nombreDePrenoms = $resultatRequete['count_prenom'];
            echo "<p>$nombreDePrenoms avis</p>";
            ?>
        </div>
        <div>
            <label for="tri">Trier par:</label>
            <select id="tri" onchange="trierDonnees()">
                <option value="Notes ↑">Notes ↑</option>
                <option value="Notes ↓">Notes ↓</option>
                <option value="Ancien">Ancien</option>
                <option value="Récent">Récent</option>
            </select>
        </div>
    <div>
        <div>
            <input type="submit" id="seConnecter" value="Se connecter pour ajouter un Avis" />
            <input type="submit" id="ajouterAvis" value="Ajouter un Avis">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mysqlConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['reviewText']) && isset($_POST['rating']) && !empty($_POST['reviewText']) && !empty($_POST['rating'])) {

        $reviewText = $_POST['reviewText'];
        $rating = $_POST['rating'];

        try {
            $stmt = $mysqlConnection->prepare("INSERT INTO avis (reviewText, rating) VALUES (:reviewText, :rating)");
            $stmt->bindParam(':reviewText', $reviewText);
            $stmt->bindParam(':rating', $rating);

            $stmt->execute();

            echo "Avis ajouté avec succès!";
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    } else {
        echo "Tous les champs doivent être remplis!";
    }
}
?>
        </div>
    </div>
    <div class=tri">
            <?php
            function trierParNotesDecroissantes($a, $b) {
                return $b['score'] - $a['score'];
            }

            function trierParNotesCroissantes($a, $b) {
                return $a['score'] - $b['score'];
            }

            function trierParDateAncienne($a, $b) {
                return strtotime($a['date']) - strtotime($b['date']);
            }

            function trierParDateRecente($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            }

            $maTableStatement = $mysqlConnection->prepare('SELECT * FROM ProjetWeb');
            $maTableStatement->execute();
            $donnees = $maTableStatement->fetchAll();

            // Initialisation de la fonction de tri
            $tri = $_GET['tri'] ?? 'Notes ↑'; // Défaut: tri par Notes ↑

            // Tri des données
            switch ($tri) {
                case 'Notes ↑':
                    usort($donnees, 'trierParNotesDecroissantes');
                    break;
                case 'Notes ↓':
                    usort($donnees, 'trierParNotesCroissantes');
                    break;
                case 'Ancien':
                    usort($donnees, 'trierParDateAncienne');
                    break;
                case 'Récent':
                    usort($donnees, 'trierParDateRecente');
                    break;
                default:
                    // Par défaut, tri par notes décroissantes
                    usort($donnees, 'trierParNotesDecroissantes');
                    break;
            }
            // Affichage des données triées
            foreach ($donnees as $resultat) {
                echo "<div class='personne'>";
                echo "<p>Prénom: {$resultat['prenom']}</p>";
                echo "<p>Commentaire: {$resultat['commentaire']}</p>";
                echo "<p>Date: {$resultat['date']}</p>";
                echo "<p>Note: {$resultat['score']}</p>";
                echo "</div>";
            }
            ?>
    </div>
</body>
</html>
</html>