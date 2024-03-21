<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/admin.css">
    <link rel="stylesheet" href="Style/global.css">
    <script src="Script/admin.js"></script>
</head>
<body>
    <img id="logo-admin" src="Image/LogoRestau3.png" alt="">
    <div id="text-admin" class="font">Mode Administrateur</div>
    <table id="table-res">
        <thead>
            <tr>
                <th>date</th>
                <th>heure</th>
                <th>n°pers</th>
                <th>prenom</th>
                <th>nom</th>
                <th></th>
            </tr>
        </thead>
        <tbody>


        <?php 
            $bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');

                
            try {
                $sql = $bdd->prepare('SELECT * FROM Reservation');
                $sql->execute();
                $rep = $sql->fetchAll();
                foreach($rep as $line){
                    echo "<tr>";
                    //echo "<tr data-id='".$line["id"].""."'>";
                    echo "<td>DATE</td>";
                    echo "<td>".$line['hour']."</td>";
                    echo "<td>".$line['nbrPers']." pers</td>";
                    echo "<td>".$line['name']."</td>";
                    echo "<td>".$line['mail']."</td>";
                    echo "<td><a href='admin.php?del=".$line["id"]."'>"."X"."</a></td>";
                    echo "</tr>";
                }
                //$sql->execute(['day' => $days, 'hour' => $hours, 'nom' => $nom, 'email' => $email, 'phone' => $phone, 'nbrPers' => $nbrPers]);
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            if (isset($_GET['del'])) {
                delReservation($_GET['del']);
            }

            function delReservation($id){
                try{
                    $bdd = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8', 'root', '');
                    $sql = $bdd->prepare("DELETE FROM Reservation WHERE id=:id");
                    $sql->execute(['id'=>$id]);
                }
                catch(Exeption $e){
                    dd('Erreur : ' . $e->getMessage());
                }
            }
        ?>
        </tbody>
    </table>

    <table id="table-com">
        <thead>
            <tr>
                <th>prenom</th>
                <th>note</th>
                <th>commentaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bertrand</td>
                <td>3</td>
                <td>Moyen</td>
            </tr>
            <tr>
                <td>Quentin</td>
                <td>1</td>
                <td>Chiant</td>
            </tr>
            <tr>
                <td>Mathis</td>
                <td>5</td>
                <td>Trop bien</td>
            </tr>
        </tbody>
    </table>
    <?php
        echo "test";
    ?>
</body>
</html>