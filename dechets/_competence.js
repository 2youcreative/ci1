
      var save_method; //for save method string
      var table;

      $(document).ready(function(){

        table = $("#table_competence").DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": "http://localhost/rivoproject/sysdba/competence/ajax_list",
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
          url : "http://localhost/rivoproject/sysdba/specialite/get_niveau/",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            $.each(data, function(i, item){
              $("#cb_niveau_table").append('<option value="'+ item.IDNiveau +'">'+ item.NiveauName +'</option>');
              $("#cb_niveau").append('<option value="'+ item.IDNiveau +'">'+ item.NiveauName  +'</option>');
           });
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
        });

        $("#cb_niveau_table, #cb_niveau").change(function() {
          var val = $(this).val();
          if (val!=="toutes")
          {
            $.ajax({
              url : "http://localhost/rivoproject/sysdba/competence/get_specialite2/"+val,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $("#cb_specialite_table, #cb_specialite").empty();
                $("#cb_specialite_table").append('<option value="toutes"> Choisir une spécialité</option>');
                $.each(data, function(i, item){
                  $("#cb_specialite_table, #cb_specialite").append('<option value="'+ item.IDSpecialite +'">'+ item.SpecialiteName +'</option>');
                });
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error get data from ajax');
              }
            });
          }
        });

        $("#cb_specialite_table").change(function() {
          var val = $(this).val();
          if (val!=="toutes") {
            table.ajax.url("http://localhost/rivoproject/sysdba/competence/ajax_list/1/"+val).load();
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

      function add_competence()
      {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Ajouter');
      }

      function edit_competence(id)
      {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "http://localhost/rivoproject/sysdba/competence/ajax_edit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              $('[name="id"]').val(data.IDCompetence);
              $('[name="inputs[CompetenceName]"]').val(data.CompetenceName);
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
        //var competence = $("#competence").val();
        if(save_method == 'add')
        {
          url = "http://localhost/rivoproject/sysdba/competence/ajax_add/";
        } 
        else 
        {
          url = "http://localhost/rivoproject/sysdba/competence/ajax_update";
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
              //$('#modal_form').modal('hide');
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

      function delete_competence(id)
      {
        if(confirm('Are you sure delete this data?'))
        {
          // ajax delete data to database
          $.ajax({
              url : "http://localhost/rivoproject/sysdba/competence/ajax_delete/"+id,
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