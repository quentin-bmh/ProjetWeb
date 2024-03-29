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
        <div class="section" id="entree-menu">
            <div class="titre font">Entrées</div>
        </div>
        <div class="section" id="plat-menu">
            <div class="titre font">Plats</div>
        </div>
        <div class="section" id="dessert-menu">
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
                    <img src="Image/carte/negroni.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Negroni
                        </div>
                        <div class="description">
                            Cocktail à base de gin, de vermouth doux et de Campari
                        </div>
                        <div class="prix">
                            8.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/mojito.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Mojito
                        </div>
                        <div class="description">
                            Cocktail à base de rhum avce du citron et de la menthe
                        </div>
                        <div class="prix">
                            8.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/sob.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Sex on the Beach
                        </div>
                        <div class="description">
                            Cocktail à base de vodka, de liqueur de pêche et de jus d'orange
                        </div>
                        <div class="prix">
                            8.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/blue-lagoon.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Blue Lagoon
                        </div>
                        <div class="description">
                            Cocktail à base de rhum avce du citron et de la menthe
                        </div>
                        <div class="prix">
                            8.00
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
                    <img src="Image/carte/planche.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Planche de charcuterie
                        </div>
                        <div class="description">
                            Assortiments de différentes charcuteries
                        </div>
                        <div class="prix">
                            10.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/salade.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Salade oeuf au plat
                        </div>
                        <div class="description">
                            Salade de gésiers avec son oeuf au plat
                        </div>
                        <div class="prix">
                            12.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/poulet.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Poulet Teriyaki
                        </div>
                        <div class="description">
                            Lamelles de poulet marinés puis grillés avec des légumes rapés
                        </div>
                        <div class="prix">
                            10.00
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
                    <img src="Image/carte/pizza.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Pizza lard et ouefs
                        </div>
                        <div class="description">
                           Pizza avec une base crème garnie de morceaux de lards et d'oeufs durs
                        </div>
                        <div class="prix">
                            13.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/burger.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Burger du chef
                        </div>
                        <div class="description">
                            Composé de deux steaks épais, de capres et de fromage a raclette
                        </div>
                        <div class="prix">
                            14.50
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/saumon.jpg" alt="">
                    <div class="details">
                        <div class="nom">
                            Pavé de saumon
                        </div>
                        <div class="description">
                            Tendre morceau de saumon accompagné de ses légumes
                        </div>
                        <div class="prix">
                            13.00
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="Image/carte/filet.png" alt="">
                    <div class="details">
                        <div class="nom">
                            Faux-filet de boeuf
                        </div>
                        <div class="description">
                           Viande locale accopmagnée de pommes de terres rôties
                        </div>
                        <div class="prix">
                            15.50
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
</body>
</html>