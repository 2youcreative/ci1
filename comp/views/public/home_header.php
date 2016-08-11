<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>9ra w khdem</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/assets2/css/isotope.css');?>" media="screen" />	
		<link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/js/fancybox/jquery.fancybox.css'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/css/bootstrap-theme.css'); ?>">
		<link href="<?php echo site_url('assets/public/assets2/css/responsive-slider.css'); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/css/animate.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/css/style.css'); ?>">

		<link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/css/font-awesome.min.css'); ?>">
		<!-- skin -->
		<link rel="stylesheet" href="<?php echo site_url('assets/public/assets2/skin/default.css'); ?>">

		 <script src="<?php echo site_url('assets/public/assets1/js/jquery.js'); ?>"></script>

		<!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
	    <![endif]--> 



		<!-- <link href="assets1/css/bootstrap.min.css" rel="stylesheet"> -->
	    <link href="<?php echo site_url('assets/public/assets1/css/font-awesome.min.css'); ?>" rel="stylesheet">
	    <link href="<?php echo site_url('assets/public/assets1/css/prettyPhoto.css'); ?>" rel="stylesheet">
	    <link href="<?php echo site_url('assets/public/assets1/css/price-range.css'); ?>" rel="stylesheet">
	    <link href="<?php echo site_url('assets/public/assets1/css/animate.css'); ?>" rel="stylesheet">
		<link href="<?php echo site_url('assets/public/assets1/css/main.css'); ?>" rel="stylesheet">
		<link href="<?php echo site_url('assets/public/assets1/css/responsive.css'); ?>" rel="stylesheet">      
	    <link rel="shortcut icon" href="images/ico/favicon.ico">
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url('assets/public/assets1/images/ico/apple-touch-icon-144-precomposed.png'); ?>">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url('assets/public/assets1/images/ico/apple-touch-icon-114-precomposed.png'); ?>">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url('assets/public/assets1/images/ico/apple-touch-icon-72-precomposed.png'); ?>">
	    <link rel="apple-touch-icon-precomposed" href="<?php echo site_url('assets/public/assets1/images/ico/apple-touch-icon-57-precomposed.png'); ?>">
    
	    <link href="<?php echo site_url('assets/mycss/stylepagesaboutpart.css'); ?>" rel="stylesheet" >

    </head>	 
    <body>
	    <header id="header" style="background-color:white;">
			<div class="header_top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a href="#"><i class="fa fa-phone"></i> +212 611 21 87 12</a></li>
									<li><a href="#"><i class="fa fa-envelope"></i> info@smyleacademie.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href=""><img src="<?php echo site_url('assets/public/assets1/images/logo.png'); ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Accueil</a></li>
								<?php if($this->session->userdata('Logged') != TRUE) { ?>
									<li><a href="<?php echo base_url().'connexion/'; ?>"><i class="fa fa-sign-in"></i> Se connecter</a></li>
									<li><a href="<?php echo base_url().'connexion/'; ?>"><i class="fa fa-user"></i> S'inscrire</a></li>
									<li><a href="<?php echo base_url().'contact/'; ?>"><i class="fa fa-envelope"></i> Contact</a></li>
								<?php } else { ?>
									<li><a href="<?php echo base_url().'profilme/logout/'; ?>"><i class="fa fa-sign-out"></i> Déconnecter</a></li>
									<li><a href="<?php echo base_url().'profilme/'; ?>"><i class="fa fa-user"></i> Profile</a></li>
									<li><a href="<?php echo base_url().'contact/'; ?>"><i class="fa fa-envelope"></i> Contact</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="" style="margin-left:18px;">Accueil</a></li>
								<li><a href="">Qui sommes nous?</a></li>
								<li><a href="<?php echo site_url('recherche');?>">Recherche</a></li>
								<li><a href="">Partenaires</a></li>
								<li><a href="">Forums</a></li>
								<li><a href="<?php echo site_url('contact/'); ?>">Contact</a></li>
							</ul>

						</div>
					</div>
					<div class="col-sm-2" >
						<div class="search_box pull-right">
							<input type="text" placeholder="Search" />
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</header>
