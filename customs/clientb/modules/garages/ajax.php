<h1>Garages Client B</h1>

<button class='btn btn-outline-secondary car-view' data-client='clientb'> Liste des voitures </button>

<?php

$garages = json_decode(file_get_contents('../../../../data/garages.json'), true);
$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);


foreach($garages as $garage){
    $nbVoitureGarage=0;
    if($garage["customer"] === 'clientb'){
        foreach($cars as $car){
            if($car['garageId']===$garage['id'])
                $nbVoitureGarage ++;
        }
        echo "<li class='garage-item' data-id='{$garage["id"]}'>";
        echo "<strong>" . $garage["title"] . "</strong> ";
        if($nbVoitureGarage === 0){ 
            echo " | Vous n'avez pas de voiture dans ce garage. ";
        }
        else {
            echo " | Vous avez " . $nbVoitureGarage . " voitures dans ce garage. ";
        }
        echo "</li>";
    }
}