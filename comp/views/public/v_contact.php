
<?php $this->load->view('public/header'); ?>

<div id="contact-page" class="container">
	<div class="bg">   	
		<div class="row">  	
    		<div class="col-sm-8">
    			<div class="contact-form">
    				<h2 class="title text-center">Form Contact</h2>
    				<div class="status alert alert-success" style="display: none"></div>
			    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
			            <div class="form-group col-md-6">
			                <input type="text" name="name" class="form-control" required="required" placeholder="Nom">
			            </div>
			            <div class="form-group col-md-6">
			                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
			            </div>
			            <div class="form-group col-md-12">
			                <input type="text" name="subject" class="form-control" required="required" placeholder="Objet">
			            </div>
			            <div class="form-group col-md-12">
			                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
			            </div>                        
			            <div class="form-group col-md-12">
			                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Envoyer">
			            </div>
			        </form>
    			</div>
    		</div>
    		<div class="col-sm-4">
    			<div class="contact-info">
    				<h2 class="title text-center">Contact Info</h2>
    				<address>
    					<p>Smyle-Academie</p>
						<p>147 B 13 Imm Oumlil Bd Hassan II</p>
						<p>Agadir Maroc</p>
						<p>Mobile: +2126 11 22 87 12</p>
						<p>Fax: +2126 11 22 87 12</p>
						<p>Email: info@smyleacademie.com</p>
    				</address>
    				<div class="social-networks">
    					<h2 class="title text-center">Suivez nous</h2>
						<ul>
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-youtube"></i></a>
							</li>
						</ul>
    				</div>
    			</div>
			</div>    			
    	</div>
    </div> 
</div> 
<br />

  <style type="text/css">
    /*.modal_login{
      padding: 25px 130px 40px;
      box-shadow: 0 0 1px rgba(0, 0, 0, 0.75);
      text-align: center;
  }
  .btnLogin{
    border-top-color: #ffce00;
      border-left-color: #ffce00;
      height: 40px;
      padding-bottom: 10px;
      font-family: 'Exo', sans-serif;
      font-size: 14px;
  }
  .form-control{
    font-family: "exo_2light_italic";
    font-size: 1.1em;
    width: 100%;
    height: 40px;
    padding: 0 10px;
    border-radius: 3px;
    border: 1px solid #e4e4e4;
    border-top-color: #bfbfbf;
    background: #e9e9e9;
  }*/
  </style>


<?php $this->load->view('public/footer'); ?>