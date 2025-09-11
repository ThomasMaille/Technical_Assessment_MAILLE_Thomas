<?php


# Fonction qui récuppère la liste des clients en fonction des dossiers présents dans customs
function GetClients(){

    $clients = array();
    $directory = __DIR__.'/customs'; //chemin absolu du dossier customs
    
    foreach(scandir($directory) as $dir){
        if($dir === '.' || $dir === '..'){ //enlever les fichier qui ne sont pas des noms de clients
            continue;
        }
        if(is_dir($directory . '/' . $dir)){
            $clients[] = $dir;
        }
    }

    return $clients;
}

# Fonction qui renvoie le nom du garage correspondant à l'id envoyé
function findGarage($id, $client){
    global $garages;
    if($id > sizeof($garages)){
        return "Ce garage n'est pas dans la liste";
    }

    foreach($garages as $gar){
        if($gar['id']===$id){
            if($gar["customer"]===$client){
                return $gar["title"];
            }
            else{
                return "Ce garage n'est pas dans votre liste de garage";
            }
        }
    }
}
