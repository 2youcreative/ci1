
var iduser;

$(document).ready(function(){

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


function save_comment(id)
{      
  var id_user = parseInt(id);
  $('#btn_save_comment').text('Sauvegarder...');
  $('#btn_save_comment').attr('disabled',true);
  var url = "http://9rawkhdem.com/comment/add_comment/"+id_user;
  var dataser = $('#form_comment').serialize();
  $.ajax({
    url : url,
    type: "POST",
    data: dataser,
    dataType: "JSON",
    success: function(data)
    {
      if(data.status)
      {
        $('#form_comment')[0].reset();
        window.location='http://9rawkhdem.com/profil/info/'+id_user;
      }
      else
      {
        if(data.type=="vide"){
          $("#span_error").text("Veuillez remplire tous les champs!");
          $("#alert_error").removeClass('hidden');
        }else if(data.type=="mail"){
          $("#span_error").text("Veuillez entrer un email valide!");
          $("#alert_error").removeClass('hidden');
        }
      }
      $('#btn_save_comment').text('Enregistrer');
      $('#btn_save_comment').attr('disabled',false);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
      $('#btn_save_comment').text('Envoyer');
      $('#btn_save_comment').attr('disabled',false);
    }
  });
  /*  alert(id);*/
}

function refresh_comment()
{
  $('#modal_comment').modal('hide');
  window.location='http://9rawkhdem.com/profilme';
}

function alertTimeout(wait){
    setTimeout(function(){
        $('#alert_success_comment').addClass('hidden')
    }, wait);
}

      