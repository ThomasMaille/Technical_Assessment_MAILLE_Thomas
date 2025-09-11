<?php
require_once('functions.php');

$carId = $_POST['carId'];
$cars = json_decode(file_get_contents('data/cars.json'), true);
$carToLoad = null;

$garages = json_decode(file_get_contents('data/garages.json'), true);

foreach($cars as $car){ //trouver l'id de la voiture que l'on veut afficher
    if($car['id'] == $carId){
        $carToLoad = $car;
    }
}
?>

<div class="card shadow-sm p-4 mb-4">
    <h3 class="text-success mb-3"><?= htmlspecialchars($carToLoad["modelName"]) ?> (<?= htmlspecialchars($carToLoad["brand"]) ?>)</h3>
    
    <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">
            <strong>Nom du modèle :</strong> <?= htmlspecialchars($carToLoad["modelName"]) ?>
        </li>
        <li class="list-group-item">
            <strong>Marque :</strong> <?= htmlspecialchars($carToLoad["brand"]) ?>
        </li>
        <li class="list-group-item">
            <strong>Couleur :</strong> 
            <span style="display:inline-block; width:25px; height:15px; background-color:<?= $carToLoad["colorHex"] ?>; border:1px solid #000; border-radius:3px;"></span>
        </li>
        <li class="list-group-item">
            <strong>Année :</strong> <?= date("Y", $carToLoad["year"]) ?>
        </li>
        <li class="list-group-item">
            <strong>Puissance :</strong> <?= $carToLoad["power"] ?> ch
        </li>
        <li class="list-group-item">
            <strong>Garage :</strong> <?= htmlspecialchars(findGarage($carToLoad["garageId"], $carToLoad["customer"])) ?>
        </li>
        <li class="list-group-item">
            <strong>Propriétaire :</strong> <?= htmlspecialchars($carToLoad["customer"]) ?>
        </li>
    </ul>

    <div class="d-flex justify-content-start gap-2">
        <button type="button" class="btn btn-outline-primary btn-sm car-view" data-client="<?= $carToLoad['customer'] ?>">
            <i class="bi bi-arrow-left"></i> Liste des voitures
        </button>
        <?php if($carToLoad["customer"] === 'clientb'){ ?>
            <button type="button" class="btn btn-outline-primary btn-sm garage-view" data-client="<?= $carToLoad['customer'] ?>"> Liste des garages </button>
        <?php } ?>
    </div>
</div>