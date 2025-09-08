<?php

require_once('functions.php');

# INITIALISATION DU COOKIE DU CLIENT

$clients = GetClients();

if(isset($_POST['client']) && $_POST['client']!==""){
    $client = $_POST['client'];
    if(in_array($client, $clients)){
        setcookie('client', $client, time()+3600, "/");
    }
}

?>