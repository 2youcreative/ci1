

<?php $this->load->view('public/header'); ?>

<style type="text/css">
	#form h1{
		color: #210a40;
    	font-family: 'Roboto', sans-serif;
    	font-size: 20px;
    	font-weight: 300;
    	margin-bottom: 30px;
	}
	#form p{
		color: #210a40;
    	font-family: 'Roboto', sans-serif;
    	font-size: 14px;
    	font-weight: 300;
    	margin-bottom: 30px;
	}
	.error_msg{
		color:red;
	}
	#form_passforget{
		margin-bottom: 50px;
	}
</style>

<section id="form">
	<div class="container">
		<div class="row">
			<h1 class="col-sm-offset-1">Réinitialisation du mot de passe</h1>
			<p class="col-sm-offset-1">
				Vous avez oublié votre mot de passe ? Pas de panique ! Indiquez-nous votre nom d'utilisateur ou votre adresse email et nous vous renverrons un nouveau mot de passe par email. Pensez à regarder dans votre dossier Spam si vous ne voyez pas arriver notre email.
			</p>
			<div class="col-sm-8 col-sm-offset-1">
				<div class="login-form">
					<div class="alert hidden" id="alert_error_passforget">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<span id="span_error_passforget"></span><strong> !</strong> 
					</div>
					<form id="form_passforget">	
						<input type="text" placeholder="Nom d'utilisateur ou l'adresse email" class="control-form" id="adremail" name="adremail"/>
							<span class="help-block error_msg"></span>
						<button type="button" class="btn btn-default" onclick="checkAdrEmail()">M'envoyer un nouveau mot de passe</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?php echo site_url('assets/js/script_login.js');?>"></script>

<?php $this->load->view('public/footer'); ?>