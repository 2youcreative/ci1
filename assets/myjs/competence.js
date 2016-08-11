var save_method;
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

  $('#modal_competence').on('hidden.bs.modal', function () {
    //alert("modal hidden");
    //$('#modal_competence').modal('hide');
    window.location='http://localhost/rivoproject/profilme';
  })

});

function add_competence()
{
    save_method = 'add';
    $('#form_competence')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $("#alert_success_comp").addClass('hidden');
    $('#modal_competence').modal('show');
    $('.modal-title').text('Ajouter compétence');
}

function edit_comp(id)
{
  $('#form_competence')[0].reset();
  $('.form-group').removeClass('has-error');
  $('.help-block').empty();
  save_method = 'update';
  $.ajax({
      url : "http://localhost/rivoproject/competence/comp_edit/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="id"]').val(data.IDComp);
        $('[name="inputs[CompName]"]').val(data.CompName);
        $('[name="inputs[CompTxt]"]').val(data.CompTxt);
        $('#modal_competence').modal('show');
        $('.modal-title').text('Modifier la compétence');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
  });
}

function save_competence()
{      
  var id_user = parseInt( $("input#idUser").val() );
  $('#btn_save_comp').text('Sauvegarder...');
  $('#btn_save_comp').attr('disabled',true);
  var url;
  if(save_method == 'add')
  {
    url = "http://localhost/rivoproject/competence/comp_add/"+id_user;
  } 
  else if(save_method == 'update')
  {
    url = "http://localhost/rivoproject/competence/comp_update";
  }
  var dataser = $('#form_competence').serialize();
  $.ajax({
    url : url,
    type: "POST",
    data: dataser,
    dataType: "JSON",
    success: function(data)
    {
      if(data.status)
      {
        $("#span_success_comp").text("Cette compétence a été ajouter, vous pouvez d'autre");
        $("#alert_success_comp").removeClass('alert-danger');
        $("#alert_success_comp").removeClass('hidden');
        alertTimeout(1000);
        $('#form_competence')[0].reset();
      }
      else
      {
        for (var i = 0; i < data.inputerror.length; i++) 
        {
          $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
          $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
        }
      }
      $('#btn_save_comp').text('Enregistrer');
      $('#btn_save_comp').attr('disabled',false);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
      $('#btn_save_comp').text('Enregistrer');
      $('#btn_save_comp').attr('disabled',false);
    }
  });
}

function refresh_comp()
{
  $('#modal_competence').modal('hide');
  window.location='http://localhost/rivoproject/profilme';
}

function delete_comp(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    $.ajax({
        url : "http://localhost/rivoproject/competence/comp_delete/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          window.location='http://localhost/rivoproject/profilme';
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error deleting data');
        }
    });
  }
}

function alertTimeout(wait){
    setTimeout(function(){
        $('#alert_success_comp').addClass('hidden')
    }, wait);
}

      