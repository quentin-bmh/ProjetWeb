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

    <div class="container">
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
    <div class="bas">
        <input type="submit" id="ajouterAvis" value="Ajouter un Avis"/>
        <input type="submit" id="seConnecter" value="Se connecter pour ajouter un Avis" style="display: none;"/>
    </div>
    </div>
        <div class="avis">
            <?php
            $maTableStatement = $mysqlConnection->prepare('SELECT prenom, commentaire, date, score FROM ProjetWeb');
            $maTableStatement->execute();
            $resultats = $maTableStatement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultats as $resultat) {
                $prenom = $resultat['prenom'];
                $commentaire = $resultat['commentaire'];
                $date = $resultat['date'];
                $score = $resultat['score'];

                if ($score >= 0 && $score < 1) {
                    $etoiles = "☆☆☆☆☆";
                } elseif ($score >= 1 && $score < 2) {
                    $etoiles = "★☆☆☆☆";
                } elseif ($score >= 2 && $score < 3) {
                    $etoiles = "★★☆☆☆";
                } elseif ($score >= 3 && $score < 4) {
                    $etoiles = "★★★☆☆";
                } elseif ($score >= 4 && $score <= 5) {
                    $etoiles = "★★★★☆";
                } else {
                    $etoiles = "Erreur : Note invalide";
                }

                echo "<div class='personne'>";
                echo "<p>Prénom: $prenom</p>";
                echo "<p>Commentaire: $commentaire</p>";
                echo "<p>Date: $date</p>";
                echo "<p>Note: $score - Étoiles: $etoiles</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>
