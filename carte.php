<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style\carte.css">
    <link rel="stylesheet" href="Style\global.css">
    <script src="Script\carte.js"></script>
</head>
<body>
    <?php include 'header.inc.php'; ?>
    <div id="menu">
    <?php include 'footer.inc.php'; ?>
    <div class="containermenu" onclick="toggleContainers()">
        <div class="section" id="s1">
            <div class="titre font">Entrées</div>
        </div>
        <div class="section" id="s2">
            <div class="titre font">Plats</div>
        </div>
        <div class="section" id="s3">
            <div class="titre font">Desserts</div>
        </div>
    </div>
    <div id="carte">
        <div class="section" id="boissons">
            <div class="titre font">
                BOISSONS
            </div>
            <div class="contenu">
                
                <div class="item">
                    <img src="Image/carte/verrines.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Verrine fraise-menthe
                        </div>
                        <div class="description">
                            Délicieuse verrine de fraise dans une crème fouettée accompagnée de quelques feuilles de menthe
                        </div>
                        <div class="prix">
                            8.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/brownie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Brownie au chocolat
                        </div>
                        <div class="description">
                            Brownie aux pépites de chocolat et à la framboise
                        </div>
                        <div class="prix">
                            6.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/pancacke.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Pancake aux myrtilles
                        </div>
                        <div class="description">
                            Pancake moelleux aux myrtilles, servi avec du sirop d'érable
                        </div>
                        <div class="prix">
                            7.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/smoothie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Smoothie exotique
                        </div>
                        <div class="description">
                            Smoothie rafraîchissant aux fruits exotiques et à la noix de coco
                        </div>
                        <div class="prix">
                            5.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/tartelette.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Tartelette aux fruits rouges
                        </div>
                        <div class="description">
                            Tartelette garnie de fruits rouges frais et d'une délicieuse crème pâtissière
                        </div>
                        <div class="prix">
                            9.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="entrees">
            <div class="titre font">
                ENTREES
            </div>
            <div class="contenu">
                <div class="item">
                    <img src="Image/carte/verrines.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Verrine fraise-menthe
                        </div>
                        <div class="description">
                            Délicieuse verrine de fraise dans une crème fouettée accompagnée de quelques feuilles de menthe
                        </div>
                        <div class="prix">
                            8.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/brownie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Brownie au chocolat
                        </div>
                        <div class="description">
                            Brownie aux pépites de chocolat et à la framboise
                        </div>
                        <div class="prix">
                            6.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/pancacke.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Pancake aux myrtilles
                        </div>
                        <div class="description">
                            Pancake moelleux aux myrtilles, servi avec du sirop d'érable
                        </div>
                        <div class="prix">
                            7.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/smoothie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Smoothie exotique
                        </div>
                        <div class="description">
                            Smoothie rafraîchissant aux fruits exotiques et à la noix de coco
                        </div>
                        <div class="prix">
                            5.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/tartelette.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Tartelette aux fruits rouges
                        </div>
                        <div class="description">
                            Tartelette garnie de fruits rouges frais et d'une délicieuse crème pâtissière
                        </div>
                        <div class="prix">
                            9.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="plats">
            <div class="titre font">
                PLATS
            </div>
            <div class="contenu">
                <div class="item">
                    <img src="Image/carte/verrines.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Verrine fraise-menthe
                        </div>
                        <div class="description">
                            Délicieuse verrine de fraise dans une crème fouettée accompagnée de quelques feuilles de menthe
                        </div>
                        <div class="prix">
                            8.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/brownie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Brownie au chocolat
                        </div>
                        <div class="description">
                            Brownie aux pépites de chocolat et à la framboise
                        </div>
                        <div class="prix">
                            6.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/pancacke.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Pancake aux myrtilles
                        </div>
                        <div class="description">
                            Pancake moelleux aux myrtilles, servi avec du sirop d'érable
                        </div>
                        <div class="prix">
                            7.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/smoothie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Smoothie exotique
                        </div>
                        <div class="description">
                            Smoothie rafraîchissant aux fruits exotiques et à la noix de coco
                        </div>
                        <div class="prix">
                            5.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/tartelette.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Tartelette aux fruits rouges
                        </div>
                        <div class="description">
                            Tartelette garnie de fruits rouges frais et d'une délicieuse crème pâtissière
                        </div>
                        <div class="prix">
                            9.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="desserts">
            <div class="titre font">
                DESSERTS
            </div>
            <div class="contenu">
                <div class="item">
                    <img src="Image/carte/verrines.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Verrine fraise-menthe
                        </div>
                        <div class="description">
                            Délicieuse verrine de fraise dans une crème fouettée accompagnée de quelques feuilles de menthe
                        </div>
                        <div class="prix">
                            8.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/brownie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Brownie au chocolat
                        </div>
                        <div class="description">
                            Brownie aux pépites de chocolat et à la framboise
                        </div>
                        <div class="prix">
                            6.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/pancacke.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Pancake aux myrtilles
                        </div>
                        <div class="description">
                            Pancake moelleux aux myrtilles, servi avec du sirop d'érable
                        </div>
                        <div class="prix">
                            7.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/smoothie.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Smoothie exotique
                        </div>
                        <div class="description">
                            Smoothie rafraîchissant aux fruits exotiques et à la noix de coco
                        </div>
                        <div class="prix">
                            5.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/tartelette.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Tartelette aux fruits rouges
                        </div>
                        <div class="description">
                            Tartelette garnie de fruits rouges frais et d'une délicieuse crème pâtissière
                        </div>
                        <div class="prix">
                            9.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blocHorizontal">
            <div class="slide one">Slide 1</div>
            <div class="slide two">Slide 2</div>
            <div class="slide three">Slide 3</div>
            <div class="slide four">Slide 4</div>
        </div>
    </div>
</body>
</html>