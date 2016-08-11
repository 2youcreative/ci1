
<?php $this->load->view('public/home_header');	 ?>

<section id="slider" class="sectionShadow">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>
					
					<div class="carousel-inner">

						<div class="item active">
							<div class="col-sm-6">
								<h1><span>SMYLE</span></h1>
								<h2>Prêt(e) à maîtriser vos compétences ? </h2>
								<p>Faites passer votre carrière au niveau supérieur ! </p>
								<a href="<?php echo site_url('connexion'); ?>" class="btn btn-default get">inscrivez-vous maintenant</a>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo site_url('assets/public/assets1/images/img_slider1.png');?>" class="girl img-responsive" alt="" />
							</div>
						</div>

						<div class="item">
							<div class="col-sm-6">
								<h1><span>SMYLE</span></h1>
								<h2>Voulez-vous acquérir de nouvelles compétences ? </h2>
								<p><!-- C’est maintenant ou jamais! Nous vous offrons des formations dans plusieurs domaines,
								 	que ce soit en ligne ou à domicile. -->
									Excellez-vous dans un domaine, avez-vous le sens de partage ? Faites-en bénéficier un autre.  
								</p>
								<a href="<?php echo site_url('connexion'); ?>" class="btn btn-default get">inscrivez-vous maintenant</a>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo site_url('assets/public/assets1/images/img_slider2.png');?>" class="girl img-responsive" alt="" />
							</div>
						</div>

						<div class="item">
							<div class="col-sm-6">
								<h1><span>SMYLE</span></h1>
								<h2>Besoin d’approfondir vos connaissances, de réviser vos cours ou encore de préparer vos examens ? </h2>
								<p>Inscrivez-vous, saisissez votre niveau et trouvez les meilleurs formateurs.</p>
								<a href="<?php echo site_url('connexion'); ?>" class="btn btn-default get">inscrivez-vous maintenant</a>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo site_url('assets/public/assets1/images/img_slider3.png');?>" class="girl img-responsive" alt="" />
							</div>
						</div>

					</div>		
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>	
			</div>
		</div>
	</div>
</section>


<!--about-->
<section id="section-about" class="sectionShadow">
	<div class="container">
		<div class="about">
			<div class="row mar-bot40">
				<div class="col-md-offset-3 col-md-6">
					<div class="title">
						<div class="wow bounceIn">
							<!-- <h2 class="section-heading animated" data-animation="bounceInUp">SMYLE Academie</h2> -->
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="row-slider">
					<div class="col-lg-6 mar-bot30">
						<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
							<div class="slides" data-group="slides">
								<ul>
									<div class="slide-body" data-group="slide">
										<li><img alt="" class="img-responsive" src="<?php echo site_url('assets/public/assets2/img/9.jpg'); ?>" width="100%" height="350"/></li>
										<li><img alt="" class="img-responsive" src="<?php echo site_url('assets/public/assets2/img/10.jpg'); ?>" width="100%" height="350"/></li>
										<li><img alt="" class="img-responsive" src="<?php echo site_url('assets/public/assets2/img/11.jpg'); ?>" width="100%" height="350"/></li>
									</div>
								</ul>
								<a class="slider-control left" href="#" data-jump="prev"><i class="fa fa-angle-left fa-2x"></i></a>
								<a class="slider-control right" href="#" data-jump="next"><i class="fa fa-angle-right fa-2x"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 ">
						<div class="company mar-left10">
							<h4> Des formateurs 100% accessibles en ligne et à domicile</span> à tous.</h4>
							<p>
								Nous croyons que tout le monde devrait avoir le droit d'apprendre à tout âge. Nos formations sont ouvertes en ligne et à domicile.
							 	En fait, vous avez plusieurs formateurs pour vous aider.
							 	Obtenez des conseils sur les forums et des corrections détaillées de vos devoirs. 
							 	Et quand vous aurez appris, devenez à votre tour professeur.
							</p>
						</div>
						<div class="list-style">
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-xs-12">
									<ul>
										<li>Mathématiques</li>
										<li>Initiation numérique</li>
										<li>Marketing digital</li>
										<li>Gestion de projet</li>
									</ul>
								</div>
								<div class="col-lg-6 col-sm-6 col-xs-12">
									<ul>
										<li>Développement web</li>
										<li>Développement personnel</li>
										<li>Systèmes et réseaux</li>
										<li>Do it yourself</li>
									</ul>
									
								</div>
								<!-- <div class="col-lg-12 col-sm-12 col-xs-12"> -->
								<div class="col-lg-12 col-sm-12 col-xs-12 col-sm-offset-3">
									<a href="#">Trouver le formateur adapté à votre besoin</a>
								</div>
							</div>
						</div>
					</div>	
				</div>	
			</div>			
		</div>	
	</div>
</section><!--/about-->
		
<!-- services -->
<!-- <section id="services" class="section pad-bot5 bg-white sectionShadow">
	<div class="container"> 
		<div class="row mar-bot5">
			<div class="col-md-offset-3 col-md-6">
				<div class="section-header">
				<div class="wow bounceIn"data-animation-delay="7.8s">
				
					<h2 class="section-heading animated" style="color:black">étudiant, élève, particulier, entreprise ...!</h2>
					<h4 style="color:black"> Vous y avez pensé, sans oser le faire ...<br />
						Maintenant, c'est possible. SMYLE faciliter toutes vos démarches 
						concernant la rechreche d'un formateur, professeur, ... </h4>
				</div>
				</div>
			</div>
		</div>
		<div class="row mar-bot40">
			<div class="col-lg-4" >
				<div class="wow bounceIn">
					<div class="align-center">
						<div class="wow rotateIn">
							<div class="service-col">
								<div class="service-icon">
									<figure><i class="fa fa-users"></i></figure>
								</div>
								<h2><a href="#">Besoin des heures supplimentaires?</a></h2>
								<p style="color:black">En fait, vous avez 1 740 326 camarades de classe pour vous aider. 
								Obtenez des conseils sur les forums et des corrections détaillées de vos devoirs. 
								Et quand vous aurez appris, devenez à votre tour professeur</p>
							</div>
						</div>
					</div>
				</div>
			</div>
					
			<div class="col-lg-4" >
				<div class="align-center">
					<div class="wow bounceIn">
						<div class="wow rotateIn">
							<div class="service-col">	
								<div class="service-icon">
									<figure><i class="fa fa-briefcase"></i></figure>
								</div>
								<h2><a href="#">Besoin d'une professeur à domicile?</a></h2>
								<p style="color:black">En fait, vous avez 1 740 326 camarades de classe pour vous aider. 
								Obtenez des conseils sur les forums et des corrections détaillées de vos devoirs. 
								Et quand vous aurez appris, devenez à votre tour professeur</p>
							</div>
						</div>	
					</div>
				</div>
			</div>
			
			<div class="col-lg-4" >
				<div class="align-center">
					<div class="wow bounceIn">
						<div class="service-col">
							<div class="service-icon">
								<figure><i class="fa fa-desktop"></i></figure>
							</div>
								<h2><a href="#">Besoin d'une formation en ligne?</a></h2>
								<p style="color:black">En fait, vous avez 1 740 326 camarades de classe pour vous aider. 
								Obtenez des conseils sur les forums et des corrections détaillées de vos devoirs. 
								Et quand vous aurez appris, devenez à votre tour professeur.</p>
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
</section> --> <!--/services-->
		
			
<!-- team -->
<!-- <section id="team" class="team-section appear clearfix sectionShadow">
<div class="container">

			<div class="row mar-bot10">
				<div class="col-md-offset-3 col-md-6">
					<div class="section-header">
					<div class="wow bounceIn">
						<h2 class="section-heading animated" data-animation="bounceInUp" style="color:black">Plusieurs formateurs inscrits</h2>
						<p style="color:black">Des étudiants, élèves, entreprises 
						utilisent SMYLE pour donner vie à leurs carrières.<br />
						inscrivez-vous et rejoindre la communité SMYLE.</p>
					</div>
					</div>
				</div>
			</div>

			<div class="row align-center mar-bot45">
				<div class="col-md-4">
				<div class="wow bounceIn" data-animation-delay="4.8s">
					<div class="team-member">
						<div class="profile-picture">
							<figure><img src="<?php //echo site_url('assets/public/assets2/img/ayoub.jpg'); ?>" alt=""></figure>
							<div class="profile-overlay"></div>
								<div class="profile-social">
									<div class="icons-wrapper">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
										<a href="#"><i class="fa fa-pinterest"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
									</div>
								</div>
						</div>
						<div class="team-detail">
							<h4>Ayoub Mamza</h4>
							<span>elève Ingénieur En Génie Industriel</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">				
				<div class="wow bounceIn">
					<div class="team-member">
						<div class="profile-picture">
							<figure><img src="<?php //echo site_url('assets/public/assets2/img/maroua.jpg');?>" alt=""></figure>
							<div class="profile-overlay"></div>
								<div class="profile-social">
									<div class="icons-wrapper">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
										<a href="#"><i class="fa fa-pinterest"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
									</div>
								</div>
						</div>
						<div class="team-detail">
							<h4>Maroua Goubi</h4>
							<span>Elève Ingénieur En Génie Industriel</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="wow bounceIn">
					<div class="team-member">
						<div class="profile-picture">
							<figure><img src="<?php //echo site_url('assets/public/assets2/img/mouna.jpg');?>" alt=""></figure>
							<div class="profile-overlay"></div>
							<div class="profile-social">
								<div class="icons-wrapper">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</div>
							</div>
						</div>
						<div class="team-detail">
							<h4>Mouna Moqrich</h4>
							<span>Elève Ingénieur En Génie Industriel</span>
						</div>
					</div>
				</div>
			</div>
		</div>				
	</div>
</section> --><!-- /team -->
		
<!-- section works -->
<section id="section-works" class="section appear clearfix sectionShadow">
	<div class="container">
		
		<div class="row mar-bot40">
			<div class="col-md-offset-3 col-md-6">
				<div class="section-header">
					<h2 class="section-heading animated" data-animation="bounceInUp" style="color:black;font-family:andalus;">De nombreuses spécialités</h2>
					<p style="color:black;">Pour vos heures supplémentaires, trouvez le formateur adapté à vos besoins <br />
						Valorisez vos compétences avec des formateurs de haut niveau</p>
				</div>
			</div>
		</div>
					
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="portfolio-items isotopeWrapper clearfix" id="3">
			  
                <article class="col-md-4 isotopeItem webdesign">
					<div class="portfolio-item">
					<div class="wow rotateInUpLeft" data-animation-delay="4.8s">
						<img src="<?php echo site_url('assets/public/assets2/img/portfolio/comp1.jpg'); ?>" alt="welcome" />
					</div>
						 <div class="portfolio-desc align-center">
							<div class="folio-info">
								<h5><a href="#">Echangez vos connaissances </a></h5>
								<a href="<?php echo site_url('assets/public/assets2/img/portfolio/comp1.jpg');?>" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
							 </div>										   
						 </div>
					</div>
                </article>

                <article class="col-md-4 isotopeItem photography">
					<div class="portfolio-item">
					<div class="wow bounceIn">
						<img src="<?php echo site_url('assets/public/assets2/img/portfolio/comp2.jpg');?>" alt="" />
					</div>
						 <div class="portfolio-desc align-center">
							<div class="folio-info">
								<h5><a href="#">devenez un expert en bureautique</a></h5>
								<a href="<?php echo site_url('assets/public/assets2/img/portfolio/comp2.jpg');?>" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
							 </div>										   
						 </div>
					</div>
                </article>
								

                <article class="col-md-4 isotopeItem photography">
					<div class="portfolio-item">
					<div class="wow rotateInDownRight">
						<img src="<?php echo site_url('assets/public/assets2/img/portfolio/comp3.jpg');?>" alt="" />
					</div>	
						 <div class="portfolio-desc align-center">
							<div class="folio-info">
								<h5><a href="#">devenez un spécialiste</a></h5>
								<a href="<?php echo site_url('assets/public/assets2/img/portfolio/comp3.jpg'); ?>" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
							 </div>										   
						 </div>
					</div>
                </article>

                <article class="col-md-4 isotopeItem print">
					<div class="portfolio-item">
					<div class="wow rotateInUpLeft">
						<img src="<?php echo site_url('assets/public/assets2/img/portfolio/comp4.jpg');?>" alt="" />
					 </div>	
						 <div class="portfolio-desc align-center">
							<div class="folio-info">
								<h5><a href="#">Améliorez vos compétences</a></h5>
								<a href="<?php echo site_url('assets/public/assets2/img/portfolio/comp4.jpg');?>" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
							 </div>										   
						 </div>
					</div>
                </article>

                <article class="col-md-4 isotopeItem photography">
					<div class="portfolio-item">
					<div class="wow bounceIn">
						<img src="<?php echo site_url('assets/public/assets2/img/portfolio/comp5.jpg');?>" alt="" />
					</div>
						 <div class="portfolio-desc align-center">
							<div class="folio-info">
								<h5><a href="#">Améliorez votre sens de créativité</a></h5>
								<a href="<?php echo site_url('assets/public/assets2/img/portfolio/comp5.jpg');?>" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
							 </div>										   
						 </div>
					</div>
                </article>

                <article class="col-md-4 isotopeItem webdesign">
					<div class="portfolio-item">
					<div class="wow rotateInDownRight">
						<img src="<?php echo site_url('assets/public/assets2/img/portfolio/comp6.jpg');?>" alt="" />
					 </div>		
						 <div class="portfolio-desc align-center">
							<div class="folio-info">
								<h5><a href="#">Soyez un bon programmeur</a></h5>
								<a href="<?php echo site_url('assets/public/assets2/img/portfolio/comp6.jpg');?>" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
							 </div>										   
						 </div>
					</div>
                </article>

            </div>
                                        
		</div>                              

	</div>
</div>
				
</div>

  	<div class="recommended_items" style="background-color:white;">
		<h2 class="section-heading animated text-center" data-animation="bounceInUp" style="color:black;font-family:andalus;margin:20px;">
		Plusieurs profils inscrits</h2>
		<p class="text-center" style="margin:20px;">Des étudiants, élèves, entreprises 
						utilisent 9ra w khdem pour donner vie à leurs carrières.<br />
						<a href="<?php echo site_url('connexion/'); ?>">inscrivez-vous et rejoindre notre communité </a>.</p>
		
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">

					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/mouna.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Mouna Moqrich</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/maroua.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Maroua Goubi</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/ayoub.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Ayoub Mamza</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/nisrine.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Nisrine Jabou</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="item">	
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/youssef.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Youssef Aabail</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/hamza.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Hamza Nom</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/youssef.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Prénom Nom</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo site_url('assets/myimg/hamza.jpg'); ?>" alt="" width="100%" height="200"/>
									<p style="margin:10px;">Prénom Nom</p>
									<p>Eleve Ingénieur Génie Industriel</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>			
		</div>
	</div><!--/recommended_items--> 

</section>

<?php $this->load->view('public/footer') ?>