<?php

include './php-functions.php';

if(isset($_POST['characterData'])){
    $obj = json_decode($_POST['characterData']);

    // Escape all spaces, single and double quotes for final file name
    $playerName = str_replace(" ", $spaceReplacement, $obj->{'info'}->{'Player'});
    $charName = str_replace(" ", $spaceReplacement, $obj->{'info'}->{'Name'});

    $playerName = str_replace("\"", $doubleQuoteReplacement,$playerName);
    $charName = str_replace("\"", $doubleQuoteReplacement,$charName);

    $playerName = str_replace("'", $singleQuoteReplacement,$playerName);
    $charName = str_replace("'", $singleQuoteReplacement,$charName);

    //Convert blank names to "blank"
    if (str_replace($spaceReplacement, "", $playerName) == ""){
        $playerName = "blank";
    }

    if (str_replace($spaceReplacement, "", $charName) == ""){
        $charName = "blank";
    }

    $fileName = $playerName.$charFileNameDelimiter.$charName.".json";
    $filePath = "../".$characterDir."/".$fileName;

    $charFile = fopen($filePath, "w") or die("Unable to open file!");
    fwrite($charFile, $_POST['characterData']);
    fclose($charFile);
    chmod($filePath, 0777);
}

?>