<?php
$garageId = $_POST['id'];

$garages = json_decode(file_get_contents('data/garages.json'), true);
$cars = json_decode(file_get_contents('data/cars.json'), true);

$garageToLoad = null;
$nbVoitureGarage = 0;

foreach($garages as $garage){
    if($garage['id']==$garageId){
        $garageToLoad = $garage;
    }
}

echo "<li>";
echo "<strong> Nom du garage : </strong>" . $garageToLoad["title"] ;
echo "</li> <li>";
echo "<strong> Adresse : </strong>" . $garageToLoad["address"];
echo "</li>";
echo "<br>";
echo "<p>";
echo "<strong> Voitures dans ce garages :  </strong>";
echo "</p>";
foreach($cars as $car){
    if($car['garageId']==$garageToLoad['id']){
        echo "<li class='car-item' data-id='{$car["id"]}'>";
        echo "<strong>" . strtolower($car["modelName"]) . "</strong> - " . $car["brand"];
        echo "</li>";
        $nbVoitureGarage ++;
    }
}
if($nbVoitureGarage === 0){
    echo "Vous n'avez aucune voiture dans ce garage pour l'instant.";
}
echo "<br>";
echo "<br>";
echo "<button type='button' class='btn btn-outline-dark btn-sm me-2 garage-view' data-client='{$garageToLoad['customer']}'>
        <i class='bi bi-arrow-left'></i> Liste des garages </button>";
echo "<button type='button' class='btn btn-outline-dark btn-sm ms-2 car-view' data-client='{$garageToLoad['customer']}'>
        <i class='bi bi-arrow-left'></i> Liste des voitures </button>";