<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TSSI Agent Dossier</title>

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

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Custom CMF CS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom CMF JS -->
    <script src="js/main.js"></script>

    <!-- Quicksand Font -->
    <link href="fonts/quicksand-family-description.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!--======================== START PHP FUNCTIONS ==========================-->
    <?php
    $filename = "characters/Tom_Schroeder-Johnny_Five.json";
    $handle = fopen($filename, "r");
    $characterData = json_decode(fread($handle, filesize($filename)));
    fclose($handle);

    function renderInfoSection($data) {
        foreach ($data as $key => $value) {
            if ($key == 'Name' || $key == 'Player' || $key == 'Notes'  || $key == 'Backstory') {
                continue;
            } else {
                echo "<div class=\"form-group form-inline row\">
                    <label for=\"$key\" class=\"col-sm-3\">$key</label>
                    <div class=\"col-sm-9\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"$key\" value=\"$value\">
                    </div>
                  </div>";
            }
        }
    }

    function renderAttributesSection($data) {
        foreach ($data as $key => $value) {
            echo "<div class=\"form-group form-inline row\">
                        <label for=\"charName\" class=\"col-sm-3\">$key</label>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"full$key\" value=\"$value\">
                        </div>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"half$key\" value=\"".ceil(($value/2))."\" disabled>
                        </div>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"quarter$key\" value=\"".ceil(($value/4))."\" disabled>
                        </div>
                    </div>";
        }

        $key = "MOV";
        $value = ceil(($data->{'STR'} + $data->{'REF'})/2);
        echo "<div class=\"form-group form-inline row\">
                        <label for=\"charName\" class=\"col-sm-3\">$key</label>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"full$key\" value=\"$value\" disabled>
                        </div>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"half$key\" value=\"".ceil(($value/2))."\" disabled>
                        </div>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"quarter$key\" value=\"".ceil(($value/4))."\" disabled>
                        </div>
                    </div>";

        $key = "DEX";
        $value = ceil(($data->{'INT'} + $data->{'REF'})/2);
        echo "<div class=\"form-group form-inline row\">
                        <label for=\"full$key\" class=\"col-sm-3\">$key</label>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"full$key\" value=\"$value\" disabled>
                        </div>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"half$key\" value=\"".ceil(($value/2))."\" disabled>
                        </div>
                        <div class=\"col-sm-3\">
                            <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"quarter$key\" value=\"".ceil(($value/4))."\" disabled>
                        </div>
                    </div>";
    }


    function renderSkillsSection($data) {
        echo "<div class=\"row\" id=\"skills\">
                  <div class=\"col-sm-12 panel\">
                      <div class=\"col-sm-6 right-border\" id=\"skills1\">
                          <div class=\"form-group form-inline row\">
                              <label class=\"col-sm-4 ts-header\">Skill</label>
                              <label class=\"col-sm-2 ts-header\">Level</label>
                              <label class=\"col-sm-2 ts-header\">Full</label>
                              <label class=\"col-sm-2 ts-header\">1/2</label>
                              <label class=\"col-sm-2 ts-header\">1/4</label>
                          </div>";

        $halfKeys = (count((array)$data))/2;
        $counter = 0;
        foreach ($data as $key => $value) {
            $counter++;
            if ($counter <= $halfKeys ){
            $num = str_replace("skill", "", $key);
            echo "<div class=\"form-group form-inline row\">
                      <div class=\"col-sm-4\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillName$num\" value=\"".$value->{'skillName'}."\">
                      </div>
                      <div class=\"col-sm-2\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"skillLevel$num\" value=\"".$value->{'skillLevel'}."\">
                      </div>
                      <div class=\"col-sm-2\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"skillFull$num\" value=\"".$value->{'skillFull'}."\">
                      </div>
                      <div class=\"col-sm-2\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"skillHalf$num\" value=\"".ceil($value->{'skillFull'}/2)."\" disabled>
                      </div>
                      <div class=\"col-sm-2\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"skillQuarter$num\" value=\"".ceil($value->{'skillFull'}/4)."\" disabled>
                      </div>
                  </div>";
            }else{
                break;
            }
        }

        echo "</div>";

        echo "<div class=\"col-sm-6 \" id=\"skills2\">
                  <div class=\"form-group form-inline row\">
                      <label class=\"col-sm-4 ts-header\">Skill</label>
                      <label class=\"col-sm-2 ts-header\">Level</label>
                      <label class=\"col-sm-2 ts-header\">Full</label>
                      <label class=\"col-sm-2 ts-header\">1/2</label>
                      <label class=\"col-sm-2 ts-header\">1/4</label>
                  </div>";

        $counter = 0;
        foreach ($data as $key => $value) {
            $counter++;
            if ($counter <= $halfKeys ) {
                continue;
            }else{
                $num = str_replace("skill", "", $key);
                echo "<div class=\"form-group form-inline row\">
                          <div class=\"col-sm-4\">
                              <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillName$num\" value=\"".$value->{'skillName'}."\">
                          </div>
                          <div class=\"col-sm-2\">
                              <input type=\"text\" class=\"form-control wide-input\" id=\"skillLevel$num\" value=\"".$value->{'skillLevel'}."\">
                          </div>
                          <div class=\"col-sm-2\">
                              <input type=\"text\" class=\"form-control wide-input\" id=\"skillFull$num\" value=\"".$value->{'skillFull'}."\">
                          </div>
                          <div class=\"col-sm-2\">
                              <input type=\"text\" class=\"form-control wide-input\" id=\"skillHalf$num\" value=\"".ceil($value->{'skillFull'}/2)."\" disabled>
                          </div>
                          <div class=\"col-sm-2\">
                              <input type=\"text\" class=\"form-control wide-input\" id=\"skillQuarter$num\" value=\"".ceil($value->{'skillFull'}/4)."\" disabled>
                          </div>
                      </div>";
            }
        }

        echo "</div></div></div>";
    }


    function renderWeaponsSection($data)
    {
        echo "<div class=\"row\" id=\"weapons\">
                  <div class=\"panel\">
                      <div class=\"form-group form-inline row\">
                          <label class=\"col-sm-6 ts-header\">Weapon</label>
                          <label class=\"col-sm-1 ts-header\">Short</label>
                          <label class=\"col-sm-1 ts-header\">Med</label>
                          <label class=\"col-sm-1 ts-header\">Long</label>
                          <label class=\"col-sm-2 ts-header\">Dmg</label>
                          <label class=\"col-sm-1 ts-header\">Rel</label>
                      </div>";

        foreach ($data as $key => $value) {
            $num = str_replace("weapon", "", $key);
            echo "<div class=\"form-group form-inline row weapon-container\">
                      <div class=\"col-sm-6\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"weaponName$num\" value=\"".$value->{'weaponName'}."\">
                      </div>
                      <div class=\"col-sm-1\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"weaponShort$num\" value=\"".$value->{'shortRange'}."\">
                      </div>
                      <div class=\"col-sm-1\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"weaponMed$num\" value=\"".$value->{'medRange'}."\">
                      </div>
                      <div class=\"col-sm-1\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"weaponLong$num\" value=\"".$value->{'longRange'}."\">
                      </div>
                      <div class=\"col-sm-2\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"weaponDamage$num\" value=\"".$value->{'damage'}."\">
                      </div>
                      <div class=\"col-sm-1\">
                          <input type=\"text\" class=\"form-control wide-input\" id=\"weaponReload$num\" value=\"".$value->{'reload'}."\">
                      </div>
                  </div>
                  <div class=\"form-group form-inline row\">
                      <div class=\"col-sm-12 weapon-notes-container\">
                          <div class=\"col-sm-12 weapon-notes\">
                              <label for=\"weaponNotes1\" class=\"col-sm-1\">Notes</label>
                              <div class=\"col-sm-11\">
                                  <input type=\"text\" class=\"form-control wide-input\" id=\"weaponNotes$num\" value=\"".$value->{'notes'}."\">
                              </div>
                          </div>
                      </div>
                  </div>";
        }

        echo "</div></div>";
    }

    function getHitpointClass($hpValue) {
        switch ($hpValue) {
            case "1":
                return "hit-point-healthy";
                break;
            case "2":
                return "hit-point-bruised";
                break;
            case "3":
                return "hit-point-wounded";
                break;
            case "4":
                return "hit-point-not-available";
                break;
        }
    }

    function getHitpointsOrientationClass($section) {
        if ($section == 1 || $section == 2) {
            return "hit-points-vertical";
        }else{
            return "hit-points-horizontal";
        }
    }

    function renderHPSection($data) {

        echo "<div class=\"col-md-4 no-padding\" id=\"hitPoints\">
                  <div class=\"panel hit-point-row\">
                      <div class=\"hit-point-image-container\">
                          <img id=\"hpImage\" src=\"img/body.png\">";

        foreach ($data as $key => $value) {
            echo "<div class=\"".getHitpointsOrientationClass(str_replace("hitPoints", "", $key))."\" id=\"$key\">
                      <div class=\"hit-point ".getHitpointClass($value[0])."\" id=\"$key-0\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[1])."\" id=\"$key-1\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[2])."\" id=\"$key-2\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[3])."\" id=\"$key-3\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[4])."\" id=\"$key-4\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[5])."\" id=\"$key-5\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[6])."\" id=\"$key-6\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[7])."\" id=\"$key-7\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[8])."\" id=\"$key-8\"></div>
                      <div class=\"hit-point ".getHitpointClass($value[9])."\" id=\"$key-9\"></div>
                  </div>";
        }

        echo "<div class=\"hit-points-label\" id=\"hitPointsLabel0\">0</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel1\">1</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel2\">2</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel3\">3</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel4\">4</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel5\">5</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel6\">6</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel7\">7</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel8\">8</div>
              <div class=\"hit-points-label\" id=\"hitPointsLabel9\">9</div>

              <div id=\"hitPointLegend\">
                  <div class=\"no-padding\">
                      <div class=\"hit-point-static hit-point-healthy no-padding\"></div>
                  </div>
                  <div class=\"no-padding\">
                      <div class=\"hit-point-legend-label no-padding\">-Healthy</div>
                  </div>
                      <div class=\"no-padding\">
                      <div class=\"hit-point-static hit-point-bruised no-padding\"></div>
                  </div>
                  <div class=\"no-padding\">
                      <div class=\"hit-point-legend-label no-padding\">-Bruised</div>
                  </div>
                  <div class=\"no-padding\">
                      <div class=\"hit-point-static hit-point-wounded no-padding\"></div>
                  </div>
                  <div class=\"no-padding\">
                      <div class=\"hit-point-legend-label no-padding\">-Wounded</div>
                  </div>
                  <div class=\"no-padding\">
                      <div class=\"hit-point-static hit-point-not-available no-padding\"></div>
                  </div>
                  <div class=\"no-padding\">
                      <div class=\"hit-point-legend-label no-padding\">-Unavail</div>
                  </div>
              </div>
          </div>
      </div>
  </div>";
    }


    function renderGenericSection($heading, $data) {

        echo "<div class=\"row\">
                  <label class=\"col-sm-12 ts-header\">$heading</label>
              </div>";
        foreach ($data as $key => $value) {
            echo "<div class=\"form-group form-inline row\">
                      <div class=\"col-sm-12\">
                          <input type=\"text\" class=\"form-control input-sm wide-input\" id=\"$key\" value=\"$value\">
                      </div>
                  </div>";
        }
    }


    ?>
    <!--======================== STOP PHP FUNCTIONS ==========================-->
</head>
<body>

<!--======================== START NAVBAR ==========================-->
<nav class="navbar navbar-default navbar-fixed-top nav-container">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-left logo-link ts-link" href="#">
                <img class="logo-image" src="img/favicon/favicon-96x96.png" />
                <span class="navbar-brand logo-text ts-link">
                    TS/SI Agent Dossier
                </span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#stats" class="scroll ts-link">Stats</a></li>
                <li><a href="#hitpointsRow" class="scroll ts-link">HP</a></li>
                <li><a href="#skills" class="scroll ts-link">Skills</a></li>
                <li><a href="#documentsTechniques" class="scroll ts-link">Docs</a></li>
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
                    <label for="Name" class="col-sm-2">Character Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control wide-input input-lg" id="Name" value="<?php echo $characterData->{'info'}->{'Name'}; ?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 no-padding">
                <div class="form-group form-inline row name">
                    <label for="Player" class="col-sm-2">Player Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control wide-input input-lg" id="Player" value="<?php echo $characterData->{'info'}->{'Player'}; ?>">
                    </div>
                </div>
            </div>
        </div>

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
                <div class="col-sm-12 panel no-padding half-height">
                    <label class="col-sm-12 ts-header">Backstory</label>
                    <div class="col-sm-12 text-center">
                        <textarea id="Backstory" rows="5"class="wide-input"><?php echo $characterData->{'info'}->{'Backstory'}; ?></textarea>
                    </div>
                </div>
                <div class="col-sm-12 panel no-padding half-height">
                    <label class="col-sm-12 ts-header">Campaign Notes</label>
                    <div class="col-sm-12 text-center">
                        <textarea id="Notes" rows="5"class="wide-input"><?php echo $characterData->{'info'}->{'Notes'}; ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!--======================== START HITPOINTS ==========================-->
        <div class="row" id="hitpointsRow">
            <?php renderHPSection($characterData->{'hitpoints'}); ?>

            <!--======================== START IMAGES ==========================-->

            <div class="col-sm-4 no-padding hit-point-row scrollable">
                <div class="col-sm-12 panel no-padding half-height">
                    <label class="col-sm-12 ts-header">Image 1</label>
                    <div class="col-sm-12 text-center">

                    </div>
                </div>
                <div class="col-sm-12 panel no-padding half-height">
                    <label class="col-sm-12 ts-header">Image 2</label>
                    <div class="col-sm-12 text-center">

                    </div>
                </div>
            </div>

            <!--======================== START NOTES ==========================-->
            <div class="col-sm-4 no-padding hit-point-row scrollable">
                <div class="col-sm-12 panel no-padding half-height">
                    <label class="col-sm-12 ts-header">Backstory</label>
                    <div class="col-sm-12 text-center">
                        <textarea id="Backstory" rows="10"class="wide-input"><?php echo $characterData->{'info'}->{'Notes'}; ?></textarea>
                    </div>
                </div>
                <div class="col-sm-12 panel no-padding half-height">
                    <label class="col-sm-12 ts-header">Campaign Notes</label>
                    <div class="col-sm-12 text-center">
                        <textarea id="Notes" rows="10"class="wide-input"><?php echo $characterData->{'info'}->{'Notes'}; ?></textarea>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <!--======================== START ADVANTAGES ==========================-->
    <div class="row" id="advantagesDisadvantages">
        <div class="col-sm-6 panel" id="advantages">
            <?php renderGenericSection("Advantages", $characterData->{'advantages'}); ?>
        </div>

        <!--======================== START DISADVANTAGES ==========================-->
        <div class="col-sm-6 panel" id="disadvantages">
            <?php renderGenericSection("Disadvantages", $characterData->{'disadvantages'}); ?>
        </div>
    </div>

    <!--======================== START SKILLS ==========================-->
    <?php renderSkillsSection($characterData->{'skills'}); ?>

    <!--======================== START DOCUMENTS ==========================-->
    <div class="row" id="documentsTechniques">
        <div class="col-sm-6 panel" id="documents">
            <?php renderGenericSection("Documents / Finances", $characterData->{'documents'}); ?>
        </div>

        <!--======================== START COMBAT TECHNIQUES ==========================-->
        <div class="col-sm-6 panel" id="techniques">
            <?php renderGenericSection("Close Combat Techniques", $characterData->{'combatTechniques'}); ?>
        </div>
    </div>

    <!--======================== START WEAPONS ==========================-->
    <?php renderWeaponsSection($characterData->{'weapons'}); ?>

    <!--======================== START EQUIPMENT ==========================-->
    <div class="row" id="equipmentPanel">
        <div class="col-sm-12 panel" id="equipment">
            <?php renderGenericSection("Equipment", $characterData->{'equipment'}); ?>
        </div>
    </div>



</body>
</html>