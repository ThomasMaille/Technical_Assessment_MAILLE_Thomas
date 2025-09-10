<?php
require_once('../../../../functions.php');
?>
<h1>Voitures Client B</h1>

<?php

$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);
$garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

foreach($cars as $car){
    if($car["customer"] === 'clientb'){
        echo "<li>";
        echo "<strong>" . strtolower($car["modelName"]) . "</strong> - " . $car["brand"];
        echo " | Garage : " . findGarage($car["garageId"], 'clientb');
        echo "</li>";
    }
}

