var save_method;
var iduser;
var inputFile = $('input[name=file]');
var uploadURI = $('#form-upload1').attr('action');

$(document).ready(function(){

  $.ajax({
    url : "http://localhost/rivoproject/sysdba/ville/get_ville/",
    type: "POST",
    dataType: "JSON",
    success: function(data)
    {
      $.each(data, function(i, item){
        $("#cb_ville").append('<option value="'+ item.IDVille +'">'+ item.VilleName  +'</option>');
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
        $("#cb_niveau").append('<option value="'+ item.IDNiveau +'">'+ item.NiveauName  +'</option>');
     });
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });


  $("input").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });

  $("textarea").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });
  
  $("select").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });


});


function edit_compte()
{
  //alert("");
  $('#btnEditCompte').text('Sauvegarder...');
  $('#btnEditCompte').attr('disabled',true);
  var url;
  url = "http://localhost/rivoproject/profilme/edit_compte/";
  var dataser = $('#form_compte').serialize();
  $.ajax({
    url : url,
    type: "POST",
    data: dataser,
    dataType: "JSON",
    success: function(data)
    {
      if(data.status)
      {
        $("#span_error_login").text("votre profil a été modifier!");
        $("#alert_error_login").removeClass('alert-danger');
        $("#alert_error_login").addClass('alert-success');
        $("#alert_error_login").removeClass('hidden');
        window.location='http://localhost/rivoproject/profilme';
      }
      else
      {
        for (var i = 0; i < data.inputerror.length; i++) 
        {
          $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
          $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
        }
      }
      $('#btnEditCompte').text('Enregistrer'); //change button text
      $('#btnEditCompte').attr('disabled',false); //set button enable 
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
      $('#btnEditCompte').text('Enregistrer'); //change button text
      $('#btnEditCompte').attr('disabled',false); //set button enable 
    }
  });
}

function edit_desc()
{
  $("textarea.en_bref_txt").prop('readonly', false);
  $('#btn_save_desc').removeClass('hidden');
  $('#annuler_desc').removeClass('hidden');
}

function annuler_desc()
{
  $("textarea.en_bref_txt").prop('readonly', true);
  $('#btn_save_desc').addClass('hidden');
  $('#annuler_desc').addClass('hidden');
}

function save_desc()
{
  if($("textarea.en_bref_txt").val()!=" "){
    $('#btn_save_desc').text('Sauvegarder...');
    $('#btn_save_desc').attr('disabled',true);
    var url;
    url = "http://localhost/rivoproject/profilme/save_desc/";
    var dataser = $('#form_desc').serialize();
    $.ajax({
      url : url,
      type: "POST",
      data: dataser,
      dataType: "JSON",
      success: function(data)
      {
        if(data.status)
        {
          window.location='http://localhost/rivoproject/profilme';
        }
        else
        {
          for (var i = 0; i < data.inputerror.length; i++) 
          {
            //$('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
            $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
          }
        }
        $('#btn_save_desc').text('Enregistrer'); //change button text
        $('#btn_save_desc').attr('disabled',false); //set button enable 
        $("textarea.en_bref_txt").prop('readonly', false);
        $('button#editDesc').removeClass('hidden');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error adding / update data');
        $('#btn_save_desc').text('Modifier'); //change button text
        $('#btn_save_desc').attr('disabled',false); //set button enable 
        $('button#editDesc').removeClass('hidden');
      }
    });
  }
}

function edit_activity()
{
    $('#btnEditActivity').text('Sauvegarder...');
    $('#btnEditActivity').attr('disabled',true);
    $.ajax({
      url : "http://localhost/rivoproject/profilme/edit_activity/",
      type: "POST",
      data: dataser,
      dataType: "JSON",
      success: function(data)
      {
        if(data.status)
        {
          window.location='http://localhost/rivoproject/profilme';
        }
        else
        {
          for (var i = 0; i < data.inputerror.length; i++) 
          {
            $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
            $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
          }
        }
        $('#btnEditActivity').text('Enregistrer'); //change button text
        $('#btnEditActivity').attr('disabled',false); //set button enable 
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error adding / update data');
        $('#btnEditActivity').text('Enregistrer'); //change button text
        $('#btnEditActivity').attr('disabled',false); //set button enable 
      }
    });
}

function display_file(fileName)
{
  var url = "http://localhost/rivoproject/uploads/"+fileName;
  $('#imagepreviewpic').attr('src',url);
  $('#imagepic').modal('show');
}





