$(document).ready(function(){

    // fonction qui charge les données du client contenu dans le ajax.php correspondant
    function loadClientData(client){
        if(client){
            $.post("setClient.php", {client: client}, function(){
                $("#resultat").load("customs/" + client + "/modules/cars/ajax.php");
            });
        }
    }

    // permet d'afficher les données si un cookie client est déjà présent
    if(cookieClient !== ""){
        $("#client").val(cookieClient);
        loadClientData(cookieClient);
    }

    // affiche les données du nouveau client lors de sa sélection
    $("#client").on('change', function(){
        var client = $(this).val();
        if(client){
            loadClientData(client);
        }
    });
});