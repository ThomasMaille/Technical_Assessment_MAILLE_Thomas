<?php
$garageId = $_POST['id'];

$garages = json_decode(file_get_contents('data/garages.json'), true);

$garageToLoad = null;

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
echo "<button type='button' class='btn btn-outline-dark btn-sm garage-view' data-client='{$garageToLoad['customer']}'>
        <i class='bi bi-arrow-left'></i> Liste des garages </button>";