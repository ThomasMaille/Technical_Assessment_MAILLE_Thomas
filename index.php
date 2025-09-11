<?php
require_once('functions.php');
$clients = GetClients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Tool4cars</title>
</head>
<body class="bg-light">

    <div class="container py-3">

        <!-- Menu déroulant permettant de sélectionner le client voulu -->
        <div class="d-flex justify-content-end mb-4">
            <form id="clientForm" class="d-flex align-items-center">
                <select class="form-select form-select-sm" name="client" id="client" style="width: 180px;">
                    <option value="">-- Choisir un client --</option>
                    <?php foreach($clients as $cl){ ?>
                        <option value="<?= $cl ?>"><?= ucfirst($cl) ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>

        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold text-primary">Tool4cars</h1>
            <p class="text-muted">Gestion des informations clients</p>
        </div>
        
        <!-- Zone d'affichage des données client -->
        <div class="card shadow-sm mb-4">
            <div class="dynamic-div card-body text-center" data-module="cars" data-script="ajax" id="resultat">
                <?php if(!isset($_COOKIE['client']) || $_COOKIE['client'] === null) { ?>
                    <h5 class="card-title">Aucun client sélectionné</h5>
                    <p class="card-text">Veuillez choisir un client dans la liste en haut à droite.</p>
                <?php } ?>
            </div>
        </div>
        
    </div>

    <!-- On encode la variable PHP $clients en JSON pour l'utiliser dans le fichier js -->
    <!-- idem pour le cookie client -->
    <script> 
        var clients = <?= json_encode($clients) ?>;

        <?php if(isset($_COOKIE['client']) && $_COOKIE['client'] !== null) { ?>
            var cookieClient = <?= json_encode($_COOKIE['client']) ?>;
        <?php } 
        else { ?>
            var cookieClient = ""; 
        <?php } ?>
    </script>  
    <script src="jQuery/app.js"></script>

</body>
</html>