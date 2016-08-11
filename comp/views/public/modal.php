


<div class="modal fade" id="modal_competence" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Ajouter</h5>
            </div>
            <div class="modal-body form">
              <div class="alert alert-success hidden" id="alert_success_comp">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span id="span_success_comp"></span><strong> !</strong> 
              </div>
              <form action="#" id="form_competence" class="form-horizontal">
                <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                      <div class="form-group">
                          <label class="control-label col-md-3">Compétence</label>
                            <div class="col-md-9">
                                <input name="inputs[CompName]" placeholder="Compétence, ex Mathématiques" class="form-control" type="text" id="CompName">
                                <span class="help-block"></span>
                            </div>
                      </div>
                    </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save_comp" onclick="save_competence()" class="btn btn-primary">Enregistrer</button>
                <!-- <button type="button" class="btn btn-danger" onclick="refresh_comp()">Annuler</button> -->
            </div>
          </div>
      </div>
</div>

<div class="modal fade" id="modal_errorfile" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-error-title">Erreur</h5>
        </div>
        <div class="modal-body form">
          <p class="msgerrorfile" style="color:red;"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
      </div>
  </div>
</div>

<!-- <div class="modal fade" id="modal_desc" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Modifier</h5>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_desc" class="form-horizontal">
                  <input type="hidden" value="" name="id"/> 
                      <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">En Bref</label>
                              <div class="col-md-9">
                                  <textarea name="inputs[AboutTxt]" placeholder="" class="form-control" id="AboutTxt"></textarea>
                                  <span class="help-block"></span>
                              </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save_desc" onclick="save_desc()" class="btn btn-primary">Enregistrer</button>
            </div>
          </div>
      </div>
</div> -->

