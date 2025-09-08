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

