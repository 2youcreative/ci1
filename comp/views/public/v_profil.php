
<?php $this->load->view('public/header'); ?>
<?php
foreach ($row as $ligne)
{
  $iduser = $ligne->IDUser;
  $nom = stripslashes($ligne->Nom);
  $prenom = stripslashes($ligne->Prenom);
  $username = stripslashes($ligne->UserName);
  $img = stripslashes($ligne->imgFile);
  $adresse = stripslashes($ligne->Adresse);
  $email = stripslashes($ligne->Email);
  $tel = stripslashes($ligne->Tel);
  $desc = stripslashes($ligne->AboutTxt);
  $spec = stripslashes($ligne->Specialite);
  $ville = stripslashes($ligne->VilleName);
  $niveau = stripslashes($ligne->NiveauName);
}
?>
<section>
    <div class="container">
      <div class="row">

        <div class="col-sm-3">
          <div class="left-sidebar">
          
            <h2></h2>
            <div class="brands_products">
              <div class="brands-name">

                <img src="<?php if($img==="aucun")echo site_url('assets/myimg/user.jpg');else echo site_url('uploads').'/pic/'.$img; ?>" width="240" height="200">

                  <span>
                    <i class="fa fa-user" style="color:#FE980F;"></i> <?php echo $prenom . " " . $nom; ?><br />
                    <i class="fa fa-certificate " style="color:#FE980F;"></i> <?php echo $niveau ?> <br />
                    <i class="fa fa-book" style="color:#FE980F;"></i> <?php echo $spec ?><br />
                  </span>

                  <span>
                    <i class="fa fa-envelope" style="color:#FE980F;"></i> <?php echo $email ?> <br />
                    <i class="fa fa-phone-square" style="color:#FE980F;"></i> <?php if($tel==='') echo '?';else echo $tel; ?> <br />
                    <i class="fa fa-home" style="color:#FE980F;"></i> <?php echo $adresse ?> <br />
                    <i class="fa fa-location-arrow" style="color:#FE980F;"></i> <?php echo $ville ?> <br />
                  </span>

                  <span>
                    <a onclick="" style="cursor:pointer;"><i class="fa fa-eye" style="color:#FE980F;font-size:20px;"></i> CV<a> <br />
                  </span>
                  


              </div>
            </div>
               
          </div>
        </div>



        <div class="col-sm-6">

          <div class="response-area" style="margin-top:30%;color:black;">
            <h5>En Bref</h5>
            <ul class="media-list">
              <li class="media">
                <div class="media-body" style="margin:10px;">
                  <p style="font-size:14px;height:auto;">
                    <?php if($desc===NULL) echo $prenom.' est en train de completer son profil!'; else echo $desc; ?>
                  </p>
                </div>
              </li>
            </ul>         
          </div>
         
          <div class="response-area">
            <h6>Avis des clients</h6>
            <ul class="media-list">

            <?php  foreach ($row2 as $ligne) { ?>
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="<?php echo site_url('assets/myimg/user.jpg'); ?>" alt="">
                </a>
                <div class="media-body">
                  <ul class="sinlge-post-meta">
                    <li><i class="fa fa-user"></i><?php echo $ligne->UserComment; ?></li>
                    <li><i class="fa fa-calendar"></i><?php echo $ligne->DateComment; ?></li>
                  </ul>
                  <p><?php echo $ligne->Comment; ?></p>
                </div>
              </li>
            <?php } ?>

            </ul>         
          </div>

          <div class="replay-box">
            <div class="row">
                <div class="alert alert-danger hidden" id="alert_error">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p id="span_error"></p><strong></strong> 
                </div>
                <form id="form_comment">
                  <input type="hidden" value="<?php echo $iduser; ?>" name="id"/> 
                  <div class="col-sm-4">
                    <h6>Ajouter votre avis</h6>                    
                      <div class="blank-arrow">
                        <label>Nom et prénom</label>
                      </div>
                      <span>*</span>
                      <input type="text" name="inputs[UserComment]" placeholder="Nom et prénom...">

                      <div class="blank-arrow">
                        <label>Adresse email</label>
                      </div>
                      <span>*</span>
                      <input type="email" placeholder="Votre adresse email..." name="inputs[EmailComment]">
                      <span class="help-block"></span>
                  </div>
                  <div class="col-sm-8">
                    <div class="text-area">
                      <div class="blank-arrow">
                        <label>Saisir votre commentaire</label>
                      </div>
                      <span>*</span>
                      <textarea rows="6" class="avisclient" placeholder="Saisir votre avis(100 caractéres max)..." name="inputs[Comment]" maxlength="100"></textarea>
                      <a class="btn btn-primary" onclick="save_comment(<?php echo $iduser; ?>)" id="btn_save_comment">Envoyer</a>
                    </div>
                  </div>
                </form>
            </div>
          </div>

        </div> 

        <div class="col-sm-3">
          <div class="right-sidebar">
     
            <div class="brands_products">
              <div class="brands-name">                
                
                <h2>Compétences</h2>

                    <div class="competence text-center">
                       <?php
                        foreach ($row1 as $ligne) { ?>

                          <span>
                            
                              <i class="fa fa-tags" style="color:#FE980F;"></i> <?php echo $ligne->CompName; ?>
                              <a class="btn_comp"  title="Supprimer cette compétence" 
                                  style="" onclick="delete_comp('<?php echo $ligne->IDComp; ?>')">
                                  <i class="fa fa-edit" ></i>
                              </a>

                          </span>

                        <?php } ?>
                    </div>

              </div>
                
            </div>
          </div>
        </div>

    </div>
  </section>

<script src="<?php echo site_url('assets/myjs/comment.js'); ?>"></script>

<?php $this->load->view('public/footer'); ?>