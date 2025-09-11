<?php
$garageId = $_POST['id'];

$garages = json_decode(file_get_contents('data/garages.json'), true);
$cars = json_decode(file_get_contents('data/cars.json'), true);

$garageToLoad = null;
$nbVoitureGarage = 0;

foreach($garages as $garage){ //trouver l'id du garage que l'on veut afficher
    if($garage['id'] == $garageId){
        $garageToLoad = $garage;
    }
}
?>

<div class="card shadow-sm p-4 mb-4">
    <h3 class="text-success mb-3">
        <?= htmlspecialchars($garageToLoad["title"]) ?>
    </h3>

    <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">
            <strong>Nom du garage :</strong> <?= htmlspecialchars($garageToLoad["title"]) ?>
        </li>
        <li class="list-group-item">
            <strong>Adresse :</strong> <?= htmlspecialchars($garageToLoad["address"]) ?>
        </li>
    </ul>

    <h5 class="mt-3">Voitures dans ce garage :</h5> 
    <ul class="list-group list-group-flush mb-3">
        <?php // Afficher les voitures qui sont associées à ce garage avec la possibilité de cliquer dessus pour afficher les détails
        foreach($cars as $car){
            if($car['garageId'] == $garageToLoad['id']){
                echo "<li class='list-group-item car-item d-flex justify-content-center align-items-center gap-3' data-id='{$car["id"]}'>";
                echo "<span><strong>" . strtolower(htmlspecialchars($car["modelName"])) . "</strong> - " . htmlspecialchars($car["brand"]) . "</span>";
                echo "<span class='badge' style='background-color:{$car["colorHex"]}; width:25px; height:15px; border:1px solid #000; border-radius:3px;'>&nbsp;</span>";
                echo "</li>";
                $nbVoitureGarage++;
            }
        }
        if($nbVoitureGarage === 0){
            echo "<li class='list-group-item text-muted'>Aucune voiture n’est enregistrée dans ce garage.</li>";
        }
        ?>
    </ul>

    <div class="d-flex justify-content-start gap-2 mt-2">
        <button type="button" class="btn btn-outline-primary btn-sm garage-view" data-client="<?= $garageToLoad['customer'] ?>">
            <i class="bi bi-arrow-left"></i> Liste des garages
        </button>
        <button type="button" class="btn btn-outline-primary btn-sm car-view" data-client="<?= $garageToLoad['customer'] ?>"> Liste des voitures </button>
    </div>
</div>