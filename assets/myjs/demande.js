
      var save_method; //for save method string
      var table;

      $(document).ready(function(){

        table = $("#table_demande").DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": "http://localhost/rivoproject/sysdba/demande/ajax_list/",
            "type": "POST"
          },
          "columnDefs": [
            { 
              "targets": [ -1 ],
              "orderable": false,
            },
          ],
        });

$("select#cb_etat").change(function(){
    var etat = $(this).val();
    //alert(etat);
    if(etat != -1)
      table.ajax.url("http://localhost/rivoproject/sysdba/demande/getDmdFiltre/"+etat).load();        
  });

        
       });

function reload_table()
{
  table.ajax.reload(null,false); //reload datatable ajax 
}

function delete_demande(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    $.ajax({
        url : "http://localhost/rivoproject/sysdba/demande/delete_dmd/"+id,
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



       