<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style\carte.css">
    <script src="Script\carte.js"></script>
</head>
<body>
    <?php include 'header.inc.php'; ?>     
    <div id="menu">
        <div class="section" id="s1">
            <div class="titre">Entrées</div>
        </div>
        <div class="section" id="s2">
            <div class="titre">Plats</div>
        </div>
        <div class="section" id="s3">
            <div class="titre">Desserts</div>
        </div>
    </div>
    <div id="carte">
        <div class="section" id="carte-boisson">
            <div class="titre">
                BOISSONS
            </div>
        </div>
        <div class="section" id="carte-entree">
            <div class="titre">
                ENTREES
            </div>
        </div>
        <div class="section" id="carte-plat">
            <div class="titre">
                PLATS
            </div>
        </div>
        <div class="section" id="carte-dessert">
            <div class="titre">
                DESSERTS
            </div>
        </div>
    </div>
    <?php include 'footer.inc.php'; ?>
</body>
</html>