                          <?php if($_SESSION['nivelAcesso'] <=2){?>
                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Funcionário</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Funcionário</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cadastrar do funcionário</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                      <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                              <div class="card-header">
                                       
                                  <div class="col-11">
                                       <h3 class="card-title">Cadastro do funcionário</h3>
                                      <div class="col-1">
                                     
                                      </div>
                                  </div>
                                    
                                        
                                </div>
                   <div class="card-body" style="">
                  <form class="form_cadastro" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('inserir_funcionario'). 'f' ?>">
                    <div class="row">
                      <div class="col-md-3">
                        <img id="output" style="cursor: pointer;" title="Clique para escolher" src="components/assets/images/user.png" class="img-responsive ></img>
                          <label for="url_foto" id="lbl_url_foto" class="custom-file-labe text-center"> &nbsp;&nbsp;&nbsp;Selecione a Foto</label>
                          <input type="file" accept="image/*" class="form-control custom-file-input in" id="url_foto" name="foto" onchange="loadFile(event)">
                      </div>
                      <div class="col-lg-9 col-md-9">
                      <label style="color: #001f3f"><b>Dados Pessoais</b></label>
                      <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome Completo</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" required name="nome" maxlength="70" value="" class="form-control" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-3" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Data de nascimento</label>
                          <input type="text" onfocus="(this.type = 'date')" required onblur="(this.type = 'text')" id="dob" name="dataDeNascimento" value="" min="" max="<?=$dataIdadeMinFuncionario?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5" >
                        <label class="bmd-label-floating">Documento</label>
                        <div class="input-group ">
                          
                          <select class="form-control in" required style="color: #001f3f; text-align-last: left;" name=" tipoDeDocumento" >
                              <option value="" selected='' disabled=''>Tipo de documento</option>
                              <option value="Bilhete de identidade" >Bilhete de identidade</option> 
                              <option value="Carta de ConduÃ§Ã£o" >Carta de Condução</option> 
                              <option value="Passaporte" >Passaporte</option> 
                              <option value="Bilhete de identidade" >Cédula Pessoal</option> 
                          </select>
                          <input type="text" class="form-control" minlength="10" required name="numeroDeDocumento" maxlength="13" value="" placeholder="Nº de Documento" autocomplete="no">
                        </div>
                      </div>
                   

                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Local de Emissão</label>
                          <input type="text" id="locala_emissao_doc" required name=" localDeEmissao" maxlength="50" value="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Data de Emissão</label>
                          <input type="text" onfocus="(this.type = 'date')" required onblur="(this.type = 'text')" id="data_emissao_doc" name="data_emissao_doc" value="" max="" min="<?=$dataValidadeMaxDocumento?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Sexo</label>
                          <select class="form-control in text-center" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="sexo" >
                                  <option value="" selected="" disabled="">Selecioone </option> 
                                  <option value="Masculino" >Masculino</option> 
                                  <option value="Femenino" >Feminino</option> 
                              </select>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Morada</label>
                          <input type="text" class="form-control" required autocomplete="no" id="morada" name="morada" value="" maxlength="100">
                        </div>
                      </div>
                      <div class="col-12">
                          <label style="color: #001f3f">Contactos</label>
                          <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" autocomplete="no" id="email" name="email" value="" maxlength="100">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Celular</label>
                          <input type="text" class="form-control" required autocomplete="no" id="contacto" name="contacto" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9">
                        </div>
                      </div>
                  
                      </div>
                    </div>
                    <div class="col col-md-12">
                    <button type="submit" class="btn btn-primary pull-right mt-3 botao">Guardar</button>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                       
                       <?php }else
                        echo '<script>history.back</script>';
                        ?>
                       