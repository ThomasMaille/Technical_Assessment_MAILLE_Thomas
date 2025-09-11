$(document).ready(function(){

    // Charger les voitures du client
    function loadClientData(client){
        if(client){
            $.post("setClient.php", {client: client}, function(){
                $("#resultat").load("customs/" + client + "/modules/cars/ajax.php");
            });
        }
    }

    // Charger les garages du client
    function loadClientGarages(client){
        if(client){
            $.post("setClient.php", {client: client}, function(){
                $("#resultat").load("customs/" + client + "/modules/garages/ajax.php");
            });
        }
    }

    // Afficher les données si un cookie client est déjà présent
    if(cookieClient !== ""){
        $("#client").val(cookieClient);
        loadClientData(cookieClient);
    }

    // Afficher les données du nouveau client lors de sa sélection
    $("#client").on('change', function(){
        var client = $(this).val();
        if(client){
            loadClientData(client);
        }
    });

    // Appeler la fonction qui affiche les voitures du client lorsque l'utilisateur clique sur le bouton de retour aux voitures
    $(document).on('click', '.car-view',function(){
        var client = $(this).data('client');
        loadClientData(client);
    });
    
    // Appeler la fonction qui affiche les garages du client lorsque l'utilisateur clique sur le bouton de retour aux garages
    $(document).on('click', '.garage-view',function(){
        var client = $(this).data('client');
        loadClientGarages(client);
    });
    
    // Afficher la vue détaillée d'une voiture lorsque l'utilisateur clique dessus
    $(document).on('click', '.car-item',function(){
        var carId = $(this).data('id');
        $("#resultat").load("edit.php", {carId : carId});
    });

     // Afficher la vue détaillée d'un garage lorsque l'utilisateur clique dessus
    $(document).on('click','.garage-item',function(){
        var garageId= $(this).data('id');
        $("#resultat").load("editGarages.php", {id : garageId});
    });

});