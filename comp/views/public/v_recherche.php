
<?php $this->load->view('public/header'); ?>

<section>
    <div class="container">
      <div class="row">


        <div class="col-sm-3">
          <div class="left-sidebar">
            <div class="brands_products" style="background-color:#f8f8f8;">
              <div class="brands-name">  
                <p style="font-size:12px;">
                  afin de bien trouver votre besoin, veuillez préciser votre recherche<br>
                  ex: mathématiques Bac, comptabilité, java
                </p>              
                <form id="zone_rech">
                  <select class="control-form" id="cb_ville">
                  <option value="-1">Toutes les villes</option>
                  </select>

                 <!--  <select class="control-form">
                    <option>Toutes les activités</option>
                  </select>

                  <select class="control-form">
                    <option>Tous les niveaux</option>
                  </select> -->

                  <input class="control-form" type="text" name="RechTxt" placeholder="recherche...">

                  <button type="button" class="control-form btn btn-warning" id="btnRech" onclick="rech()">Rechercher</button>
              </form>
                
              </div>
            </div>
                <!-- adsence ici -->
          </div>
        </div>

        <div class="col-sm-7">

        <?php if(count($rows) <= 0) { ?>
            <!-- <div class="media div_user">
            <div class="media-body">
              <div class="row" style="margin:2%;display:inline-block;">
              </div> 
              <p style="font-size:12px;margin-left:10%"> 
                  Désolé ... aucun personne pour votre recherche! 
              </p>
              <div class="blog-socials">
                
              </div>
            </div>
          </div>  -->

        <?php } ?>


        <?php foreach ($rows as $ligne) { ?>

          <div class="media div_user">
            <a class="pull-left" href="#">
              <img class="media-object" src="<?php if($ligne->ImgFile==="aucun")echo site_url('assets/myimg/user.jpg');else echo site_url('uploads').'/pic/'.$ligne->ImgFile; ?>" alt="" width="120" height="120">
            </a>
            <div class="media-body">
              <div class="row" style="margin:2%;display:inline-block;">

                <span class="" style="display:inline-block;">
                  <i class="fa fa-user" style="color:#FE980F;"></i> <?php echo $ligne->Prenom . " " . $ligne->Nom; ?>
                </span>
                <span class="" style="display:inline-block">
                   <i class="fa fa-location-arrow" style="color:#FE980F;"></i> <?php echo $ligne->VilleName; ?>
                </span>
                <span class="" style="display:inline-block">
                   <i class="fa fa-certificate " style="color:#FE980F;"></i> <?php echo $ligne->NiveauName; ?>
                </span>
                <span class="" style="display:inline-block">
                   <i class="fa fa-book" style="color:#FE980F;"></i> <?php echo $ligne->Specialite; ?>
                </span>

              </div> 
              <p style="font-size:15px;"> 
                <?php if($ligne->AboutTxt === "aucune") 
                        echo $ligne->Prenom . " est en train de completer son profil visitez son profil pour vous contactez!";
                      else echo stripslashes($ligne->AboutTxt); ?>
                </p>
              <div class="blog-socials">
                <ul>
                  <li><a  onclick="void()"><i class="fa fa-facebook"></i></a></li>
                  <li><a  onclick="void()"><i class="fa fa-twitter"></i></a></li>
                  <li><a  onclick="void()"><i class="fa fa-dribbble"></i></a></li>
                  <li><a  onclick="void()"><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <a class="btn btn-primary" href="<?php echo base_url() . 'profil/info/' . $ligne->IDUser; ?>" style="margin-bottom:3px;">Contact</a>
                <span class="pull-right">
                  <i class="fa fa-star" style="color:#FE980F;"></i>
                  <i class="fa fa-star" style="color:#FE980F;"></i>
                  <i class="fa fa-star" style="color:#FE980F;"></i>
                  <i class="fa fa-star-o" style="color:#FE980F;"></i>
                  <!-- <i class="fa fa-star" style="color:#FE980F;"></i> -->
                  <i class="fa fa-star-o" aria-hidden="true" style="color:#FE980F;"></i>
                </span>
              </div>
            </div>
          </div> 

          <?php } ?>

          <!-- <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
          </ul> -->
          <div class="row text-center margin-pagi">
            <div class="col-md-1"></div>
              <div class="col-md-10 text-center">
                <?php echo $pagination; ?>
              </div>
            <div class="col-md-1"></div>
          </div>
        </div> 

        <div class="col-sm-2">
          <!-- <div class="right-sidebar">
     
            <div class="brands_products">
              <div class="brands-name">                
                <form action="" id="zone_rech" class="">
                  <select class="control-form">
                  <option>Toutes les villes</option>
                  </select>

                  <select class="control-form">
                    <option>Toutes les activités</option>
                  </select>

                  <input class="control-form" type="text" >

                  <button class="control-form btn btn-warning" >Rechercher</button>
              </form>
                
              </div>
            </div>
          </div> -->
          <!-- adsence ici -->
        </div> 

      </div>
    </div>
  </section>

  <script src="<?php echo site_url('assets/myjs/recherche.js'); ?>"></script>

<?php $this->load->view('public/footer'); ?>