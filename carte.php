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
    <?php include 'footer.inc.php'; ?>
    <div class="containermenu" onclick="toggleContainers()">
        <div class="section" id="s1">
            <img src="Image\entree.jpg" alt="" style="width: auto; height: auto;">
        </div>
        <div class="section" id="s2">
            <img src="Image\plat.jpg" alt="" style="width: auto; height: auto;">
        </div>
        <div class="section" id="s3">
            <img src="Image\dessert.jpg" alt="" style="width: auto; height: auto;">
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