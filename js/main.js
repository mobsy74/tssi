var navbarHeight = 56;
var numAdvantages = 8;
var numDisadvantages = 8;
var numSkills = 50;
var numEquipmentSlots = 50;
var numWeapons = 10;
var numDocuments = 10;
var numCombatTechniques = 10;
var numHPAreas = 10;
var numHPs = 20;
var numImages = 3;
var uploadDir = "uploads";
var numDice = 12;
var whiteboardBaseURL = "https://awwapp.com";
var defaultGameDataFileName = "game-data.json";
var pageIsDirty = false;

function indentJson(json){
    return JSON.stringify(json, null, 2);
}


function generateEmptyGameJSON(save) {
    var gameState = {
        "gameDataFileName": defaultGameDataFileName,
        "dieRolls": [],
        "whiteBoardLink": whiteboardBaseURL
    };

    gameState.dieRolls[0] = getEmptyDieRoll();

    if (save) {
        saveGameData(gameState);
    }

    return gameState;
}

function getEmptyDieRoll() {

    return {
        "user": "",
        "timestamp": "",
        "dieType": "",
        "dieCount": "",
        "values": []
    };
}

function generateGenericGameJSON() {
    var gameState = {
        "gameDataFileName": defaultGameDataFileName,
        "dieRolls": [],
        "whiteBoardLink": whiteboardBaseURL
    };

    gameState.dieRolls[0] = getEmptyDieRoll();

    gameState.dieRolls[0].user = "Tom";
    gameState.dieRolls[0].timestamp = new Date().toUTCString().split(", ")[1].replace(" GMT","");
    gameState.dieRolls[0].dieType = "100";
    gameState.dieRolls[0].dieCount = "2";
    gameState.dieRolls[0].values = [50,99];

    gameState.dieRolls[1] = getEmptyDieRoll();
    gameState.dieRolls[1].user = "Tom";
    gameState.dieRolls[1].timestamp = new Date().toUTCString().split(", ")[1].replace(" GMT","");
    gameState.dieRolls[1].dieType = "100";
    gameState.dieRolls[1].dieCount = "2";
    gameState.dieRolls[1].values = [50,99];

    gameState.dieRolls[2] = getEmptyDieRoll();
    gameState.dieRolls[2].user = "Tom";
    gameState.dieRolls[2].timestamp = new Date().toUTCString().split(", ")[1].replace(" GMT","");
    gameState.dieRolls[2].dieType = "100";
    gameState.dieRolls[2].dieCount = "2";
    gameState.dieRolls[2].values = [50,99];

    saveGameData(gameState);
}

function saveGameData(gameState){
    var gameDataString = indentJson(gameState);
    //console.log(gameDataString);

    $.ajax({
        type: "POST",
        url: "php/save-game-data.php",
        data: {gameData:gameDataString},
        success: function(data){
            console.log("Game data saved.");
            $("#jsonDisplay").html("<pre>" + gameDataString + "</pre>");
        },
        error: function(e){
            console.log("There was a problem saving the game data.");
            if(e.message){
                alert('An error occurred when attempting to save the game data.  Ask the administrator to check the server logs for more information.');
                console.log(e.message);
            }
        }
    });
}


function generateEmptyCharacterJSON(save) {
    var tempObj;
    var tempObj2;
    var tempArr;

    var characterData = {
        "info": {
            "Player": "",
            "Name": "",
            "Nation": "",
            "Sex": "",
            "Race": "",
            "Height": "",
            "Weight": "",
            "Eyes": "",
            "Hair": "",
            "XP": "",
            "Luck Points": "",
            "Backstory": "",
            "Notes": ""
        },
        "attributes": {
            "STR": "",
            "REF": "",
            "INT": "",
            "WIL": "",
            "CON": ""
        }
    };


    tempObj = {};
    tempArr = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];
    for (var i=0; i < numHPAreas; i++) {
        tempObj["hitPoints" + i] = tempArr;
    }
    characterData["hitpoints"] = tempObj;


    tempObj = {};
    for (i=1; i <= numAdvantages; i++) {
        tempObj["advantage" + i] = "";
    }
    characterData["advantages"] = tempObj;


    tempObj = {};
    for (i=1; i <= numDisadvantages; i++) {
        tempObj["disadvantage" + i] = "";
    }
    characterData["disadvantages"] = tempObj;


    tempObj = {};
    for (i=1; i <= numDocuments; i++) {
        tempObj["document" + i] = "";
    }
    characterData["documents"] = tempObj;


    tempObj = {};
    for (i=1; i <= numCombatTechniques; i++) {
        tempObj["combatTechnique" + i] = "";
    }
    characterData["combatTechniques"] = tempObj;


    tempObj = {};
    for (i=1; i <= numImages; i++) {
        tempObj["image" + i] = "";
    }
    characterData["images"] = tempObj;


    tempObj = {};
    tempObj2 = {
        "skillName": "",
        "skillLevel": "",
        "skillFull": ""
    };
    for (i=1; i <= numSkills; i++) {
        tempObj["skill" + i] = tempObj2;
    }
    characterData["skills"] = tempObj;


    tempObj = {};
    tempObj2 = {
        "weaponName": "",
        "shortRange": "",
        "medRange": "",
        "longRange": "",
        "damage": "",
        "reload": "",
        "notes": ""
    };
    for (i=1; i <= numWeapons; i++) {
        tempObj["weapon" + i] = tempObj2;
    }
    characterData["weapons"] = tempObj;


    tempObj = {};
    for (i=1; i <= numEquipmentSlots; i++) {
        tempObj2 = {
            "equipmentName": "",
            "equipmentImage": "",
            "equipmentCarrying": "false"
        };
        tempObj["equipment" + i] = tempObj2;
    }
    characterData["equipment"] = tempObj;

    if (save) {
        saveCharacter(characterData);
    }

    return characterData;
}


function generateDummyCharacterJSON() {
    var tempObj;
    var tempObj2;

    var characterData = {
        "info": {
            "Player": "Demo Character",
            "Name": "Johnny Five",
            "Nation": "USA",
            "Sex": "Male",
            "Race": "Caucasian",
            "Height": "6'1\"",
            "Weight": "180 lbs.",
            "Eyes": "Green",
            "Hair": "Brown",
            "XP": "5",
            "Luck Points": "2",
            "Backstory": "Born in a dumpster.  Died in prison.",
            "Notes": "This campaign blows."
        },
        "attributes": {
            "STR": "40",
            "REF": "45",
            "INT": "50",
            "WIL": "55",
            "CON": "60"
        }
    };


    tempObj = {};
    var healthyArr = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,4,4,4,4];
    var bruisedArr = [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,4,4,4,4];
    var woundedArr = [3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,4,4,4,4];
    for (var i=0; i < numHPAreas; i++) {
        if (i == 4){
            tempObj["hitPoints" + i] = bruisedArr;
        } else {
            if (i == 6) {
                tempObj["hitPoints" + i] = woundedArr;
            } else {
                tempObj["hitPoints" + i] = healthyArr;
            }
        }
    }
    characterData["hitpoints"] = tempObj;


    tempObj = {};
    for (i=1; i <= numAdvantages; i++) {
        tempObj["advantage" + i] = "advantage" + i;
    }
    characterData["advantages"] = tempObj;


    tempObj = {};
    for (i=1; i <= numDisadvantages; i++) {
        tempObj["disadvantage" + i] = "disadvantage" + i;
    }
    characterData["disadvantages"] = tempObj;


    tempObj = {};
    for (i=1; i <= numDocuments; i++) {
        tempObj["document" + i] = "document" + i;
    }
    characterData["documents"] = tempObj;


    tempObj = {};
    for (i=1; i <= numCombatTechniques; i++) {
        tempObj["combatTechnique" + i] = "combatTechnique" + i;
    }
    characterData["combatTechniques"] = tempObj;


    tempObj = {};
    for (i=1; i <= numImages; i++) {
        tempObj["image" + i] = "generic" + i + ".jpg";
    }
    characterData["images"] = tempObj;


    tempObj = {};
    for (i=1; i <= numSkills; i++) {
        tempObj2 = {
            "skillName": "skill" + i,
            "skillLevel": "1",
            "skillFull": "60"
        };
        tempObj["skill" + i] = tempObj2;
    }
    characterData["skills"] = tempObj;


    tempObj = {};
    for (i=1; i <= numWeapons; i++) {
        tempObj2 = {
            "weaponName": "weapon" + i,
            "shortRange": "50",
            "medRange": "100",
            "longRange": "200",
            "damage": "d6+1",
            "reload": "1",
            "notes": "Three clips (10 capacity) of .45 dum-dum"
        };
        tempObj["weapon" + i] = tempObj2;
    }
    characterData["weapons"] = tempObj;


    tempObj = {};
    for (i=1; i <= numEquipmentSlots; i++) {
        tempObj2 = {
            "equipmentName": "equipment" + i,
            "equipmentImage": "equipment-placeholder-image.jpg",
            "equipmentCarrying": "true"
        };
        tempObj["equipment" + i] = tempObj2;
    }
    characterData["equipment"] = tempObj;

    saveCharacter(characterData);
}

function saveCharacter(characterData){

    var agent = $("#user").val();
    var response = true;
    if (agent != $("#Player").val()) {
        response = confirm("This character does not belong to you, " + agent + ".  Are you sure you wish to save it?");
    }

    if (response){
        var characterDataString = indentJson(characterData);
        //console.log(characterDataString);

        $.ajax({
            type: "POST",
            url: "php/save-character.php",
            data: {characterData:characterDataString},
            success: function(data){
                console.log("Character saved.");
                $("#jsonDisplay").html("<pre>" + characterDataString + "</pre>");
                //alert('Character was successfully saved.');
                markPageAsClean();
            },
            error: function(e){
                console.log("There was a problem saving the character.");
                if(e.message){
                    alert('An error occurred when attempting to save the character.  Ask the administrator to check the server logs for more information.');
                    console.log(e.message);
                }
            }
        });
    }
}

function getHitPointValue(divID){
    var classList = $('#' + divID).attr('class').split(/\s+/);
    for (var i = 0; i < classList.length; i++) {
            switch(classList[i]) {
                case "hit-point-healthy":
                    return 1;
                    break;
                case "hit-point-bruised":
                    return 2;
                    break;
                case "hit-point-wounded":
                    return 3;
                    break;
                case "hit-point-not-available":
                    return 4;
                    break;
                default:
            }
    }
}

function validateCharacterInfo(json){
    var name = json['info']['Name'].replace(/ /g,"");
    var player = json['info']['Player'].replace(/ /g,"");

    return !(player == "" && name == "")
}

function saveCurrentStateCharacterJSON(){
    var data = generateEmptyCharacterJSON(false);
    var currentState = getCurrentStateCharacterJSON(data);
    if (validateCharacterInfo(currentState)){
        saveCharacter(currentState);
    } else {
        alert("Please add a character name and a player name before saving.");
    }
}


function getCurrentStateCharacterJSON(json){

    json['info']['Player'] = $('#Player').val();
    json['info']['Name'] = $('#Name').val();
    json['info']['Nation'] = $('#Nation').val();
    json['info']['Sex'] = $('#Sex').val();
    json['info']['Race'] = $('#Race').val();
    json['info']['Height'] = $('#Height').val();
    json['info']['Weight'] = $('#Weight').val();
    json['info']['Eyes'] = $('#Eyes').val();
    json['info']['Hair'] = $('#Hair').val();
    json['info']['XP'] = $('#XP').val();
    json['info']['Luck Points'] = $('#Luck\\ Points').val();
    json['info']['Backstory'] = $('#Backstory').val();
    json['info']['Notes'] = $('#Notes').val();

    json['attributes']['STR'] = $('#fullSTR').val();
    json['attributes']['REF'] = $('#fullREF').val();
    json['attributes']['INT'] = $('#fullINT').val();
    json['attributes']['WIL'] = $('#fullWIL').val();
    json['attributes']['CON'] = $('#fullCON').val();

    var i, j;
    var tempObject = {};

    for (i=0; i < numHPAreas; i++){
        var hitPointArray = [];
        for (j=0; j < numHPs; j++) {
            hitPointArray[j] = getHitPointValue('hitPoints' + i + "-" + j);
        }
        json['hitpoints']['hitPoints' + i] = hitPointArray;
    }

    for (i=1; i <= numAdvantages; i++){
        json['advantages']['advantage' + i] = $('#advantage' + i).html();
    }

    for (i=1; i <= numDisadvantages; i++){
        json['disadvantages']['disadvantage' + i] = $('#disadvantage' + i).html();
    }

    for (i=1; i <= numDocuments; i++){
        json['documents']['document' + i] = $('#document' + i).html();
    }

    for (i=1; i <= numCombatTechniques; i++){
        json['combatTechniques']['combatTechnique' + i] = $('#combatTechnique' + i).html();
    }

    for (i=1; i <= numImages; i++){
        json['images']['image' + i] = $('#imageFile' + i).val();
    }

    for (i=1; i <= numSkills; i++){
        tempObject = {};
        tempObject['skillName'] = $('#skillName' + i).html();
        tempObject['skillLevel'] = $('#skillLevel' + i).val();
        tempObject['skillFull'] = $('#skillFull' + i).val();
        json['skills']['skill' + i] = tempObject;
    }

    for (i=1; i <= numWeapons; i++){
        tempObject = {};
        tempObject['weaponName'] = $('#weaponName' + i).html();
        tempObject['shortRange'] = $('#weaponShort' + i).val();
        tempObject['medRange'] = $('#weaponMed' + i).val();
        tempObject['longRange'] = $('#weaponLong' + i).val();
        tempObject['damage'] = $('#weaponDamage' + i).val();
        tempObject['reload'] = $('#weaponReload' + i).val();
        tempObject['notes'] = $('#weaponNotes' + i).html();
        json['weapons']['weapon' + i] = tempObject;
    }

    for (i=1; i <= numEquipmentSlots; i++){
        tempObject = {};
        tempObject['equipmentName'] = $('#equipmentName' + i).html();
        tempObject['equipmentImage'] = $('#equipmentImage' + i).val();
        tempObject['equipmentCarrying'] = $('#equipmentCarrying' + i).is(":checked");
        json['equipment']['equipment' + i] = tempObject;
    }

    return json;
}


function changeHitpoint(){
    var div = $(this);
    var hitpointStates = {
        "1": "hit-point-healthy",
        "2": "hit-point-bruised",
        "3": "hit-point-wounded",
        "4": "hit-point-not-available"
    };

    var classList = $(div).attr('class').split(/\s+/);
    var currentValue = 0;

    for (var i = 0; i < classList.length; i++) {
        switch(classList[i]) {
            case "hit-point-healthy":
                currentValue = 1;
                break;
            case "hit-point-bruised":
                currentValue = 2;
                break;
            case "hit-point-wounded":
                currentValue = 3;
                break;
            case "hit-point-not-available":
                currentValue = 4;
                break;
            default:
        }
    }

    var newValue = currentValue + 1;

    if (newValue == 5){
        newValue = 1;
    }

    $.each( hitpointStates, function( key, value ) {
        $(div).removeClass(value);
    });
    $(div).addClass(hitpointStates[newValue.toString()]);

    setHitpointBlockHealthGlow(div);

    markPageAsDirty();
}

function setHitpointBlockHealthGlow(div) {
    var containerDivIDBase = $(div).prop("id").split("-")[0];
    var containerDivID = containerDivIDBase + "-sub";

    var totalHPDamage = 0;
    var totalHPAvail = 0;

    for (i = 0; i < numHPs; i++) {
        var damageValue = getHitPointValue(containerDivIDBase + "-" + i);
        if (damageValue != 4) {
            totalHPDamage += (damageValue - 1);
            totalHPAvail += 1;
        }
    }

    var totalDamageAvail = totalHPAvail * 2;
    var percentDamage = totalHPDamage / totalDamageAvail;
    var currentHealthClass;

    if (percentDamage < .25) {
        currentHealthClass = "healthy-glow";
    } else {

        if (percentDamage < .5) {
            currentHealthClass = "low-danger-glow";
        } else {

            if (percentDamage < .75) {
                currentHealthClass = "medium-danger-glow";
            } else {
                currentHealthClass = "high-danger-glow";
            }
        }
    }


    var hitpointHealthClasses = {
        "1": "healthy-glow",
        "2": "low-danger-glow",
        "3": "medium-danger-glow",
        "4": "high-danger-glow"
    };

    var containerDiv = $("#" + containerDivID);

    $.each( hitpointHealthClasses, function( key, value ) {
        containerDiv.removeClass(value);
    });
    containerDiv.addClass(currentHealthClass);

}


function recalculateAttributes(){
    var div = $(this);
    var divID = div.prop("id");
    var attribute = divID.replace("full", "");
    var currentValue = $("#" + divID).val();
    var divHalfID = divID.replace("full", "half");
    var divQuarterID = divID.replace("full", "quarter");

    $("#" + divHalfID).val(Math.ceil(currentValue/2));
    $("#" + divQuarterID).val(Math.ceil(currentValue/4));

    switch (attribute){
        case "STR":
            var reflex = $("#fullREF").val();
            updateCombinedAttribute(currentValue, reflex, "MOV");
            break;
        case "REF":
            var strength = $("#fullSTR").val();
            updateCombinedAttribute(currentValue, strength, "MOV");
            var intelligence = $("#fullINT").val();
            updateCombinedAttribute(currentValue, intelligence, "DEX");
            break;
        case "INT":
            var reflex = $("#fullREF").val();
            updateCombinedAttribute(currentValue, reflex, "DEX");
            break;
    }
}

function updateCombinedAttribute(attr1, attr2, derivedAttribute){
    var fullAttribute = Math.ceil(((Number(attr1) + Number(attr2))/2));
    var halfAttribute = Math.ceil((fullAttribute)/2);
    var quarterAttribute = Math.ceil((fullAttribute)/4);

    $("#full"+ derivedAttribute).val(fullAttribute);
    $("#half" + derivedAttribute).val(halfAttribute);
    $("#quarter" + derivedAttribute).val(quarterAttribute);
}

function recalculateSkills(){
    var div = $(this);
    var divID = div.prop("id");
    var currentValue = $("#" + divID).val();
    var divHalfID = divID.replace("Full", "Half");
    var divQuarterID = divID.replace("Full", "Quarter");

    $("#" + divHalfID).val(Math.ceil(currentValue/2));
    $("#" + divQuarterID).val(Math.ceil(currentValue/4));
}

function updateImage(){
    var div = $(this);
    var divID = div.prop("id");
    var fileName = div.val();
    var imageNum = divID.replace("imageFile", "");
    var imageContainerID = "imageContainer" + imageNum;

    if (fileName == ""){
        $("#" + imageContainerID).html("");
    }else {
        var imageHTML = '<a href="' + uploadDir + '/' + fileName + '" class="highslide" onclick="return hs.expand(this, {captionId: \'imageCaption' + imageNum + '\'})">';
        imageHTML += '       <img class="image" src="' + uploadDir + '/' + fileName + '" title="Click to enlarge"/>';
        imageHTML += '   </a>';
        imageHTML += '   <div class="highslide-caption" id="imageCaption' + imageNum + '">';
        imageHTML += '       ' + fileName;
        imageHTML += '   </div>';

        $("#" + imageContainerID).html(imageHTML);
    }
}

function updateEquipmentImage(){
    var div = $(this);
    var divID = div.prop("id");
    var fileName = div.val();
    var imageNum = divID.replace("equipmentImage", "");
    var imageContainerID = "equipmentImageContainer" + imageNum;

    if (fileName == ""){
        $("#" + imageContainerID).html("");
    }else{
        var imageHTML = '<a href="' + uploadDir + '/' + fileName + '" class="highslide" onclick="return hs.expand(this, {captionId: \'imageCaption' + imageNum + '\'})">';
        imageHTML += '       <img class="image" src="img/photo1-sm.jpg" title="Click to enlarge"/>';
        imageHTML += '   </a>';
        imageHTML += '   <div class="highslide-caption" id="imageCaption' + imageNum + '">';
        imageHTML += '       ' + fileName;
        imageHTML += '   </div>';

        $("#" + imageContainerID).html(imageHTML);
    }
}

function calculateShot(){

    var div = $(this);
    var divID = div.prop("id");

    preventDuplicateChecks(divID);

    var baseValue = $("#base-skill").val();

    if (baseValue == "" || !($.isNumeric(baseValue))){
        $("#to-hit").val("");
        return;
    }

    var currentValue = Number(baseValue);
    if ($("#called-shot-half").is(":checked")){
        currentValue = Math.ceil(currentValue/2);
    }

    if ($("#called-shot-quarter").is(":checked")){
        currentValue = Math.ceil(currentValue/4);
    }

    if ($("#cover-half").is(":checked")){
        currentValue = Math.ceil(currentValue/2);
    }

    if ($("#cover-quarter").is(":checked")){
        currentValue = Math.ceil(currentValue/4);
    }

    if ($("#braced").is(":checked")){
        currentValue = currentValue + 10;
    }

    if ($("#prepared").is(":checked")){
        currentValue = currentValue + 5;
    }

    if ($("#short-burst").is(":checked")){
        currentValue = currentValue + 5;
    }

    if ($("#long-burst").is(":checked")){
        currentValue = currentValue + 10;
    }

    if ($("#point-blank-range").is(":checked")){
        currentValue = currentValue + 30;
    }
    if ($("#short-range").is(":checked")){
        currentValue = currentValue + 10;
    }
    //if ($("#medium-range").is(":checked")){
    //    currentValue = currentValue + 0;
    //}

    if ($("#long-range").is(":checked")){
        currentValue = currentValue - 40;
    }
    if ($("#scope").is(":checked")){
        currentValue = currentValue + 25;
    }
    if ($("#regular-shotgun").is(":checked")){
        currentValue = currentValue + 10;
    }
    if ($("#sawed-off-shotgun").is(":checked")){
        currentValue = currentValue + 20;
    }
    if ($("#slow-movement").is(":checked")){
        currentValue = currentValue - 10;
    }
    if ($("#medium-movement").is(":checked")){
        currentValue = currentValue - 25;
    }
    if ($("#fast-movement").is(":checked")){
        currentValue = currentValue - 40;
    }
    if ($("#one-hand").is(":checked")){
        currentValue = currentValue - 20;
    }
    if ($("#off-hand").is(":checked")){
        currentValue = currentValue - 30;
    }
    if ($("#rapid-fire").is(":checked")){
        currentValue = currentValue - 30;
    }

    $("#to-hit").val(currentValue);
}


function resetCalculator(){
    $("#base-skill").val("");
    $("#to-hit").val("");
    $("#called-shot-half").prop('checked', false);
    $("#called-shot-quarter").prop('checked', false);
    $("#cover-half").prop('checked', false);
    $("#cover-quarter").prop('checked', false);
    $("#braced").prop('checked', false);
    $("#prepared").prop('checked', false);
    $("#short-burst").prop('checked', false);
    $("#long-burst").prop('checked', false);
    $("#point-blank-range").prop('checked', false);
    $("#short-range").prop('checked', false);
    $("#medium-range").prop('checked', false);
    $("#long-range").prop('checked', false);
    $("#scope").prop('checked', false);
    $("#regular-shotgun").prop('checked', false);
    $("#sawed-off-shotgun").prop('checked', false);
    $("#slow-movement").prop('checked', false);
    $("#medium-movement").prop('checked', false);
    $("#fast-movement").prop('checked', false);
    $("#one-hand").prop('checked', false);
    $("#off-hand").prop('checked', false);
    $("#rapid-fire").prop('checked', false);
}


function preventDuplicateChecks(divID) {

    switch(divID){
        case "called-shot-half":
            if( $("#called-shot-half").is(":checked") ){
                $("#called-shot-quarter").prop('checked', false);
            }
            break;
        case "called-shot-quarter":
            if( $("#called-shot-quarter").is(":checked") ){
                $("#called-shot-half").prop('checked', false);
            }
            break;
        case "cover-half":
            if( $("#cover-half").is(":checked") ){
                $("#cover-quarter").prop('checked', false);
            }
            break;
        case "cover-quarter":
            if( $("#cover-quarter").is(":checked") ){
                $("#cover-half").prop('checked', false);
            }
            break;
        case "short-burst":
            if( $("#short-burst").is(":checked") ){
                $("#long-burst").prop('checked', false);
            }
            break;
        case "long-burst":
            if( $("#long-burst").is(":checked") ){
                $("#short-burst").prop('checked', false);
            }
            break;
        case "point-blank-range":
            if( $("#point-blank-range").is(":checked") ){
                $("#short-range").prop('checked', false);
                $("#medium-range").prop('checked', false);
                $("#long-range").prop('checked', false);
            }
            break;
        case "short-range":
            if( $("#short-range").is(":checked") ){
                $("#point-blank-range").prop('checked', false);
                $("#medium-range").prop('checked', false);
                $("#long-range").prop('checked', false);
            }
            break;
        case "medium-range":
            if( $("#medium-range").is(":checked") ){
                $("#short-range").prop('checked', false);
                $("#point-blank-range").prop('checked', false);
                $("#long-range").prop('checked', false);
            }
            break;
        case "long-range":
            if( $("#long-range").is(":checked") ){
                $("#short-range").prop('checked', false);
                $("#medium-range").prop('checked', false);
                $("#point-blank-range").prop('checked', false);
            }
            break;
        case "regular-shotgun":
            if( $("#regular-shotgun").is(":checked") ){
                $("#sawed-off-shotgun").prop('checked', false);
            }
            break;
        case "sawed-off-shotgun":
            if( $("#sawed-off-shotgun").is(":checked") ){
                $("#regular-shotgun").prop('checked', false);
            }
            break;
        case "slow-movement":
            if( $("#slow-movement").is(":checked") ){
                $("#medium-movement").prop('checked', false);
                $("#fast-movement").prop('checked', false);
            }
            break;
        case "medium-movement":
            if( $("#medium-movement").is(":checked") ){
                $("#slow-movement").prop('checked', false);
                $("#fast-movement").prop('checked', false);
            }
            break;
        case "fast-movement":
            if( $("#fast-movement").is(":checked") ){
                $("#slow-movement").prop('checked', false);
                $("#medium-movement").prop('checked', false);
            }
            break;
        case "one-hand":
            if( $("#one-hand").is(":checked") ){
                $("#off-hand").prop('checked', false);
            }
            break;
        case "off-hand":
            if( $("#off-hand").is(":checked") ){
                $("#one-hand").prop('checked', false);
            }
            break;
    }
}

function resetRoll(){
    $("#die-count").val(1);
    clearRoll();
}

function clearRoll(){
    for (var i=1; i<=numDice; i++){
        var div = $("#die" + i);
        div.html("");
        div.removeClass("die-result-active");
        $("#roll-type").html("");
    }
}

function rollDice(){
    rollSpecificDice($("#die-count").val(), $("#die-type").val())
}

function rollSpecificDice(dieCount, dieType){
    clearRoll();

    dieCount = $("#die-count").val();
    var dieRoll = getEmptyDieRoll();

    playDiceRoll();

    dieRoll.user = $("#user").val();
    dieRoll.timestamp = new Date().toUTCString().split(", ")[1].replace(" GMT","");
    dieRoll.dieType = dieType;
    dieRoll.dieCount = dieCount;


    jQuery.ajaxSetup({
        cache: false
    });

    $.ajax({
        'async': false,
        'global': false,
        'url': "data/" + defaultGameDataFileName,
        'dataType': "json",
        'success': function (gameData) {
            for (var i=1; i<=dieCount; i++){
                var div = $("#die" + i);
                var dieValue = Math.floor((Math.random() * dieType) + 1);
                var dieValueString;
                switch (true) {
                    case (dieType == 100 && dieValue < 10):
                        dieValueString = "0" + dieValue;
                        div.html(dieValueString);
                        dieRoll.values[i-1] = dieValueString;
                        break;
                    case (dieType == 100 && dieValue == 100):
                        dieValueString = "00";
                        div.html(dieValueString);
                        dieRoll.values[i-1] = dieValueString;
                        break;
                    case (dieType == 10 && dieValue == 10):
                        dieValueString = "0";
                        div.html(dieValueString);
                        dieRoll.values[i-1] = dieValueString;
                        break;
                    default:
                        div.html(dieValue);
                        dieRoll.values[i-1] = dieValue;
                        break;
                }
                div.addClass("die-result-active");
                $("#roll-type").html("<p>Value(s) rolled on a d" + dieType + "</p>");
            }

            if (!$("#privateRoll").is(":checked")) {

                var history = gameData.dieRolls;

                if (history.length == 10) {
                    history.shift();
                }

                history.push(dieRoll);
                gameData.dieRolls = history;

                var gameDataString = indentJson(gameData);

                $("#history").html("<img id='loading-image' src='img/spinner.gif' alt='Loading...' />");

                $.ajax({
                    type: "POST",
                    url: "php/save-game-data.php",
                    data: {gameData:gameDataString},
                    success: function(data){
                        console.log("Game data saved.");

                        var historyHtmlString = "";

                        for (var j = (history.length - 1); j >= 0; j--) {
                            if (j == (history.length - 1)) {
                                historyHtmlString += '<div class="roll-section-header">Last Roll: </div><div class="last-roll">';
                            } else {
                                if (j == (history.length - 2)) {
                                    historyHtmlString += '<div class="roll-section-header">Previous Rolls:</div>'
                                }
                                historyHtmlString += '<div class="historical-roll">';
                            }

                            historyHtmlString += '<span class="' + history[j].user + '">' + history[j].user + '</span> rolled ' + history[j].dieCount + ' d' + history[j].dieType + ': [';
                            for (var k = 0; k < history[j].values.length; k++) {
                                historyHtmlString += history[j].values[k];
                                if (k != (history[j].values.length - 1)) {
                                    historyHtmlString += ', ';
                                }
                            }
                            historyHtmlString += ']&nbsp;&nbsp; <span class="history-timestamp">(' + history[j].timestamp + ')</span></div>';
                        }

                        $("#history").html(historyHtmlString);
                    },
                    error: function(e){
                        console.log("There was a problem saving the game data.");
                        if(e.message){
                            alert('An error occurred when attempting to save the game data.  Ask the administrator to check the server logs for more information.');
                            console.log(e.message);
                        }
                    }
                });
            }
        }
    });
}

function playDiceRoll(){
    var audio = document.getElementById("audio");
    audio.play();
}


function updateWhiteBoard(){

    jQuery.ajaxSetup({
        cache: false
    });

    $.ajax({
        'async': false,
        'global': false,
        'url': "data/" + defaultGameDataFileName,
        'dataType': "json",
        'success': function (gameData) {

            var newWhiteboardURL = $("#newWhiteboardURL").val();
            if (newWhiteboardURL == ""){
                newWhiteboardURL = whiteboardBaseURL;
            }

            gameData.whiteBoardLink = newWhiteboardURL;

            var gameDataString = indentJson(gameData);

            $("#whiteBoardLinkContainer").html("<img id='loading-image' src='img/spinner.gif' alt='Loading...' />");

            $.ajax({
                type: "POST",
                url: "php/save-game-data.php",
                data: {gameData:gameDataString},
                success: function(data){
                    console.log("Game data saved.");

                    var URLHtmlString = '<a href="' + newWhiteboardURL + '" target="_blank" id="whiteBoardLink">' + newWhiteboardURL + '</a>';
                    URLHtmlString += '&nbsp;&nbsp;&nbsp';
                    URLHtmlString += '<button class="btn btn-default btn-small" id="refreshWhiteBoardURL" onclick="refreshPage()" data-toggle="tooltip" title="Refresh Latest Whiteboard Link"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</button>';

                    $("#whiteBoardLinkContainer").html(URLHtmlString);
                    $("#newWhiteboardURL").val("");

                },
                error: function(e){
                    console.log("There was a problem saving the game data.");
                    if(e.message){
                        alert('An error occurred when attempting to save the game data.  Ask the administrator to check the server logs for more information.');
                        console.log(e.message);
                    }
                }
            });
        }

    });
}

function refreshPage(){
    location.reload();
}

function markPageAsDirty(){
    pageIsDirty = true;
    $("#saveCharacter").removeClass("btn-default").addClass("btn-warning");
}

function markPageAsClean(){
    pageIsDirty = false;
    $("#saveCharacter").removeClass("btn-warning").addClass("btn-default");
}

// Run function upon script load to add click events to elements
function main() {

    (function () {
        'use strict';

        $(function() {
            $(".scroll").click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - navbarHeight
                        }, 1000);
                        return false;
                    }
                }
            });

            $("#saveCharacter").click(saveCurrentStateCharacterJSON);

            $(".hit-point-clickable").click(changeHitpoint);

            $(".attribute").on("input", recalculateAttributes);

            $(".skill").on("input", recalculateSkills);

            $(".image-filename").on("input", updateImage);

            $(".equipment-image-filename").on("input", updateEquipmentImage);

            $(".shot-calc-input").on("input", calculateShot);

            $(".shot-calc-checkbox").on("click", calculateShot);

            $("#reset-calculator").on("click", resetCalculator);

            $("#reset").click(resetRoll);

            $("#roll").click(rollDice);

        });
    }());
}

main();

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});