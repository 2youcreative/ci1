
<?php 

$this->load->view('public/header');

$this->load->view('public/modal');

  foreach ($row as $ligne)
    {
      $iduser = $ligne->IDUser;
      $nom = stripslashes($ligne->Nom);
      $prenom = stripslashes($ligne->Prenom);
      $username = stripslashes($ligne->UserName);

      $img = stripslashes($ligne->imgFile);
      $cin = stripslashes($ligne->CinFile);
      $dip = stripslashes($ligne->AttestFile);
      $cv = stripslashes($ligne->CvFile);

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

      <?php if(isset($errorfile)) {
        echo "
          <div class=\"alert alert-danger text-center\" style=\"z-index:20;\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <span id=\"span_error_login\"></span>" . $errorfile . "<strong> !</strong> 
          </div>";
        } if(isset($success)) { 
          echo
            "<div class=\"alert alert-success text-center\" style=\"z-index:20;\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <span id=\"span_error_login\"></span>Image enregistrer avec succès<strong> !</strong> 
            </div>";
        } ?>

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
                    <?php if($img!="aucun") {?><a onclick="" style="cursor:pointer;"><i class="fa fa-eye" style="color:#FE980F;font-size:20px;"></i> Photo du profil<a> <br /><?php } ?>
                    <?php if($cin!="aucun") {?><a onclick="" style="cursor:pointer;"><i class="fa fa-eye" style="color:#FE980F;font-size:20px;"></i> CIN<a> <br /><?php } ?>
                    <?php if($dip!="aucun") {?><a onclick="" style="cursor:pointer;"><i class="fa fa-eye" style="color:#FE980F;font-size:20px;"></i> Attestation/Diplôme<a> <br /><?php } ?>
                    <?php if($cv!="aucun") {?><a onclick="" style="cursor:pointer;"><i class="fa fa-eye" style="color:#FE980F;font-size:20px;"></i> CV<a> <br /><?php } ?>
                  </span>

              </div>
            </div>
               
          </div>
        </div>



        <div class="col-sm-6">

          <div class="response-area" > <!-- style="margin-top:30%;" -->

                  <div class="alert hidden" id="alert_error_login">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span id="span_error_login"></span>Votre profile a été modifier avec succès <strong> !</strong> 
                  </div>

                  <div class="login-form" style="margin-bottom:40px;">

                    <h5>En Bref</h5>
                      <a class="btn_comp"  title="Modifier" 
                          style="cursor:pointer;font-size:20px;" onclick="edit_desc()">
                          <i class="fa fa-edit" ></i>
                      </a>
                      <form id="form_desc">
                        <textarea class="en_bref_txt" id="AboutTxt" name="inputs[AboutTxt]" readonly="true"><?php if($desc==="aucune"){ echo 'Veuillez parler de  votre profil afin d augmnter la chance de trouver des clients';}else{ echo $desc;} ?>
                        </textarea>
                        <span class="help-block error_msg" style="color:red;"></span>
                        <a class="btn btn-warning hidden" id="btn_save_desc" onclick="save_desc()">Modifier</a>
                        <a class="btn btn-danger hidden" id="annuler_desc" onclick="annuler_desc()">Annuler</a>
                      </form>

                    <form id="form_compte">


                      <h5>Informations Personnelles</h5>

                      <input type="text" placeholder="Nom" class="control-form" id="Nom" name="inputs[Nom]" value="<?php echo $nom ?>" />
                        <span class="help-block error_msg"></span>

                      <input type="text" placeholder="Prénom" class="control-form" id="Prenom" name="inputs[Prenom]" value="<?php echo $prenom ?>"/>
                        <span class="help-block error_msg"></span>

                      <!-- <input type="text" placeholder="Niveau" class="control-form" id="" name="FkNIveau" value="<?php //echo $niveau ?>"/>
                        <span class="help-block error_msg"></span> -->
                      <select class="form-control" id="cb_niveau" name="niveau">
                        <option value="-1">Changer votre niveau?</option>
                      </select>

                      <input type="text" placeholder="Fililère" class="control-form" id="Specialite" name="inputs[Specialite]" value="<?php echo $spec ?>" />
                        <span class="help-block error_msg"></span>

                       <h5>Coordonnées & Contact</h5>

                      <textarea type="text" placeholder="Adresse" class="control-form" id="Adresse" name="inputs[Adresse]" ><?php echo $adresse ?></textarea>
                        <span class="help-block error_msg"></span>

                     <!--  <input type="text" placeholder="Ville" class="control-form" style="width:50%;display:inline;" readonly id="FkVille" name="FkVille" value="<?php //echo $ville ?>"/>
                        <span class="help-block error_msg"></span> -->
                      <select class="form-control" id="cb_ville" name="ville">
                        <option value="-1">Changer la ville?</option>
                      </select>

                      <input type="text" placeholder="Email" class="control-form" id="Email" name="inputs[Email]" value="<?php echo $email ?>"/>
                        <span class="help-block error_msg"></span>

                      <input type="number" placeholder="Tel" class="control-form" id="Tel" name="inputs[Tel]" value="<?php if($tel==='') echo '?';else echo $tel; ?>"/>
                        <span class="help-block error_msg"></span>

                       <h5>Paramétres</h5>

                      <input type="text" placeholder="Pseudo" class="control-form" id="UserName" name="inputs[UserName]" value="<?php echo $username ?>" >
                        <span class="help-block error_msg"></span>

                      <input type="password" placeholder="Mot de passe" class="control-form" id="Mdp1" name="Mdp1" value=""/>
                        <span class="help-block error_msg"></span>

                      <input type="password" placeholder="Confirmer votre mot de passe" class="control-form" id="Mdp2" name="Mdp2" value=""/>
                        <span class="help-block error_msg"></span>

                      <button type="button" class="btn btn-warning" id="btnEditCompte" onclick="edit_compte()">Enregistrer</button>
                    </form>
                  </div>
          </div>

        </div> 

        <div class="col-sm-3">
          <div class="right-sidebar">


          <div class="brands_products">
              <div class="brands-name">                
                
                <h2>mes Compétences</h2>

                    <div class="competence text-left">
                      <?php
                        foreach ($row1 as $ligne) { ?>

                          <span>
                            
                              <i class="fa fa-tags" style="color:#FE980F;"></i> <?php echo $ligne->CompName; ?>
                              <a class="btn_comp"  title="Supprimer cette compétence" 
                                  style="" onclick="delete_comp('<?php echo $ligne->IDComp; ?>')">
                                  <i class="fa fa-trash-o" ></i>
                              </a>

                          </span>

                        <?php } ?>
                    </div>

                    <button class="control-form btn btn-warning" id="btnAddCompetence" onclick="add_competence()">Ajouter compétence</button>
              </div>  
            </div>


            <div class="brands_products">
              <div class="brands-name">                
                
                <h2>Photo du profil</h2>

                    <div class="text-left">


                      <?php echo form_open_multipart('profilme/upload_pic', array('style'=>'display:inline'));?>

                       <label class="btn btn-info" for="file-photo" style="width:80%;">
                        <input id="file-photo" type="file" style="display:none;" 
                          onchange="$('#upload-photo').html($(this).val());" name="userfile">
                          <i class="fa fa-upload"></i>Photo du profile
                        </label><span class='label label-info' id="upload-photo"></span>

                        <button type="submit" class="control-form btn btn-warning text-center" id="btnuploads"> 
                          Envoyer
                        </button>

                      </form>

                    </div>
              </div>  
            </div>

            <div class="brands_products">
              <div class="brands-name">                
                
                <h2>Attestation/Diplôme</h2>

                    <div class="text-left">


                      <?php echo form_open_multipart('profilme/upload_dip', array('style'=>'display:inline'));?>

                       <label class="btn btn-info" for="file-attest" style="width:80%;">
                        <input id="file-attest" type="file" style="display:none;" 
                          onchange="$('#upload-attest').html($(this).val());" name="userfile">
                          <i class="fa fa-upload"></i>Attest/Diplôme
                        </label><span class='label label-info' id="upload-attest"></span>

                        <button type="submit" class="control-form btn btn-warning text-center" id="btnuploads"> 
                          Envoyer
                        </button>

                      </form>

                    </div>
              </div>  
            </div>

            <div class="brands_products">
              <div class="brands-name">                        
                <h2>curriculum vitae</h2>
                   <div class="text-left">
                      <?php echo form_open_multipart('profilme/upload_cv', array('style'=>'display:inline'));?>

                       <label class="btn btn-info" for="file-cv" style="width:80%;">
                        <input id="file-cv" type="file" style="display:none;" 
                          onchange="$('#upload-cv').html($(this).val());" name="userfile">
                          <i class="fa fa-upload"></i>CV
                        </label><span class='label label-info' id="upload-cv"></span>

                        <button type="submit" class="control-form btn btn-warning text-center" id="btnuploads"> 
                          Envoyer
                        </button>

                      </form>

                    </div>
              </div>  
            </div>

            <div class="brands_products">
              <div class="brands-name">                        
                <h2>Catre nationale d'identité</h2>
                   <div class="text-left">
                      <?php echo form_open_multipart('profilme/upload_cin', array('style'=>'display:inline'));?>

                       <label class="btn btn-info" for="file-cin" style="width:80%;">
                        <input id="file-cin" type="file" style="display:none;" 
                          onchange="$('#upload-cin').html($(this).val());" name="userfile">
                          <i class="fa fa-upload"></i>CIN
                        </label><span class='label label-info' id="upload-cin"></span>

                        <button type="submit" class="control-form btn btn-warning text-center" id="btnuploads"> 
                          Envoyer
                        </button>

                      </form>

                    </div>
              </div>  
            </div>
     
            

            <!-- activity div-->
              <!-- <div class="brands_products">
              <div class="brands-name">                           
                <h2>Activités</h2>
                    <div class="competence text-center">
                      <form>

                          <div class="checkbox pull-left" style="width:100%;">
                            <label>
                              <input type="checkbox" id="checkboxes" name="activity" value="" class="pull-left"> 
                            </label>
                          </div>

                      </form>
                    </div>

                    <button class="control-form btn btn-warning" id="btnEditActivity" onclick="add_activity()">Ajouter une activité</button>
              </div>
                
            </div> -->

          </div>
        </div>

    </div>
  </section>


  <script src="<?php echo site_url('assets/myjs/competence.js'); ?>"></script>

  <script src="<?php echo site_url('assets/myjs/profil.js'); ?>"></script>

<?php $this->load->view('public/footer'); ?>