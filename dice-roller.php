<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TS/SI Dice Roller</title>

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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arvo" />

    <!-- Highslide CSS -->
    <link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />

    <!-- Custom TS CSS -->
    <link href="css/dice-style.css" rel="stylesheet">


    <!--======================== START PHP FUNCTIONS ==========================-->
    <?php
    include 'php/php-functions.php';

    $handle = fopen($gameDataFile, "r");
    $gameData = json_decode(fread($handle, filesize($gameDataFile)));
    fclose($handle);

    ?>
    <!--======================== STOP PHP FUNCTIONS ==========================-->

</head>
<body>

<div class="container-fluid" id="whole-page">
    <div id="calculator" class="col-lg-3 main-section">
        <div class="row section-heading">
            Shot Calculator
        </div>


        <div class="subsection">
            <div class="row calc-divider">
                <div class="col-sm-6 left-aligned value-label">
                    Base Skill
                </div>
                <div class="col-sm-6 right-aligned">
                    <input type="text" class="calc-value input-lg shot-calc-input" id="base-skill">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 left-aligned calc-text-padding">
                    Called Shot
                </div>
                <div class="col-sm-6 right-aligned calc-text-padding">
                    1/2&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="called-shot-half">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    1/4&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="called-shot-quarter">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 left-aligned calc-text-padding">
                    Cover
                </div>
                <div class="col-sm-6 right-aligned calc-text-padding">
                    1/2&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="cover-half">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    1/4&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="cover-quarter">
                </div>
            </div>


            <div class="row calc-divider">
                <div class="col-sm-6 left-aligned calc-text-padding">
                    Braced
                </div>
                <div class="col-sm-6 right-aligned calc-text-padding">
                    +10&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="braced">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 left-aligned calc-text-padding">
                    Prepared
                </div>
                <div class="col-sm-6 right-aligned calc-text-padding">
                    +5&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="prepared">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    Burst:&nbsp;&nbsp;Short
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +5&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="short-burst">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Long
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +10&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="long-burst">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    Range:&nbsp;&nbsp;Point Blank
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +30&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="point-blank-range">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Short
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +10&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="short-range">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medium
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +0&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="medium-range">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Long
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    -40&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="long-range">
                </div>
            </div>


            <div class="row calc-divider">
                <div class="col-sm-6 left-aligned calc-text-padding">
                    Scope
                </div>
                <div class="col-sm-6 right-aligned calc-text-padding">
                    +25&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="scope">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    Shotgun:&nbsp;&nbsp;Regular
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +10&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="regular-shotgun">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;Sawed-off
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    +20&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="sawed-off-shotgun">
                </div>
            </div>


            <div class="row calc-divider">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    Movement:&nbsp;&nbsp;&nbsp;Slow
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    -10&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="slow-movement">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;Medium
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    -25&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="medium-movement">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;Fast
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    -40&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="fast-movement">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    Hands:&nbsp;&nbsp;1-Hand
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    -20&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="one-hand">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 left-aligned calc-text-padding">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Off Hand
                </div>
                <div class="col-sm-4 right-aligned calc-text-padding">
                    -30&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="off-hand">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 left-aligned calc-text-padding">
                    Rapid Fire
                </div>
                <div class="col-sm-6 right-aligned calc-text-padding">
                    -30&nbsp;&nbsp;<input type="checkbox" class="left-aligned shot-calc-checkbox" id="rapid-fire">
                </div>
            </div>


            <div class="row calc-divider">
                <div class="col-sm-6 left-aligned value-label">
                    To Hit
                </div>
                <div class="col-sm-6 right-aligned">
                    <input type="text" class="calc-value input-lg" id="to-hit">
                </div>
            </div>

            <div class="row calc-divider center-align">
                <div>
                    <button class="btn btn-default" id="reset-calculator">Reset Calculator</button>
                </div>
            </div>

        </div>


        <!--======================== END SHOT CALCULATOR ==========================-->


        <!--======================== BEGIN DICE ROLLER ==========================-->

    </div>
    <div id="dice-roller" class="col-lg-9 main-section">
        <div class="row section-heading">
            <div class="col-sm-4">
                <?php echo $agent?>'s Dice Roller
            </div>
            <div class="col-sm-4 norm">
                <input type="hidden" name="user" id="user" value="<?php echo $agent?>">
                <audio id="audio" src="sounds/dice-1.ogg"></audio>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-default btn-lg pull-right" onclick="refreshPage()"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page</button>
            </div>
        </div>

        <div class="row single-die-row" id="top-of-single-dice">
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d4.jpg" class="die-picture" onclick="rollSpecificDice(1,4)">
                </div>
                <div class="col-sm-12 center-align">
                    d4
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d6.jpg" class="die-picture" onclick="rollSpecificDice(1,6)">
                </div>
                <div class="col-sm-12 center-align">
                    d6
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d8.jpg" class="die-picture" onclick="rollSpecificDice(1,8)">
                </div>
                <div class="col-sm-12 center-align">
                    d8
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d10.jpg" class="die-picture" onclick="rollSpecificDice(1,10)">
                </div>
                <div class="col-sm-12 center-align">
                    d10
                </div>
            </div>
        </div>
        <br>
        <div class="row single-die-row">
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d12.jpg" class="die-picture" onclick="rollSpecificDice(1,12)">
                </div>
                <div class="col-sm-12 center-align">
                    d12
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d20.jpg" class="die-picture" onclick="rollSpecificDice(1,20)">
                </div>
                <div class="col-sm-12 center-align">
                    d20
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12 center-align">
                    <img src="img/d100.jpg" class="die-picture" onclick="rollSpecificDice(1,100)">
                </div>
                <div class="col-sm-12 center-align">
                    d100
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-12 center-align die-controls-container">
                    How many dice?:
                    <select id="die-count">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="col-sm-12 center-align die-controls-container">
                    <button class="btn btn-default btn-sm" id="reset">Reset Die Count</button>
                </div>
                <div class="col-sm-12 center-align die-controls-container">
                    Private Roll?&nbsp;&nbsp;<input type="checkbox" class="left-aligned" id="privateRoll">
                </div>
            </div>

        </div>

        <div class="row" id="results-area">
            <div class="row center-align" id="roll-type">

            </div>
            <div class="row">
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die1">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die2">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die3">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die4">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die5">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die6">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die7">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die8">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die9">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die10">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die11">

                    </div>
                </div>
                <div class="col-sm-2 die-result-container">
                    <div class="die-result center-align" id="die12">

                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="historyContainer">
            <div class="col-sm-12" id="historyHeader">
                Die Roll History
            </div>
            <div class="col-sm-12" id="history">
                <?php

                $dieRolls = $gameData->{'dieRolls'};
                $numRolls = (count((array)$dieRolls)) - 1;

                for ($i = ($numRolls); $i >= 0; $i--) {
                    if ($i == $numRolls){
                        echo "<div class=\"roll-section-header\">Last Roll: </div><div class=\"last-roll\">";
                    } else {
                        if ($i == ($numRolls - 1)){
                            echo "<div class=\"roll-section-header\">Previous Rolls:</div>";
                        }
                        echo "<div class=\"historical-roll\">";
                    }

                    echo "<span class=\"".$dieRolls[$i]->{'user'}."\">".$dieRolls[$i]->{'user'}."</span> rolled ".$dieRolls[$i]->{'dieCount'}." d".$dieRolls[$i]->{'dieType'}.": [";
                    for ($j = 0; $j < (count((array)$dieRolls[$i]->{'values'})); $j++){
                        echo $dieRolls[$i]->{'values'}[$j];
                        if ($j != ((count((array)$dieRolls[$i]->{'values'})) - 1)) {
                            echo ", ";
                        }
                    }

                    echo "]&nbsp;&nbsp; <span class=\"history-timestamp\">(".$dieRolls[$i]->{'timestamp'}.")</span></div>";
                }

                ?>
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