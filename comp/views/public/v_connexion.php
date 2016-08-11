
<?php $this->load->view('public/header'); ?>
<style type="text/css">
	.error_msg, .error_radio_msg{
		color: red;
	}
</style>
<section id="form">
	<div class="container">
		<div class="row div_form">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<h2>Connectez-vous</h2>
					<form id="form_login">
						<div class="alert hidden" id="alert_error_login">
	  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  						<span id="span_error_login"></span><strong> !</strong> 
						</div>
						<input type="text" placeholder="Pseudo" class="control-form" id="usernameLogin" name="UserNameLogin"/>
							<span class="help-block error_msg"></span>

						<input type="password" placeholder="Mot de passe" class="control-form" id="mdpLogin" name="MdpLogin"/>
							<span class="help-block error_msg"></span>

						<a href="<?php echo site_url('passforget/'); ?>">Mot de passe oublier</a>

						<button type="button" class="btn btn-default" onclick="membreConnecte()">Connexion</button>
					</form>

				</div>
			</div>
			<div class="col-sm-1">
				<h2 class="or">OU</h2>
			</div>

			<div class="col-sm-4">
				<div class="signup-form">
					<div class="alert hidden" id="alert_error_registre">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<span id="span_error_registre"></span><strong> !</strong> 
					</div>
					<h2>Inscrez-vous</h2>
					<form id="form_registre" action="<?php echo site_url("connexion/registre") ?>">
						<div class="alert hidden" id="alert_error_registre">
	  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  						<span id="span_error_registre"></span><strong> !</strong> 
						</div>

						<input type="text" placeholder="Nom" class="control-form" id="nom" name="Nom"/>
							<span class="help-block error_msg"></span>

						<input type="text" placeholder="Prénom" class="control-form" id="prenom" name="Prenom"/>
							<span class="help-block error_msg"></span>

						<input type="email" placeholder="Email" class="control-form" id="email" name="Email"/>
							<span class="help-block error_msg"></span>

						<select name="niveau" class="control-form cb_niveau" id="cb_niveau">
							<option value="-1">Selectionner le niveau?</option>
						</select>
							<span class="help-block error_msg"></span>

						<input type="text" placeholder="Filiére" class="control-form" id="filiere" name="filiere"/>
						<span class="help-block error_msg"></span>

						<!-- <span>Diplôme ou l'attestation du scolarité</span>
						<input type="file" placeholder="" class="control-form pull-right" id="attest" name="Attest"/>
						<span class="help-block error_msg"></span> -->

						<select name="ville" class="control-form cb_ville" id="cb_ville">
							<option value="-1">Selectionner la ville?</option>
						</select>
							<span class="help-block error_msg"></span>

						<input type="text" placeholder="Pseudo" class="control-form" id="login" name="UserName"/>
							<span class="help-block error_msg"></span>

						<input type="password" placeholder="Mot de passe" class="control-form" id="mdp1" name="Mdp1"/>
							<span class="help-block error_msg"></span>

						<input type="password" placeholder="Confirmer le mot de passe" class="control-form" id="mdp2" name="Mdp2"/>
							<span class="help-block error_msg"></span>

						<span class="help-block error_radio_msg"></span>
						<button type="button" class="btn btn-default" onclick="membreRegistre()">Inscription</button>

					</form>

				</div>
			</div>

		</div>
	</div>
</section>



<script src="<?php echo site_url('assets/myjs/connexion.js');?>"></script>

<?php $this->load->view('public/footer'); ?>