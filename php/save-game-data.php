<?php

if(isset($_POST['gameData'])){
    $obj = json_decode($_POST['gameData']);

    $fileName = $obj->{'gameDataFileName'};
    $filePath = "../data/".$fileName;

    $gameFile = fopen($filePath, "w") or die("Unable to open file!");
    fwrite($gameFile, $_POST['gameData']);
    fclose($gameFile);
    chmod($filePath, 0777);

    echo "It worked!!!!";
}

?>