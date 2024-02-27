    <!-- MODAL EFFECTS -->
    <div class="modal fade modalGerenciamento" id="addClasse">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_cadastro" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('inserir_professor'). 'f' ?>">
                    <div class="row">
                      <div class="col-md-3">
                        <img id="output" style="cursor: pointer;" title="Clique para escolher" src="components/assets/images/user.png" class="img-responsive col-12" ></img>
                          <label for="url_foto" id="lbl_url_foto" class="custom-file-labe text-center"> &nbsp;&nbsp;&nbsp;Selecione a Foto</label>
                          <input type="file" accept="image/*" class="form-control custom-file-input in" id="url_foto" name="foto" onchange="loadFile(event)">
                      </div>
                      <div class="col-lg-9 col-md-9">
                      <label style="color: #001f3f"><b>Dados Pessoais</b></label>
                      <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome Completo</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" required name="nome" maxlength="70" value="" class="form-control" autocomplete="no">
                        </div>
                      </div>
                      </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save changes</button> <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>