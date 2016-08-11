
<?php include_once('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
              				
              				<button class="btn btn-success" onclick="filtrer()">
		                  		<i class="glyphicon glyphicon-filter"></i> Filtrer
		                  	</button>

		                  	<button class="btn btn-default" onclick="reload_table()">
                  				<i class="glyphicon glyphicon-refresh"></i>Actualiser
                  			</button>

	                  		<div class="col-md-4"> 
			                    <select class="form-control" id="cb_etat" >
			                    	<option value="0">Etat du profil</option>
			                    	<option value="1">Valider</option>
			                    	<option value="2">En cours</option>
			                    	<option value="3">Non valider</option>
			                    </select>
	                  		</div>

	                  		<div class="col-md-4"> 
			                    <select class="form-control" id="cb_niveau" >
			                    	<option value="0">Tous les niveaux</option>
			                    </select>
	                  		</div>

	                  		<div class="col-md-4"> 
			                    <select class="form-control" id="cb_ville" >
			                    	<option value="0">Toutes les villes</option>
			                    </select>
	                  		</div>

                		</div>

                		<div class="box-body">
	                  		<table id="table_utilisateur" class="table table-bordered table-striped">
	                    		<thead>
			                      	<tr>
				                        <th>Nom</th>
				                        <th>Prénom</th>
				                        <!-- <th>Email</th> -->
				                        <th>Attestation/Diplome</th>
				                        <th>CIN</th>
				                        <th>Etat</th>

				                        <th>Validation</th>               
				                        <th style="width:1250px;">Action</th>
			                      	</tr>
	                    		</thead>
	                    		<tbody>
	                      		</tbody>
			                    <tfoot>
			                      	<tr>
				                     <!--    <th>Nom</th>
				                        <th>Prénom</th>
				                        <th>Email</th>
				                        <th>CIN</th>
				                        <th>Attestation/Diplome</th>
				                        <th>Etat</th>
				                        <th style="width:125px;">Action</th> -->
			                      	</tr>
			                    </tfoot>
	                  		</table>
                		</div>
                	</div>
                </div>
            </div>
        </section>
    </div> <!-- content wrapper-->

    <div class="modal fade" id="cinmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            	<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
            <img src="" id="imgcin" style="width:570px; height: 264px;" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div> 

<?php include_once('footer.php'); ?>

<script src="<?php echo base_url() . 'assets/myjs/utilisateur.js'?>"></script>