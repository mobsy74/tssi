<?php

$uploadDir = "uploads";

function renderInfoSection($data) {
    foreach ($data as $key => $value) {
        if ($key == 'Name' || $key == 'Player' || $key == 'Notes'  || $key == 'Backstory') {
            continue;
        } else {
            echo "<div class=\"form-group form-inline row\">
                      <label for=\"$key\" class=\"col-sm-3 stat-label\">$key</label>
                      <div class=\"col-sm-9\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"$key\" value=\"$value\">
                      </div>
                  </div>";
        }
    }
}

function renderAttributesSection($data) {
    foreach ($data as $key => $value) {
        echo "<div class=\"form-group form-inline row row-with-margin\">
                  <label for=\"charName\" class=\"col-sm-3 stat-label\">$key</label>
                  <div class=\"col-sm-3 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm attribute\" id=\"full$key\" value=\"$value\">
                  </div>
                  <div class=\"col-sm-3 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"half$key\" value=\"".ceil(($value/2))."\" disabled>
                  </div>
                  <div class=\"col-sm-3 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"quarter$key\" value=\"".ceil(($value/4))."\" disabled>
                  </div>
              </div>";
    }

    $key = "MOV";
    $value = ceil(($data->{'STR'} + $data->{'REF'})/2);
    echo "<div class=\"form-group form-inline row row-with-margin\">
              <label for=\"charName\" class=\"col-sm-3 stat-label\">$key</label>
              <div class=\"col-sm-3 no-padding\">
                  <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"full$key\" value=\"$value\" disabled>
              </div>
              <div class=\"col-sm-3 no-padding\">
                  <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"half$key\" value=\"".ceil(($value/2))."\" disabled>
              </div>
              <div class=\"col-sm-3 no-padding\">
                  <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"quarter$key\" value=\"".ceil(($value/4))."\" disabled>
              </div>
          </div>";

    $key = "DEX";
    $value = ceil(($data->{'INT'} + $data->{'REF'})/2);
    echo "<div class=\"form-group form-inline row row-with-margin\">
              <label for=\"full$key\" class=\"col-sm-3 stat-label\">$key</label>
              <div class=\"col-sm-3 no-padding\">
                  <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"full$key\" value=\"$value\" disabled>
              </div>
              <div class=\"col-sm-3 no-padding\">
                  <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"half$key\" value=\"".ceil(($value/2))."\" disabled>
              </div>
              <div class=\"col-sm-3 no-padding\">
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
                      <div class=\"col-sm-4 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillName$num\" value=\"".$value->{'skillName'}."\">
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillLevel$num\" value=\"".$value->{'skillLevel'}."\">
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm skill\" id=\"skillFull$num\" value=\"".$value->{'skillFull'}."\">
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillHalf$num\" value=\"".ceil($value->{'skillFull'}/2)."\" disabled>
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillQuarter$num\" value=\"".ceil($value->{'skillFull'}/4)."\" disabled>
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
                      <div class=\"col-sm-4 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillName$num\" value=\"".$value->{'skillName'}."\">
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillLevel$num\" value=\"".$value->{'skillLevel'}."\">
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm skill\" id=\"skillFull$num\" value=\"".$value->{'skillFull'}."\">
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillHalf$num\" value=\"".ceil($value->{'skillFull'}/2)."\" disabled>
                      </div>
                      <div class=\"col-sm-2 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"skillQuarter$num\" value=\"".ceil($value->{'skillFull'}/4)."\" disabled>
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
        echo "<div class=\"weapon-container\">
                  <div class=\"form-group form-inline row weapon-stats-container\">
                      <div class=\"col-sm-6 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponName$num\" value=\"".$value->{'weaponName'}."\">
                      </div>
                      <div class=\"col-sm-1 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponShort$num\" value=\"".$value->{'shortRange'}."\">
                  </div>
                  <div class=\"col-sm-1 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponMed$num\" value=\"".$value->{'medRange'}."\">
                  </div>
                  <div class=\"col-sm-1 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponLong$num\" value=\"".$value->{'longRange'}."\">
                  </div>
                  <div class=\"col-sm-2 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponDamage$num\" value=\"".$value->{'damage'}."\">
                  </div>
                  <div class=\"col-sm-1 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponReload$num\" value=\"".$value->{'reload'}."\">
                  </div>
              </div>
                  <div class=\"form-group form-inline row\">
                      <div class=\"col-sm-12 weapon-notes-container no-padding\">
                          <div class=\"col-sm-12 weapon-notes no-padding\">
                              <label for=\"weaponNotes1\" class=\"col-sm-1 ts-header\">Notes</label>
                              <div class=\"col-sm-11 no-padding\">
                                  <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"weaponNotes$num\" value=\"".$value->{'notes'}."\">
                              </div>
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
              <div class=\"panel hit-point-row centered-content\">
                  <div class=\"hp-dimensions\">
                      <img id=\"hpImage\" class=\"hp-dimensions\" src=\"img/body.png\">";

    foreach ($data as $key => $value) {
        $num=str_replace("hitPoints", "", $key);
        echo "<div class=\"".getHitpointsOrientationClass($num)."\" id=\"$key\">
                  <div class=\"row no-padding\">
                      <div class=\"text-center no-padding\">
                          <div class=\"hit-points-label-static\" id=\"hitPointsLabel$num\">$num</div>
                      </div>
                  </div>";


        foreach ($value as $arrayKey => $arrayValue){
            echo "<div class=\"hit-point hit-point-clickable ".getHitpointClass($arrayValue)."\" id=\"$key-$arrayKey\"></div>";
        }
        echo "</div>";
    }

    echo "<div id=\"hitPointLegend\">
              <div class=\"no-padding\">
                  <div class=\"hit-point hit-point-legend hit-point-healthy no-padding\"></div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point-legend-label no-padding\">-Healthy</div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point hit-point-legend hit-point-bruised no-padding\"></div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point-legend-label no-padding\">-Bruised</div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point hit-point-legend hit-point-wounded no-padding\"></div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point-legend-label no-padding\">-Wounded</div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point hit-point-legend hit-point-not-available no-padding\"></div>
              </div>
              <div class=\"no-padding\">
                  <div class=\"hit-point-legend-label no-padding\">-Unavailable</div>
              </div>
          </div>
      </div>
  </div>
</div>";
}


function renderImagesSection($data, $uploadDir) {
    foreach ($data as $key => $value) {
        $num=str_replace("image", "", $key);
        echo "<div class=\"col-sm-4 panel no-padding first-row\">
                  <div class=\"col-sm-12\">
                      <label class=\"col-sm-5 ts-header no-padding\">Image $num</label>
                      <div class=\"col-sm-2 image-filename-label\">
                          <label class=\"no-padding\">File: </label>
                      </div>
                      <div class=\"col-sm-5 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm image-filename\" id=\"imageFile$num\" value=\"$value\">
                      </div>
                  </div>
                  <div class=\"col-sm-12 no-padding height-90\">
                      <div class=\"image-container\" id=\"imageContainer$num\">";

        $trueValue = preg_replace('/\s+/', '', $value);
        if ($trueValue != "") {
            echo "
                      <a href=\"$uploadDir/$value\" class=\"highslide\" onclick=\"return hs.expand(this, {captionId: 'imageCaption".$num."'})\">
                          <img class=\"image\" src=\"$uploadDir/$value\" title=\"Click to enlarge\"/>
                      </a>
                      <div class=\"highslide-caption\" id=\"imageCaption$num\">
                          $value
                      </div>";
        }

        echo "</div></div></div>";
    }
}


function renderEquipmentSection($data, $uploadDir) {
    echo "<div class=\"row\" id=\"equipmentPanel\">
              <div class=\"col-sm-12 panel\">
                  <div class=\"col-sm-6 right-border\" id=\"equipment1\">
                      <div class=\"form-group form-inline row\">
                          <label class=\"col-sm-7 ts-header\">Equipment</label>
                          <label class=\"col-sm-3 ts-header\">File</label>
                          <label class=\"col-sm-2 ts-header no-padding label-right-align\">On Hand</label>
                      </div>";

    $halfKeys = (count((array)$data))/2;
    $counter = 0;
    foreach ($data as $key => $value) {
        $counter++;
        if ($counter <= $halfKeys ){
            $num = str_replace("equipment", "", $key);
            echo "<div class=\"form-group form-inline row\">
                      <div class=\"col-sm-7 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"equipmentName$num\" value=\"".$value->{'equipmentName'}."\">
                      </div>
                  <div class=\"col-sm-4 no-padding\">
                      <input type=\"text\" class=\"form-control wide-input input-sm equipment-image-filename\" id=\"equipmentImage$num\" value=\"".$value->{'equipmentImage'}."\">
                  </div>
                  <div class=\"col-sm-1 no-padding\">
                      <div class=\"col-sm-9 no-padding\" id=\"equipmentImageContainer$num\">";

            $trueValue = preg_replace('/\s+/', '', $value->{'equipmentImage'});
            if ($trueValue != "") {
                echo "<a href=\"$uploadDir/" . $value->{'equipmentImage'} . "\" class=\"highslide\" onclick=\"return hs.expand(this, {captionId: 'equipmentImageCaption" . $num . "'})\">
                          <img class=\"image\" src=\"img/photo1-sm.jpg\" title=\"Click to enlarge\"/>
                      </a>
                      <div class=\"highslide-caption\" id=\"equipmentImageCaption$num\">
                          " . $value->{'equipmentImage'} . "
                      </div>";
            }

            echo "</div>
                  <div class=\"col-sm-3 equipment-check-box\">
                      <input type=\"checkbox\" id=\"equipmentCarrying$num\" ".getEquipmentCarryingFlag($value->{'equipmentCarrying'}).">
                  </div>
              </div>
          </div>";
        }else{
            break;
        }
    }

    echo "</div>";

    echo "<div class=\"col-sm-6 \" id=\"equipment1\">
              <div class=\"form-group form-inline row\">
                  <label class=\"col-sm-7 ts-header\">Equipment</label>
                  <label class=\"col-sm-3 ts-header\">File</label>
                  <label class=\"col-sm-2 ts-header no-padding label-right-align\">On Hand</label>
              </div>";

    $counter = 0;
    foreach ($data as $key => $value) {
        $counter++;
        if ($counter <= $halfKeys ) {
            continue;
        }else{
            $num = str_replace("equipment", "", $key);
            echo "<div class=\"form-group form-inline row\">
                      <div class=\"col-sm-7 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm\" id=\"equipmentName$num\" value=\"".$value->{'equipmentName'}."\">
                      </div>
                      <div class=\"col-sm-4 no-padding\">
                          <input type=\"text\" class=\"form-control wide-input input-sm equipment-image-filename\" id=\"equipmentImage$num\" value=\"".$value->{'equipmentImage'}."\">
                      </div>
                      <div class=\"col-sm-1 no-padding\">
                          <div class=\"col-sm-9 no-padding\" id=\"equipmentImageContainer$num\">";

            $trueValue = preg_replace('/\s+/', '', $value->{'equipmentImage'});
            if ($trueValue != "") {
                echo "<a href=\"$uploadDir/" . $value->{'equipmentImage'} . "\" class=\"highslide\" onclick=\"return hs.expand(this, {captionId: 'equipmentImageCaption" . $num . "'})\">
                          <img class=\"image\" src=\"img/photo1-sm.jpg\" title=\"Click to enlarge\"/>
                      </a>
                      <div class=\"highslide-caption\" id=\"equipmentImageCaption$num\">
                          " . $value->{'equipmentImage'} . "
                      </div>";
            }

            echo "</div>
                  <div class=\"col-sm-3 equipment-check-box\">
                      <input type=\"checkbox\" id=\"equipmentCarrying$num\" ".getEquipmentCarryingFlag($value->{'equipmentCarrying'}).">
                  </div>
              </div>
          </div>";
        }
    }

    echo "</div></div></div>";
}


function getEquipmentCarryingFlag($flag) {
    if ($flag == "true") {
        return "checked";
    }else{
        return "";
    }
}


function renderGenericSection($heading, $data) {

    echo "<div class=\"row\">
              <label class=\"col-sm-12 ts-header\">$heading</label>
          </div>";
    foreach ($data as $key => $value) {
        echo "<div class=\"form-group form-inline row\">
                  <div class=\"col-sm-12\">
                      <input type=\"text\" class=\"form-control input-sm wide-input\" id=\"".$key."\" value=\"".$value."\">
                  </div>
              </div>";
    }
}


//================================ INDEX PAGE FUNCTIONS =======================================

function getCharacterList(){
    $characterDir = "characters";
    $blankCharacterFileName = "blank-blank.json";
    $characterFileList = scandir($characterDir);
//    print_r($characterFileList);

    echo "<div class=\"safe-house-link\">
              <a href=\"character.php\" target=\"_blank\">Create New Character</a>
          </div>";

    foreach ($characterFileList as $arrayKey => $characterFile){
        if ($characterFile != "." && $characterFile != ".." &&$characterFile != $blankCharacterFileName) {
            $charPiecesArray = explode("-", $characterFile);
            $playerName = str_replace("_", " ",$charPiecesArray[0]);
            $characterName = str_replace(".json", "",str_replace("_", " ",$charPiecesArray[1]));
            $linkText = $characterName." (".$playerName.")";
            echo "<div class=\"safe-house-link\">
                      <a href=\"character.php?characterFile=$characterFile\" target=\"_blank\">$linkText</a>
                  </div>";
        }
    }
}


?>