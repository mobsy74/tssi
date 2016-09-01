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

function indentJson(json){
    return JSON.stringify(json, null, 2);
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
            "Player": "Tom Schroeder",
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
    var characterDataString = indentJson(characterData);
    //console.log(characterDataString);

    $.ajax({
        type: "POST",
        url: "php/save-character.php",
        data: {characterData:characterDataString},
        success: function(data){
            console.log("Character saved.");
            $("#jsonDisplay").html("<pre>" + characterDataString + "</pre>");
                alert('Character was successfully saved.');
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
        json['advantages']['advantage' + i] = $('#advantage' + i).val();
    }

    for (i=1; i <= numDisadvantages; i++){
        json['disadvantages']['disadvantage' + i] = $('#disadvantage' + i).val();
    }

    for (i=1; i <= numDocuments; i++){
        json['documents']['document' + i] = $('#document' + i).val();
    }

    for (i=1; i <= numCombatTechniques; i++){
        json['combatTechniques']['combatTechnique' + i] = $('#combatTechnique' + i).val();
    }

    for (i=1; i <= numImages; i++){
        json['images']['image' + i] = $('#imageFile' + i).val();
    }

    for (i=1; i <= numSkills; i++){
        tempObject = {};
        tempObject['skillName'] = $('#skillName' + i).val();
        tempObject['skillLevel'] = $('#skillLevel' + i).val();
        tempObject['skillFull'] = $('#skillFull' + i).val();
        json['skills']['skill' + i] = tempObject;
    }

    for (i=1; i <= numWeapons; i++){
        tempObject = {};
        tempObject['weaponName'] = $('#weaponName' + i).val();
        tempObject['shortRange'] = $('#weaponShort' + i).val();
        tempObject['medRange'] = $('#weaponMed' + i).val();
        tempObject['longRange'] = $('#weaponLong' + i).val();
        tempObject['damage'] = $('#weaponDamage' + i).val();
        tempObject['reload'] = $('#weaponReload' + i).val();
        tempObject['notes'] = $('#weaponNotes' + i).val();
        json['weapons']['weapon' + i] = tempObject;
    }

    for (i=1; i <= numEquipmentSlots; i++){
        tempObject = {};
        tempObject['equipmentName'] = $('#equipmentName' + i).val();
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

    var imageHTML = '<a href="' + uploadDir + '/' + fileName + '" class="highslide" onclick="return hs.expand(this, {captionId: \'imageCaption' + imageNum + '\'})">';
    imageHTML += '       <img class="image" src="' + uploadDir + '/' + fileName + '" title="Click to enlarge"/>';
    imageHTML += '   </a>';
    imageHTML += '   <div class="highslide-caption" id="imageCaption' + imageNum + '">';
    imageHTML += '       ' + fileName;
    imageHTML += '   </div>';

    $("#" + imageContainerID).html(imageHTML);
}

function updateEquipmentImage(){
    var div = $(this);
    var divID = div.prop("id");
    var fileName = div.val();
    var imageNum = divID.replace("equipmentImage", "");
    var imageContainerID = "equipmentImageContainer" + imageNum;

    var imageHTML = '<a href="' + uploadDir + '/' + fileName + '" class="highslide" onclick="return hs.expand(this, {captionId: \'imageCaption' + imageNum + '\'})">';
    imageHTML += '       <img class="image" src="img/photo1-sm.jpg" title="Click to enlarge"/>';
    imageHTML += '   </a>';
    imageHTML += '   <div class="highslide-caption" id="imageCaption' + imageNum + '">';
    imageHTML += '       ' + fileName;
    imageHTML += '   </div>';

    $("#" + imageContainerID).html(imageHTML);
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

        });
    }());
}

main();