$(document).ready(function(){

    $("input").change(function(){
        $(this).removeClass('has-error');
         $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).removeClass('has-error');
        $(this).next().empty();
    });
});

function Connecter()
{
    var valid = true;
    if($("#Login").val() == '' || $("#Mdp").val() == '' ){ 
        $("#alert_error_login").addClass('alert-danger');
        $("#span_error_login").text("Veuillez Saisir un nom d'utilisateur et un mot de passe");
        $("#alert_error_login").removeClass('hidden');
        alertTimeout(5000);
        valid = false;
    }else if (!$("#Login").val().match(/^[a-z1-90]+$/i)){
        $("#alert_error_login").addClass('alert-danger');
        $("#span_error_login").text("Veuillez Saisir un nom d'utilisateur valide");
        $("#alert_error_login").removeClass('hidden');
        alertTimeout(5000);
        valid = false;
    }else{
        $("#alert_error_login").addClass('hidden');
    }

    if(valid==true){
        var dataser = $('#form_login').serialize();
        $.ajax({
            url : "http://9rawkhdem.com/sysdba/auth/connexion/",
            type: "POST",
            data: dataser,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status==="TRUE")
                {
                    $("#span_error_login").text("vous êtes connecter");
                    $("#alert_error_login").removeClass('alert-danger');
                    $("#alert_error_login").addClass('alert-success');
                    $("#alert_error_login").removeClass('hidden');
                    window.location='http://9rawkhdem.com/sysdba/accueil';
                }
                else
                {
                    $("#span_error_login").text("Nom d'utilisateur ou mot de passe invalide");
                    $("#alert_error_login").removeClass('alert-success');
                    $("#alert_error_login").addClass('alert-danger');
                    $("#alert_error_login").removeClass('hidden');
                    alertTimeout(3000);
                }
            },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error select'+' '+jqXHR+' '+textStatus+' '+errorThrown);
          }
        });
    }
}

function alertTimeout(wait){
    setTimeout(function(){
        $('#alert_error_login').addClass('hidden')
    }, wait);
    setTimeout(function(){
        $('#alert_error_registre').addClass('hidden')
    }, wait);
    setTimeout(function(){
        $('#alert_error_passforget').addClass('hidden')
    }, wait);
}