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
    <img id="background" src="Image/reservation.jpeg" alt="">
    <div id="container-avis">
    <!--div class="haut"-->
        <div id="recap"> 
            <?php
                $maTableStatement = $mysqlConnection->prepare('SELECT AVG(note) AS moyenne_notes FROM avis');
                $maTableStatement->execute();
                $resultatRequete = $maTableStatement->fetchAll();
                $moyenneNotes = $resultatRequete[0]['moyenne_notes'];
                $maTableStatement = $mysqlConnection->prepare('SELECT COUNT(*) AS count_prenom FROM avis');
                $maTableStatement->execute();
                $resultatRequete = $maTableStatement->fetchAll();
                $nombreDePrenoms = $resultatRequete[0]['count_prenom'];
                
                echo "<div id='moy'>".round($moyenneNotes,1)."</div>";
                echo "<div id='moy-stars'>".getStars(round($moyenneNotes))."</div>";
                echo "<div id='nb-avis'>".$nombreDePrenoms." avis </div>";
            ?>
        </div>
        <div class="tri">
            <?php
                $tri = $_GET['tri'] ?? 'Bon Avis';
                switch ($tri) {
                    case 'bon':
                        $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY note DESC';
                        break;
                    case 'mauvais':
                        $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY note ASC';
                        break;
                    case 'Ancien':
                        $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY date ASC';
                        break;
                    case 'Récent':
                        $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY date DESC';
                        break;
                    default:
                        $sql = 'SELECT * FROM avis AS a INNER JOIN compte AS c ON a.mail = c.mail ORDER BY note DESC';
                        break;
                }

                $maTableStatement = $mysqlConnection->prepare($sql);
                $maTableStatement->execute();
                $donnees = $maTableStatement->fetchAll();
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
                ?>" type="submit" id="seConnecter" value="Se connecter pour ajouter un Avis" onclick="showProfil()"/>
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
            <form id="formulaireAvis" method="post" style="display:none" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div>
                    <textarea id="reviewText" name="reviewText" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <div class="stars" onclick="selectRating(event)"> 
                        <div class="rating">
                            <input value="5" name="rate" id="star5" type="radio" >
                            <label title="parfait" for="star5"></label>
                            <input value="4" name="rate" id="star4" type="radio">
                            <label title="très bien" for="star4"></label>
                            <input value="3" name="rate" id="star3" type="radio">
                            <label title="bien" for="star3"></label>
                            <input value="2" name="rate" id="star2" type="radio">
                            <label title="moyen" for="star2"></label>
                            <input value="1" name="rate" id="star1" type="radio" checked="">
                            <label title="null" for="star1"></label>
                        </div>
                    </div>
                    <input style="display:none" class="hidden" id="rating" name="rating" value="0">
                </div>
                <input type="submit" value="Envoyer l'avis">
            </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rate']) && isset($_POST['reviewText'])) {
                $note = $_POST['rate'];
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
            
        <div>
            <?php
                function getStars($n){
                    $str = "";
                    for($i = 0 ; $i < 5 ; $i++){
                        if($i < $n){
                            $str .= "★";
                        }else{
                            $str .= "☆";
                        }
                    }
                    return $str;
                }
                foreach ($donnees as $resultat) {
                    echo "<div class='avis'>";
                    echo "<div class='commentaire font'>\"".$resultat['avis']."\"</div>";
                    echo "<div class='detail'>".$resultat['prenom']."  -  ".$resultat['date']."</div>";
                    echo "<div class='note'>".getStars($resultat['note'])."</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
        
</body>
</html> 
</html>