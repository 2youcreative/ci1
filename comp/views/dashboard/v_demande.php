
<?php include_once('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
              				
              				<!-- <button class="btn btn-success" onclick="filtrer()">
		                  		<i class="glyphicon glyphicon-filter"></i> Filtrer
		                  	</button> -->

		                  	<button class="btn btn-default" onclick="reload_table()">
                  				<i class="glyphicon glyphicon-refresh"></i>Actualiser
                  			</button>

	                  		<div class="col-md-4"> 
			                    <select class="form-control" id="cb_etat">
			                    	<option value="-1">Tous les demandes</option>
			                    	<option value="1">Traité</option>
			                    	<option value="0">Non traité</option>
			                    </select>
	                  		</div>
							
							<!--
	                  		<div class="col-md-4"> 
			                    <select class="form-control" id="cb_ville" >
			                    </select>
	                  		</div> -->

                		</div>

                		<div class="box-body">
	                  		<table id="table_demande" class="table table-bordered table-striped">
	                    		<thead>
			                      	<tr>
				                        <th>Objet</th>
				                        <th>Message</th>
				                        <th>Date début du formation</th>
				                        <th>Date fin du formation</th>
				                        <th>Client</th>
				                        <th>Etat</th>
				                        <th style="width:125px;">Action</th>
			                      	</tr>
	                    		</thead>
	                    		<tbody>
	                      		</tbody>
			                    <tfoot>
			                      	<tr>
				                         <th>Objet</th>
				                        <th>Message</th>
				                        <th>Date début du formation</th>
				                        <th>Date fin du formation</th>
				                        <th>Client</th>
				                        <th>Etat</th>
				                        <th style="width:125px;">Action</th>
			                      	</tr>
			                    </tfoot>
	                  		</table>
                		</div>
                	</div>
                </div>
            </div>
        </section>
    </div> <!-- content wrapper-->

<?php include_once('footer.php'); ?>

<script src="<?php echo base_url() . 'assets/myjs/demande.js'?>"></script>