
      var save_method; //for save method string
      var table;

      $(document).ready(function(){

        table = $("#table_niveau").DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": "http://localhost/rivoproject/sysdba/niveau/ajax_list",
            "type": "POST"
          },
          "columnDefs": [
            { 
              "targets": [ -1 ],
              "orderable": false,
            },
          ],
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

      function add_niveau()
      {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Ajouter');
      }

      function edit_niveau(id)
      {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "http://localhost/rivoproject/sysdba/niveau/ajax_edit/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
              $('[name="id"]').val(data.IDNiveau);
              $('[name="inputs[NiveauName]"]').val(data.NiveauName);
              $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Modifier'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
      }

      function reload_table()
      {
        table.ajax.reload(null,false); //reload datatable ajax 
      }

      function save()
      {
        $('#btnSave').text('Sauvegarder...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        //var niveau = $("#niveau").val();
        if(save_method == 'add')
        {
          url = "http://localhost/rivoproject/sysdba/niveau/ajax_add/";
        } 
        else 
        {
          url = "http://localhost/rivoproject/sysdba/niveau/ajax_update";
        }
        // ajax adding data to database
        //console.log( $('#form').serialize() );
        var dataser = $('#form').serialize();
        $.ajax({
          url : url,
          type: "POST",
          data: dataser,
          dataType: "JSON",
          success: function(data)
          {
            if(data.status)
            {
              /*$('#modal_form').modal('hide');*/
              reload_table();
            }
            else
            {
              for (var i = 0; i < data.inputerror.length; i++) 
              {
                $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
                $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
              }
            }
            $('#btnSave').text('Enregistrer'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error adding / update data');
            $('#btnSave').text('Enregistrer'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
          }
        });
      }

      function delete_niveau(id)
      {
        if(confirm('Are you sure delete this data?'))
        {
          // ajax delete data to database
          $.ajax({
              url : "http://localhost/rivoproject/sysdba/niveau/ajax_delete/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  //if success reload ajax table
                  $('#modal_form').modal('hide');
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });
        }
      }