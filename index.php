<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/index.css">
    <link rel="stylesheet" href="Style\global.css">
    <script src="Script\index.js"></script>
</head>
<body>
    <?php include 'header.inc.php'; ?>
    
    <video id="video" autoplay muted loop>
        <source src="Video/video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

<div class='bonjour'>
    <?php 
        if(isset($_SESSION['mail'])) {
            $mail = $_SESSION['mail'];
            try{
                $mysqlConnection = new PDO(
                    'mysql:host=localhost;dbname=projetweb;charset=utf8',
                    'root', '', [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION],);  
            }
            catch (Exception $e){
                var_dump('Erreur : ' . $e->getMessage());
            }

            $maTableStatement = $mysqlConnection->prepare("SELECT * FROM compte WHERE mail=:mail");
            $maTableStatement->execute(["mail"=>$mail]);
            $donnees = $maTableStatement->fetchAll()[0];
            echo "<div class='bienvenue'>Bienvenue {$donnees['prenom']}</div>";
            //echo "<div class='bonjour'>Bienvenue {$resultat['prenom']}</div>";
        }
    ?>  
</div>
</body>
</html>