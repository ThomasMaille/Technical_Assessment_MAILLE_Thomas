<h1>Voitures Client B</h1>

<?php

$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);
$garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

foreach($cars as $car){
    if($car["customer"] === 'clientb'){
        echo "<li>";
        echo "<strong>" . ctype_lower($car["modelName"]) . "</strong> - " . $car["brand"];
        echo " | Garage : " . findGarage($car["garageId"]);
        echo "</li>";
    }
}

function findGarage($id){
    global $garages;
    if($id >= sizeof($garages)){
        return "Ce garage n'est pas dans la liste";
    }

    foreach($garages as $gar){
        if($gar['id']===$id){
            if($gar["customer"]==='clientb'){
                return $gar["title"];
            }
            else{
                return "Ce garage n'est pas dans votre liste de garage";
            }
        }
    }


}