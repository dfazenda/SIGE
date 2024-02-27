                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function () {
                                $("#ver-tabela-link").on("click", function (e) {
                                    e.preventDefault();

                                    // Send an AJAX request to the server to generate the PDF
                                    $.ajax({
                                        url: 'generate_pdf.php', // Replace with the actual path to your PHP script
                                        method: 'POST',
                                        data: { generate_pdf: true },
                                        success: function (response) {
                                            // Handle the PDF generation success
                                            // You can open the PDF in a new window or display a success message
                                            // Here, we'll open the PDF in a new window
                                            window.open(response, '_blank');
                                        },
                                        error: function (xhr, status, error) {
                                            // Handle errors if PDF generation fails
                                            console.error(error);
                                            // You can display an error message to the user
                                        }
                                    });
                                });
                            });
                        </script>

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Formulário de Inscrição</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Inscrição</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Formulário de Inscrição</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                      <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                              <div class="card-header bg-secondary">
                                   
                                  <div class="col-11 ">
                                  <form action="informacao_preco.php" method="post" id="pdf-form" >
                                  <button type="submit" class="btn btn-primary pull-right mt-3 botao" style="min-width: 150px; margin-right: -120px;">
                                      <i class="fe fe-eye" title="matricula e mensalidade"></i> Ver tabela de preços
                                  </button>
                                  </form> 
                                  <h4 style="margin-left: 520px; color: red;">Antes de fazer inscrição, veja a tabela de preços <i class="fa fa-hand-o-right"></i></h4><br>

                                       <h3 class="card-title ">Depois de efectuar a inscrição, automaticamente será baixado um pdf com informações para o magamento da matricula.</h3>
                                  </div>

                                </div>

                   <div class="card-body" style="">
                  <form class="form_cadastro_inscricao" enctype="multipart/form-data" >
                   <input name='controlador' type="hidden" value="<?=md5('inserir_inscricao'). 'f' ?>">
                   <input type="text" name="interno" hidden id="interno" maxlength="70" value="0" class="form-control" autocomplete="no">
                        
                    <div class="row">
                      <div class="col-md-3">
                        <img id="output" style="cursor: pointer;" title="Clique para escolher" src="components/assets/images/user.png" class="img-responsive col-12" ></img>
                          <label for="url_foto" id="lbl_url_foto" class="custom-file-labe text-center"> &nbsp;&nbsp;&nbsp;Selecione a Foto</label>
                          <input type="file" accept="image/*" class="form-control custom-file-input in" id="url_foto" name="foto" onchange="loadFile(event)">
                      </div>
                      <div class="col-lg-9 col-md-9">
                      <label style="color: red;"><b>Dados do aluno</b></label>
                      <button type="button" id='consultarInscricao' class="btn btn-secondary btn-sm pull-right"><b>Consultar inscrição</b></button>
                       <button type="button" id='alunoInterno' class="btn btn-warning btn-sm pull-right"><b>Sou aluno interno</b></button>
                      <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome Completo</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" required name="nome" id="nome" maxlength="70" value="" class="form-control" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-3" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Data de nascimento</label>
                          <input type="text" onfocus="(this.type = 'date')" required onblur="(this.type = 'text')" id="dataDeNascimento" name="dataDeNascimento" value="" min="" max="<?=$dataIdadeMinAluno?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5" >
                        <label class="bmd-label-floating">Documento</label>
                        <div class="input-group ">
                          
                          <select class="form-control in" required style="color: #001f3f; text-align-last: left;" name="tipoDeDocumento" id="tipoDeDocumento">
                              <option value="" selected='' disabled=''>Tipo de documento</option>
                              <option value="Bilhete de identidade" >Bilhete de identidade</option> 
                              <option value="Carta de ConduÃ§Ã£o" >Carta de Condução</option> 
                              <option value="Passaporte" >Passaporte</option> 
                              <option value="Bilhete de identidade" >Cédula Pessoal</option> 
                          </select>
                          <input type="text" class="form-control" minlength="10" required name="numeroDeDocumento" id="numeroDeDocumento" maxlength="13" value="" placeholder="Nº de Documento" autocomplete="no">
                        </div>
                      </div>
                   

                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Local de Emissão</label>
                          <input type="text" id="locala_emissao_doc" required name=" localDeEmissao" id=" localDeEmissao" maxlength="50" value=""class="form-control">
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
                          <select class="form-control in text-center" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="sexo" id="sexo">
                                  <option value="" selected="" disabled="">Selecioone </option> 
                                  <option value="Masculino" >Masculino</option> 
                                  <option value="Femenino" >Feminino</option> 
                              </select>
                        </div>
                      </div>

                        <div class="col-md-2">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Nacionalidade</label>
                          <select class="form-control in text-center" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="nacionalidade" id="nacionalidade">
                                  <option value="" selected="" disabled="">Selecioone </option> 
                                  <option value="Mocambicana" >Mocambicana</option> 
                                  <option value="Estrangeira" >Estrangeira</option> 
                              </select>
                        </div>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Naturalidade</label>
                          <input type="text" id="locala_emissao_doc" required name=" naturalidade" maxlength="50" value=""class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Morada</label>
                          <input type="text" class="form-control" required autocomplete="morada" id="morada" name="morada" value="" maxlength="100">
                        </div>
                      </div>
                      <div class="col-12">
                          <label style="color: red;"><i>Dados do Encarregado de Educação</i></label>
                          <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      </div>
                   
                       <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome:</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" required name="nomeEncarregado" maxlength="70" value="" class="form-control" autocomplete="no">
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Local de trabalho:</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" required name="localDeTrabalho" maxlength="70" value="" class="form-control" autocomplete="no">
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Função:</label>
                          <input type="text" onload="$(this).is('focus');" minlength="7" id="funcao" name="funcao" maxlength="70" value="" class="form-control" autocomplete="no">
                        </div>
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
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Celular alternativo</label>
                          <input type="text" class="form-control" required autocomplete="no" id="contactoAlternativo" name="contactoAlternativo" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9">
                        </div>
                      </div>
                       <div class="col-12">
                          <label style="color: red;"><i>Informações escolares</i></label>
                          <hr style="width: 100% !important; background: #001f3f; height: 2px">
                      </div>
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Classe</label>
                          <select class="form-control in text-center" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="classe" id="classe">
                                  
                                  <?=$gestaoInterna->listaDeClassesSelect('')?>
                                  
                              </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-sm-8 mb-4 mb-lg-0" title="Carregue aqui o anexo do Documento da inscrição">
                        <label class="bmd-label-floating">Declaração de notas ou Certificado</label>
                        <div class="dropify-wrapper">
                          <div class="dropify-message"><span class="file-icon"> <p>Carregue ficheiro ao clicar aqui</p></span>
                            <p class="dropify-error">Ooops, houve um erro.</p>
                          </div>
                          <div class="dropify-loader"></div>
                          <div class="dropify-errors-container">
                            <ul></ul>
                          </div>
                          <input type="file" class="dropify" data-bs-height="180" name="anexoDocumento">
                          <button type="button" class="dropify-clear">Remove</button>
                          <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos">
                          <div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p>
                          </div>
                        </div>
                        </div>
                      </div>
                      </div>

                        <div class="col-lg-4 col-sm-8 mb-4 mb-lg-0" id="notaInformativaDiv" title="Carrague aqui a nota informatica ou certificadio da classe anterior, se for anulo externo">
                        <label class="bmd-label-floating ">Documento da inscrição (BI ou Cédula) </label>
                        <div class="dropify-wrapper">
                          <div class="dropify-message"><span class="file-icon"> <p>Carregue ficheiro ao clicar aqui</p></span>
                            <p class="dropify-error">Ooops, houe um erro.</p>
                          </div>
                          <div class="dropify-loader"></div>
                          <div class="dropify-errors-container">
                            <ul></ul>
                          </div>
                          <input type="file" class="dropify" data-bs-height="180" name="notaInformativa" required id="notaInformativa">
                          <button type="button" class="dropify-clear">Remove</button>
                          <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos">
                          <div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p>
                          </div>
                        </div>
                        </div>
                      </div>
                      </div>
                    </div><br>
                    
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

                       