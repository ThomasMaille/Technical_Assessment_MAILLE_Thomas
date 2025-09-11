<?php
require_once('../../../../functions.php');
?>
<h1>Voitures Client B</h1>

<button class='btn btn-outline-secondary garage-view' data-client='clientb'> Liste des garages </button>
<?php

$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);
$garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

foreach($cars as $car){
    if($car["customer"] === 'clientb'){
        echo "<li class='car-item' data-id='{$car["id"]}'>";
        echo "<strong>" . strtolower($car["modelName"]) . "</strong> - " . $car["brand"];
        echo " | Garage : " . findGarage($car["garageId"], 'clientb');
        echo "</li>";
    }
}

