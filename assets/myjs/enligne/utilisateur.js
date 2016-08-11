
      var save_method; //for save method string
      var table;

      $(document).ready(function(){

        table = $("#table_utilisateur").DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": "http://9rawkhdem.com/sysdba/utilisateur/ajax_list/",
            "type": "POST"
          },
          "columnDefs": [
            { 
              "targets": [ -1 ],
              "orderable": false,
            },
          ],
        });

        $.ajax({
          url : "http://9rawkhdem.com/sysdba/utilisateur/get_niveau/",
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

        $.ajax({
          url : "http://9rawkhdem.com/sysdba/ville/get_ville/",
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

 
        $("input").change(function(){
          $(this).parent().parent().removeClass('has-error');
          $(this).next().empty();
        });

        $("select").change(function(){
          $(this).parent().parent().removeClass('has-error');
          $(this).next().empty();
        });

      });

      function reload_table()
      {
        table.ajax.reload(null,false); //reload datatable ajax 
      }

      function delete_utilisateur(id)
      {
        if(confirm('Are you sure delete this data?'))
        {
          $.ajax({
              url : "http://9rawkhdem.com/sysdba/utilisateur/ajax_delete/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });
        }
      }

      function filtrer()
      {
        var ville = $("#cb_ville").val();
        var etat = $("#cb_etat").val();
        var niveau = $("#cb_niveau").val();
        //alert(ville+" "+etat+" "+niveau+" "+type);
        //if(ville!=-1 && ville!=-1)
        table.ajax.url("http://9rawkhdem.com/sysdba/utilisateur/getUsersFiltre/"+ville+"/"+etat+"/"+niveau).load();
      }

      function display_cin(fileName)
      {
        var url = "http://9rawkhdem.com/uploads/cin/"+fileName;
        $('#imgcin').attr('src',url);
        $('#cinmodal').modal('show');
        //alert(fileName);
      }

      function display_dip(fileName)
      {
        var url = "http://9rawkhdem.com/uploads/dip/"+fileName;
        $('#imgcin').attr('src',url);
        $('#cinmodal').modal('show');
        //alert(fileName);
      }

      function validation(id)
      {
        $.ajax({
              url : "http://9rawkhdem.com/sysdba/utilisateur/validation/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });
      }

      function supvalidation(id)
      {
        $.ajax({
              url : "http://9rawkhdem.com/sysdba/utilisateur/supvalidation/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });
      }