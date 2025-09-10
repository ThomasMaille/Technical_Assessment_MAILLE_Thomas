<?php
require_once('../../../../functions.php');
?>

<h1>Voitures Client C</h1>

<?php 

$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);
$garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

foreach($cars as $car){
    if($car["customer"] === 'clientc'){
        echo "<li class='car-item' data-id='{$car["id"]}'>";
        echo "<strong>" . $car["modelName"] . "</strong> - " . $car["brand"];
        echo "  <span style='display:inline-block; width:25px; height:13px; background-color:{$car["colorHex"]}; border:1px solid #000;'></span>";
        echo "  Garage : " . findGarage($car["garageId"], 'clientc');
        echo "</li>";
    }
}

?>