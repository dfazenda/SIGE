
                        <?php

                          $id = $_GET['q'];
                          $rs = $funcionario -> verDadosFuncionario($id);
                          if(!is_array($rs))
                          echo '<meta http-equiv="refresh" content="0;url=funcionarios">';

                        ?>

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Funcionário</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Funcionário</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dados do funcionário</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                      <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                            <div class="card-header">
                                    
                                    <div class="coll-11 p-0">
                                    <h3 class="card-title">Dados do funcionário</h3>
                                   
                                    </div>
                                    
                                    <div class="col-1 p-0">
                                    <a href="#" id='editarFuncionario' class='btn btn-sm btn-primary' style='float:right; left:100%;'><h6><b><i title="Editar" class="fa fa-pencil"></i></b></h6></a>
                                 </div>
                                </div>
                               
                   <div class="card-body" style="">
                  <form class="form_edicao" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('alterar_funcionario'). 'f' ?>">
                    <input name='q' type="hidden" value="<?=md5($rs['id'])?>">
                    <div class="row">
                      <div class="col-md-3">
                        <img id="output" style="cursor: pointer;" title="Clique para escolher" src="<?=str_replace('../','',$rs['foto'])?>" class="img-responsive col-12" ></img>
                          <label for="url_foto" id="lbl_url_foto" class="custom-file-labe text-center">&nbsp;&nbsp;&nbsp;Selecione a Foto</label>
                          <input type="file" accept="image/*" class="form-control custom-file-input in" id="url_foto" name="foto" onchange="loadFile(event)">
                      </div>
                      <div class="col-lg-9 col-md-9">
                      <label style="color: #001f3f"><b>Dados Pessoais</b></label>
                      <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome Completo</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" required name="nome" maxlength="70" value="<?=$rs['nome']?>" class="form-control" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-3" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Data de nascimento</label>
                          <input type="text" onfocus="(this.type = 'date')" required onblur="(this.type = 'text')" id="dob" name="dataDeNascimento" value="<?=$rs['dataDeNascimento']?>" max="" min="" max="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5" >
                        <label class="bmd-label-floating">Documento</label>
                        <div class="input-group ">
                          
                          <select class="form-control in" required style="color: #001f3f; text-align-last: left;" name=" tipoDeDocumento" >
                              <option <?php if ($rs['tipoDeDocumento']=='') echo 'selected=""'?> value=""  disabled=''>Tipo de documento</option>
                              <option <?php if ($rs['tipoDeDocumento']=='Bilhete de identidade') echo 'selected=""'?> value="Bilhete de identidade" >Bilhete de identidade</option> 
                              <option <?php if ($rs['tipoDeDocumento']=='Carta de ConduÃ§Ã£o') echo 'selected=""'?> value="Carta de ConduÃ§Ã£o" >Carta de Condução</option> 
                              <option <?php if ($rs['tipoDeDocumento']=='Passaporte') echo 'selected="'?> value="Passaporte" >Passaporte</option> 
                              <option <?php if ($rs['tipoDeDocumento']=='Cédula Pessoal') echo 'selected=""'?> value="Cédula Pessoal" >Cédula Pessoal</option> 
                          </select>
                          <input type="text" class="form-control" minlength="10" required name="numeroDeDocumento" maxlength="13" value="<?=$rs['numeroDeDocumento']?>" placeholder="Nº de Documento" autocomplete="no">
                        </div>
                      </div>
                   

                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Local de Emissão</label>
                          <input type="text" id="locala_emissao_doc" required name=" localDeEmissao" maxlength="50" value="<?=$rs['localDeEmissao']?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Data de Emissão</label>
                          <input type="text" onfocus="(this.type = 'date')" required onblur="(this.type = 'text')" id="data_emissao_doc" name="data_emissao_doc" value="<?=$rs['data_emissao_doc']?>" max="" min="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Sexo</label>
                          <select class="form-control in text-center" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="sexo" >
                                  <option <?php if ($rs['sexo']=='') echo 'selected=""'?> value="" selected="" disabled="">Selecioone </option> 
                                  <option <?php if ($rs['sexo']=='Masculino') echo 'selected=""'?> value="Masculino" >Masculino</option> 
                                  <option <?php if ($rs['sexo']=='Femenino') echo 'selected=""'?> value="Femenino" >Feminino</option> 
                              </select>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Morada</label>
                          <input type="text" class="form-control" required autocomplete="no" id="morada" name="morada" value="<?=$rs['morada']?>" maxlength="100">
                        </div>
                      </div>
                      <div class="col-12">
                          <label style="color: #001f3f">Contactos</label>
                          <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" autocomplete="no" id="email" name="email" value="<?=$rs['email']?>" maxlength="100">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Celular</label>
                          <input type="text" class="form-control" required autocomplete="no" id="contacto" name="contacto" value="<?=$rs['contacto']?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9">
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
                        <style>
                          img{
                            border-radius: 10%;
                            max-width: 200px;min-width: 200px;
                            max-height: 200px;min-height: 200px;
                          }
                        </style>

                       