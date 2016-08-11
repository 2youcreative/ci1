

$(document).ready(function(){

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

});

function rech()
{
  var ville = $("#cb_ville").val();
  var rech = $("input[name=\"RechTxt\"]").val();

  if(rech!=='')
  {
    if(ville!=-1 && ville!=null && ville!=undefined)
    {
      window.location='http://localhost/rivoproject/recherche/rech/'+ville+'/'+rech;
    }
    else
    {
      window.location='http://localhost/rivoproject/recherche/rechcomp/'+rech;
    }
  }

  if(ville!=-1 && ville!=null && ville!=undefined)
  {
    if(rech!=='')
    {
      window.location='http://localhost/rivoproject/recherche/rech/'+ville+'/'+rech;
    }
    else
    {
      window.location='http://localhost/rivoproject/recherche/rechville/'+ville;
    }
  }

  if(rech==='' && ville==-1)
    window.location='http://localhost/rivoproject/recherche/';

}

  


