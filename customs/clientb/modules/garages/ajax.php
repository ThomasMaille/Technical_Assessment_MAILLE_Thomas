<h1>Garages Client B</h1>

<button class='btn btn-outline-secondary car-view' data-client='clientb'> Liste des voitures </button>
<?php

$garages = json_decode(file_get_contents('../../../../data/garages.json'), true);

foreach($garages as $garage){
    if($garage["customer"] === 'clientb'){
        echo "<li class='garage-item' data-id='{$garage["id"]}'>";
        echo "<strong>" . $garage["title"] . "</strong> ";
        echo "</li>";
    }
}