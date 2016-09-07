<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TS/SI Safe House</title>

    <!-- Fav icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Fonts -->
    <!--    <link href="fonts/quicksand-family-description.css" rel="stylesheet">-->
    <!--    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Rationale" />-->
    <!--    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Metrophobic" />-->
    <!--    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC" />-->
    <!--    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arvo" />-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />

    <!-- Highslide CSS -->
    <link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />

    <!-- Custom TS CSS -->
    <link href="css/index-style.css" rel="stylesheet">

    <!--======================== START PHP FUNCTIONS ==========================-->
    <?php
    include 'php/php-functions.php';
    ?>
    <!--======================== STOP PHP FUNCTIONS ==========================-->

</head>
<body>

<div class="container-fluid" id="whole-page">
    <div class="banner">
        TOP SECRET/S.I.
    </div>
    <div class="container" id="main">


        <div class="center-align welcome">
            <div class="center-align">
                <img src="img/orion.png" id="logo">
            </div>
            <br>
            Welcome to the Safe House, <span class="italic">bitches</span>!
        </div>


        <div id="section-headers">
            <br><br><br><br>
            <h4 class="section-title">Characters:</h4>
            <div class="center-align link-container" id="characters">
                <?php getCharacterList(); ?>
            </div>


            <br><br><br><br>
            <h4 class="section-title">Dice Roller / Shot Calculator:</h4>
            <div class="center-align link-container" id="diceRoller">
                <div class="safe-house-link">
                    <a href="dice-roller.php" target="_blank">Roll them bones...</a>
                </div>
                <div class="safe-house-link">
                    <a href="http://rhf.gingertom.com/game/dice.php?loggedin=yes&username=Tom" target="_blank">Old Vamps Dice Roller</a>
                </div>
            </div>


            <br><br><br><br>
            <h4 class="section-title">File Uploads:</h4>
            <div class="center-align link-container" id="uploads">
                <div class="safe-house-link">
                    <a href="uploads" target="_blank">View the Uploads Directory</a>
                </div>
            </div>


            <br><br><br><br>
            <h4 class="section-title">Current White Board:</h4>
            <div class="center-align link-container" id="whiteBoard">
                Under Development
            </div>


            <br><br><br><br>
            <h4 class="section-title">References:</h4>
            <div class="center-align link-container" id="references">
                <div class="safe-house-link">
                    <a href="docs/tsr-top-secret-s-i-rpg-players-guide-boxed-set.pdf" target="_blank">Players Guide</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/tsr-top-secret-s-i-rpg-administrators-guide-boxed-set.pdf" target="_blank">Administrators Guide</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/tsr-top-secret-s-i-rpg-equipment-inventory-boxed-set.pdf" target="_blank">Equipment & Inventory</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/tsr-top-secret-s-i-rpg-settings-scenarios-boxed-set.pdf" target="_blank">Scenarios</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/advantages-and-skills-quick-reference.pdf" target="_blank">Advantages & Skills Quick Reference</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/CHARSHEET1.png" target="_blank">Original Character Sheet - Page 1</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/CHARSHEET2.png" target="_blank">Original Character Sheet - Page 2</a>
                </div>
                <div class="safe-house-link">
                    <a href="docs/CHARSHEET3.png" target="_blank">Original Character Sheet - Page 3</a>
                </div>
            </div>

            <br><br><br><br>
            <h4 class="section-title">Administration:</h4>
            <div class="center-align link-container" id="uploads">
                <div class="safe-house-link">
                    <button class="btn btn-default" onclick="generateEmptyCharacterJSON(true)">Generate Empty Character JSON</button>
                </div>
                <div class="safe-house-link">
                    <button class="btn btn-default" onclick="generateDummyCharacterJSON()">Generate Dummy Character JSON</button>
                </div>
                <div class="safe-house-link">
                    <a href="concept-work.html" target="_blank">Concept Work</a>
                </div>
                <div class="left-align">
                    <div id="jsonDisplay"></div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--======================== START JAVASCRIPT ==========================-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!-- Highslide JS -->
<script type="text/javascript" src="js/highslide/highslide.js"></script>
<script type="text/javascript">
    // override Highslide settings here
    // instead of editing the highslide.js file
    hs.graphicsDir = 'js/highslide/graphics/';
</script>

<!-- Custom TS JS -->
<script src="js/main.js"></script>

</body>
</html>