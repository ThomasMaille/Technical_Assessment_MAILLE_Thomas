<h1>Voitures Client A</h1>

<?php  

$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);

foreach($cars as $car){
    if($car["customer"] === 'clienta'){
        echo "<li class='car-item' data-id='{$car["id"]}'>";
        echo "<strong>" . $car["modelName"] . "</strong> - " . $car["brand"];
        echo " | Année : " . date("Y", $car["year"]);
        echo " | Puissance : " . $car["power"] . " ch";
        echo "</li>";
    }
}
?>