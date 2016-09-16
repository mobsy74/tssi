<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arvo" />

    <!-- Highslide CSS -->
    <link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />

    <!-- Custom TS CSS -->
    <link href="css/character-style.css" rel="stylesheet">


    <!--======================== START PHP FUNCTIONS ==========================-->
    <?php
    include 'php/php-functions.php';

    if( isset($_GET['characterFile']) && !empty($_GET['characterFile']) )
    {
        $characterFile = $characterDir."/".$_GET['characterFile'];
    } else{
        $characterFile = $blankCharacterFile;
    }

    $handle = fopen($characterFile, "r");
    $characterData = json_decode(fread($handle, filesize($characterFile)));
    fclose($handle);

    $title = $characterData->{'info'}->{'Name'};
    if ($title == ""){
        $title = "TS/SI Agent Dossier";
    }
    ?>
    <!--======================== STOP PHP FUNCTIONS ==========================-->

    <title><?php echo $title ?></title>

</head>
<body>

<!--======================== START NAVBAR ==========================-->
<nav class="navbar navbar-default navbar-fixed-top nav-container navbar-border-black">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-left logo-link" href="index.php?agent= <?php echo $agent ?>">
                <img class="logo-image" src="img/favicon/favicon-96x96.png" />
            </a>
            <div class="navbar-left header-link">
            <a href="#" class="ts-link">
                <span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Dossier
                </span>
            </a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#stats" class="scroll ts-link">Stats</a></li>
                <li><a href="#hitpointsRow" class="scroll ts-link">HPs</a></li>
                <li><a href="#images" class="scroll ts-link">Pics</a></li>
                <li><a href="#skills" class="scroll ts-link">Skills</a></li>
                <li><a href="#weapons" class="scroll ts-link">Weapons</a></li>
                <li><a href="#equipmentPanel" class="scroll ts-link">Equipment</a></li>
                <li><button class="btn btn-default btn-sm" id="saveCharacter">Save</button></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--======================== STOP NAVBAR ==========================-->

<div class="container">


    <!--======================== START NAMES ==========================-->
    <div class="row page-head" id="stats">
        <div class="row" id="names">
            <div class="col-sm-6 no-padding">
                <div class="form-group form-inline row name">
                    <label for="Name" class="col-sm-2 white-text">Character Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control wide-input input-lg" id="Name" value="<?php echo $characterData->{'info'}->{'Name'}; ?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 no-padding">
                <div class="form-group form-inline row name">
                    <label for="Player" class="col-sm-2 white-text">Player Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control wide-input input-lg" id="Player" value="<?php echo $characterData->{'info'}->{'Player'}; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container folder">

    <!--======================== START INFO ==========================-->
    <div class="row">
        <div class="col-sm-4 panel first-row scrollable" id="info">
            <?php renderInfoSection($characterData->{'info'}); ?>
        </div>

        <!--======================== START ATTRIBUTES ==========================-->
        <div class="col-sm-4 panel first-row scrollable" id="attributes">
            <div class="form-group form-inline row">
                <label for="charName" class="col-sm-3 ts-header">Stat</label>
                <label for="charName" class="col-sm-3 ts-header">Full</label>
                <label for="charName" class="col-sm-3 ts-header">1/2</label>
                <label for="charName" class="col-sm-3 ts-header">1/4</label>
            </div>
            <?php renderAttributesSection($characterData->{'attributes'}); ?>
        </div>

        <!--======================== START NOTES ==========================-->
        <div class="col-sm-4 no-padding first-row scrollable">
            <div class="col-sm-12 panel no-padding height-50">
                <label class="col-sm-12 ts-header">Backstory</label>
                <div class="col-sm-12 text-center">
                    <textarea id="Backstory" class="form-control wide-input input-sm notes-textarea"><?php echo $characterData->{'info'}->{'Backstory'}; ?></textarea>
                </div>
            </div>
            <div class="col-sm-12 panel no-padding height-50">
                <label class="col-sm-12 ts-header">Campaign Notes</label>
                <div class="col-sm-12 text-center">
                    <textarea id="Notes" class="form-control wide-input input-sm notes-textarea"><?php echo $characterData->{'info'}->{'Notes'}; ?></textarea>
                </div>
            </div>
        </div>
    </div>


    <div class="row" id="hitpointsRow">
        <!--======================== START HITPOINTS ==========================-->
        <?php renderHPSection($characterData->{'hitpoints'}); ?>

        <!--======================== START ADVANTAGES ==========================-->
        <div class="col-sm-4 no-padding hit-point-row">
            <div class="col-sm-12 panel no-padding height-45 scrollable">
                <?php renderGenericSection("Advantages", $characterData->{'advantages'}); ?>
            </div>


            <!--======================== START DOCUMENTS ==========================-->
            <div class="col-sm-12 panel no-padding height-55 scrollable">
                <?php renderGenericSection("Documents / Finances", $characterData->{'documents'}); ?>
            </div>
        </div>

        <!--======================== START DISADVANTAGES ==========================-->
        <div class="col-sm-4 no-padding hit-point-row">
            <div class="col-sm-12 panel no-padding height-45 scrollable">
                <?php renderGenericSection("Disadvantages", $characterData->{'disadvantages'}); ?>
            </div>


            <!--======================== START COMBAT TECHNIQUES ==========================-->
            <div class="col-sm-12 panel no-padding height-55 scrollable">
                <?php renderGenericSection("Close Combat Techniques", $characterData->{'combatTechniques'}); ?>
            </div>
        </div>

    </div>



    <!--======================== START IMAGES ==========================-->

    <div class="row" id="images">
        <?php renderImagesSection($characterData->{'images'}, $uploadDir); ?>
    </div>


    <!--======================== START SKILLS ==========================-->
    <?php renderSkillsSection($characterData->{'skills'}); ?>

    <!--======================== START WEAPONS ==========================-->
    <?php renderWeaponsSection($characterData->{'weapons'}); ?>

    <!--======================== START EQUIPMENT ==========================-->
    <?php renderEquipmentSection($characterData->{'equipment'}, $uploadDir); ?>

<!--    <div class="tab"></div>-->

    <input type="hidden" name="user" id="user" value="<?php echo $agent?>">

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

<script>
    $(":input").on("input", markPageAsDirty);
    $(":checkbox").on("click", markPageAsDirty);
</script>

</body>
</html>