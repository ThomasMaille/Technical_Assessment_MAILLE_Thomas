<h2 class="mb-4 text-primary text-center">Voitures Client A</h2>

<div class="d-flex justify-content-center">
    <div class="list-group w-75">
        <?php  
        $cars = json_decode(file_get_contents('../../../../data/cars.json'), true);

        foreach($cars as $car){
            if($car["customer"] === 'clienta'){
                
                $carAge = (int)date("Y") - (int)date("Y", $car["year"]);

                if ($carAge > 10) {
                    $couleur = "text-danger";   // rouge
                } elseif ($carAge < 2) {
                    $couleur = "text-success"; // vert
                } else {
                    $couleur = "text-dark";    // noir
                }

                echo "
                <button class='list-group-item list-group-item-action car-item text-start mb-2 shadow-sm' data-id='{$car["id"]}'>
                    <div class='fw-bold {$couleur}'>" . htmlspecialchars($car["modelName"]) . "</div>
                    <div class='text-muted small'>
                        " . htmlspecialchars($car["brand"]) . " | Année : " . date("Y", $car["year"]) . " | " . $car["power"] . " ch
                    </div>
                </button>";
            }
        }
        ?>
    </div>
</div>