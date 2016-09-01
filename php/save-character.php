<?php

if(isset($_POST['characterData'])){
    $obj = json_decode($_POST['characterData']);

    $playerName = str_replace(" ", "_", $obj->{'info'}->{'Player'});
    $charName = str_replace(" ", "_", $obj->{'info'}->{'Name'});

    if (str_replace("_", "", $playerName) == ""){
        $playerName = "blank";
    }

    if (str_replace("_", "", $charName) == ""){
        $charName = "blank";
    }

    $fileName = $playerName."-".$charName.".json";
    $filePath = "../characters/".$fileName;

    $charFile = fopen($filePath, "w") or die("Unable to open file!");
    fwrite($charFile, $_POST['characterData']);
    fclose($charFile);
    chmod($filePath, 0777);
}

?>