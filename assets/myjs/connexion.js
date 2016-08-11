$(document).ready(function(){

    /*$("input").change(function(){
        $(this).removeClass('has-error');
         $(this).next().empty();
    });

    $("textarea").change(function(){
        $(this).removeClass('has-error');
        $(this).next().empty();
    });*/


    $.ajax({
        url : "http://localhost/rivoproject/sysdba/ville/get_ville/",
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $.each(data, function(i, item){
                $("#cb_ville").append('<option value="'+ item.IDVille +'">'+ item.VilleName +'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $.ajax({
        url : "http://localhost/rivoproject/sysdba/utilisateur/get_niveau/",
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $.each(data, function(i, item){
                $("#cb_niveau").append('<option value="'+ item.IDNiveau +'">'+ item.NiveauName +'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
});

function membreConnecte()
{
    var valid = true;
    if($("#usernameLogin").val() == ''){ 
        $("#usernameLogin").next(".error_msg").fadeIn().text("Veuillez entrer votre pseudo");
        valid = false;
    }else if (!$("#usernameLogin").val().match(/^[a-z1-90]+$/i)){
        $("#usernameLogin").next(".error_msg").fadeIn().text("Veuillez entrer un pseudo valide");
        valid = false;
    }else{
        $("#usernameLogin").next(".error_msg").fadeOut();
    }

    if($("#mdpLogin").val() == ''){ 
        $("#mdpLogin").next(".error_msg").fadeIn().text("Veuillez entrer le mot de passe");
        valid = false;
    }else{
        $("#mdpLogin").next(".error_msg").fadeOut();
    }

    if(valid==true){
        var dataser = $('#form_login').serialize();
        $.ajax({
            url : "http://localhost/rivoproject/connexion/login/",
            type: "POST",
            data: dataser,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status==="TRUE")
                {
                    $("#span_error_login").text("vous êtes connecté(e)");
                    $("#alert_error_login").removeClass('alert-danger');
                    $("#alert_error_login").addClass('alert-success');
                    $("#alert_error_login").removeClass('hidden');
                    window.location='http://localhost/rivoproject/profilme';
                }
                else
                {
                    $("#alert_error_login").addClass('alert-danger');
                    $("#span_error_login").text("Pseudo ou mot de passe invalide");
                    $("#alert_error_login").removeClass('hidden');
                    alertTimeout(5000);
                }
            },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error select'+' '+jqXHR+' '+textStatus+' '+errorThrown);
          }
        });
    }
}

function membreRegistre()
{
    //alert( $("select.cb_ville").val() );
    var valid = true;
    if($("#nom").val() === ''){ 
        $("#nom").next(".error_msg").fadeIn().text("Veuillez entrer votre nom");
        valid = false;
    }else if (!$("#nom").val().match(/^[a-zA-Z0-9 -éàè]+$/i)){
        $("#nom").next(".error_msg").fadeIn().text("Veuillez entrer un nom valide");
        valid = false;
    }else{
        $("#nom").next(".error_msg").fadeOut();
    }

    if($("#prenom").val() === ''){ 
        $("#prenom").next(".error_msg").fadeIn().text("Veuillez entrer votre prénom");
        valid = false;
    }else if (!$("#prenom").val().match(/^[a-zA-Z0-9 -éàè]+$/i)){
        $("#prenom").next(".error_msg").fadeIn().text("Veuillez entrer un prénom valide");
        valid = false;
    }else{
        $("#prenom").next(".error_msg").fadeOut();
    }

    if($("#filiere").val() === ''){ 
        $("#filiere").next(".error_msg").fadeIn().text("Veuillez entrer votre filière");
        valid = false;
    }else if (!$("#filiere").val().match(/^[a-zA-Z0-9 -éàè]+$/i)){
        $("#filiere").next(".error_msg").fadeIn().text("Veuillez entrer une chaine valide");
        valid = false;
    }else{
        $("#filiere").next(".error_msg").fadeOut();
    }

    if($("#login").val() === ''){ 
        $("#login").next(".error_msg").fadeIn().text("Veuillez entrer un pseudo");
        valid = false;
    }else if (!$("#login").val().match(/^[a-z1-90]+$/i)){
        $("#login").next(".error_msg").fadeIn().text("Veuillez entrer un pseudo valide");
        valid = false;
    }else{
        $("#login").next(".error_msg").fadeOut();
    }

    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    if($("#email").val() === ''){ 
        $("#email").next(".error_msg").fadeIn().text("Veuillez entrer un email");
        valid = false;
    }else if ( !pattern.test($("#email").val()) ){
        $("#email").next(".error_msg").fadeIn().text("Veuillez entrer un email valide");
        valid = false;
    }else{
        $("#email").next(".error_msg").fadeOut();
    }

    if($("#mdp1").val() === ''){ 
        $("#mdp1").next(".error_msg").fadeIn().text("Veuillez entrer un mot de passe");
        valid = false;
    }else{
        $("#mdp1").next(".error_msg").fadeOut();
        if($("#mdp2").val() === ''){ 
            $("#mdp2").next(".error_msg").fadeIn().text("Veuillez confirmer le mot de passe");
            valid = false;
        }else{
            $("#mdp2").next(".error_msg").fadeOut();
            if($("#mdp2").val() !== $("#mdp1").val()){
                $("#mdp2").next(".error_msg").fadeIn().text("Veuillez saisir un mot de passe identique"); 
                valid = false;  
            }else{
                $("#mdp2").next(".error_msg").fadeOut();
            }
        }
    }

    if( $("select.cb_ville").val() == -1 ){ 
        $("select.cb_ville").next(".error_msg").fadeIn().text("Veuillez selectionner la ville");
        valid = false;
    }else{
        $("select.cb_ville").next(".error_msg").fadeOut();
    }

    if( $("select.cb_niveau").val() == -1 ){ 
        $("select.cb_niveau").next(".error_msg").fadeIn().text("Veuillez selectionner le niveau");
        valid = false;
    }else{
        $("select.cb_niveau").next(".error_msg").fadeOut();
    }


    if(valid==true)
    {
        /*alert("valide");*/
        var dataser = $('#form_registre').serialize();
        $.ajax({
            url : "http://localhost/rivoproject/connexion/registre/",
            type: "POST",
            data: dataser,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status){
                    $('#form_registre')[0].reset();
                    $('.form-group').removeClass('has-error');
                    $('.help-block').empty();
                    $("#span_error_registre").text("Vous avez inscrit avec success!");
                    $("#alert_error_registre").removeClass('alert-danger');
                    $("#alert_error_registre").addClass('alert-success');
                    $("#alert_error_registre").removeClass('hidden');
                    window.location='http://localhost/rivoproject/profilme';
                    //alertTimeout(3000);
                }
                else
                {
                    if(data.msg=="user"){
                        $("#span_error_registre").text("Nom d'utilisateur déjà existe");
                        $("#alert_error_registre").removeClass('alert-success');
                        $("#alert_error_registre").addClass('alert-danger');
                        $("#alert_error_registre").removeClass('hidden');
                        alertTimeout(5000);
                    }else if(data.msg=="email"){
                        $("#span_error_registre").text("Email déjà existant");
                        $("#alert_error_registre").removeClass('alert-success');
                        $("#alert_error_registre").addClass('alert-danger');
                        $("#alert_error_registre").removeClass('hidden');
                        alertTimeout(5000);
                    }     
                }           
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
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