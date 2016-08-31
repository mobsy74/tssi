<?php

if(isset($_POST['characterData'])){
 $obj = json_decode($_POST['characterData']);

 $playerName = str_replace(" ", "_", $obj->{'info'}->{'Player'});
 $charName = str_replace(" ", "_", $obj->{'info'}->{'Name'});
 $fileName = $playerName."-".$charName.".json";

 $charFile = fopen("characters/".$fileName, "w") or die("Unable to open file!");
 fwrite($charFile, $_POST['characterData']);
 fclose($charFile);
}

?>