<h1>Voitures Client A</h1>

<?php  

$cars = json_decode(file_get_contents('../../../../data/cars.json'), true);

foreach($cars as $car){
    if($car["customer"] === 'clienta'){
        
        $carAge = (int)date("Y") - (int)date("Y", $car["year"]);

        if ($carAge > 10) {
            $couleur = "red";
        } elseif ($carAge < 2) {
            $couleur = "green";
        } else {
            $couleur = "black";
        }

        echo "<li style='color: {$couleur}' class='car-item' data-id='{$car["id"]}'>";
        echo "<strong>" . $car["modelName"] . "</strong> - " . $car["brand"];
        echo " | Année : " . date("Y", $car["year"]);
        echo " | Puissance : " . $car["power"] . " ch";
        echo "</li>";
    }
}
?>