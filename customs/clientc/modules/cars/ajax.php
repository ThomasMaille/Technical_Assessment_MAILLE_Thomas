<?php
require_once('../../../../functions.php');
?>

<h2 class="mb-4 text-primary text-center">Voitures Client C</h2>

<div class="d-flex justify-content-center">
    <div class="list-group w-75">
        <?php 
        $cars = json_decode(file_get_contents('../../../../data/cars.json'), true);
        $garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

        foreach($cars as $car){
            if($car["customer"] === 'clientc'){
                echo "
                <button class='list-group-item list-group-item-action car-item text-start mb-2 shadow-sm' data-id='{$car["id"]}'>
                    <div class='fw-bold text-dark'>
                        " . htmlspecialchars($car["modelName"]) . " - " . htmlspecialchars($car["brand"]) . "
                        <span class='badge ms-2' style='background-color:{$car["colorHex"]}; border:1px solid #000;'>&nbsp;&nbsp;</span>
                    </div>
                    <div class='text-muted small'>
                        Garage : " . findGarage($car["garageId"], 'clientc') . "
                    </div>
                </button>";
            }
        }
        ?>
    </div>
</div>