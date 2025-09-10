<?php
require_once('functions.php');

$carId = $_POST['carId'];
$cars = json_decode(file_get_contents('data/cars.json'), true);
$carToLoad = null;

$garages = json_decode(file_get_contents('data/garages.json'), true);

foreach($cars as $car){
    if($car['id']==$carId){
        $carToLoad = $car;
    }
}

echo "<li>";
echo "<strong> Nom du model : </strong>" . $carToLoad["modelName"] ;
echo "</li> <li>";
echo "<strong> Marque : </strong>" . $carToLoad["brand"];
echo "</li> <li>";
echo "<strong> Couleur : </strong>" . " <span style='display:inline-block; width:25px; height:13px; background-color:{$carToLoad["colorHex"]}; border:1px solid #000;'></span>";
echo "</li> <li>";
echo "<strong> Année : </strong>" . date("Y", $carToLoad["year"]);
echo "</li> <li>";
echo "<strong> Puissance : </strong>" . $carToLoad["power"];
echo "</li> <li>";
echo "<strong> Garage : </strong>" . findGarage($carToLoad["garageId"], $carToLoad["customer"]);
echo "</li> <li>";
echo "<strong> Propriétaire : </strong>" . $carToLoad["customer"];
echo "</li>";
