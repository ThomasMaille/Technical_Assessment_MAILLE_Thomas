<h2 class="mb-4 text-primary text-center">Garages Client B</h2>

<div class="d-flex justify-content-center mb-3">
    <button class='btn btn-outline-secondary car-view' data-client='clientb'>
        <i class="bi bi-car-front"></i> Liste des voitures
    </button>
</div>

<div class="d-flex justify-content-center">
    <div class="list-group w-75">
        <?php
        $garages = json_decode(file_get_contents('../../../../data/garages.json'), true);
        $cars = json_decode(file_get_contents('../../../../data/cars.json'), true);

        foreach($garages as $garage){
            if($garage["customer"] === 'clientb'){
                $nbVoitureGarage = 0;
                foreach($cars as $car){
                    if($car['garageId'] === $garage['id']){
                        $nbVoitureGarage++;
                    }
                }

                $carInfo = ($nbVoitureGarage === 0) 
                    ? "Aucune voiture dans ce garage" 
                    : $nbVoitureGarage . " voiture" . ($nbVoitureGarage > 1 ? "s" : "") . " dans ce garage";

                echo "
                <button class='list-group-item list-group-item-action garage-item text-start mb-2 shadow-sm' data-id='{$garage["id"]}'>
                    <div class='fw-bold text-dark'>" . htmlspecialchars($garage["title"]) . "</div>
                    <div class='text-muted small'>" . htmlspecialchars($garage["address"]) . " | " . $carInfo . "</div>
                </button>";
            }
        }
        ?>
    </div>
</div>