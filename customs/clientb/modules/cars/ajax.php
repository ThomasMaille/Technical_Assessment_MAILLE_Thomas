<?php
require_once('../../../../functions.php');
?>

<h2 class="mb-4 text-primary text-center">Voitures Client B</h2>

<div class="d-flex justify-content-center mb-3">
    <button class='btn btn-outline-secondary garage-view' data-client='clientb'>
        <i class="bi bi-building"></i> Liste des garages
    </button>
</div>

<div class="d-flex justify-content-center">
    <div class="list-group w-75">
        <?php
        $cars = json_decode(file_get_contents('../../../../data/cars.json'), true);
        $garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

        foreach($cars as $car){
            if($car["customer"] === 'clientb'){
                $garageName = findGarage($car["garageId"], 'clientb');

                echo "
                <button class='list-group-item list-group-item-action car-item text-start mb-2 shadow-sm' data-id='{$car["id"]}'>
                    <div class='fw-bold text-dark'>" . strtolower(htmlspecialchars($car["modelName"])) . "</div>
                    <div class='text-muted small'>
                        " . htmlspecialchars($car["brand"]) . " | Garage : " . htmlspecialchars($garageName) . "
                    </div>
                </button>";
            }
        }
        ?>
    </div>
</div>