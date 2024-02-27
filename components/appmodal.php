 <div class="modal fade" id="country-selector" style="background-color: red;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="" src="components/assets/images/flags/us_flag.jpg"
                                            class="me-3 language"></span>USA
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/italy_flag.jpg"
                                        class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/spain_flag.jpg"
                                        class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/india_flag.jpg"
                                        class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/french_flag.jpg"
                                        class="me-3 language"></span>French
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/russia_flag.jpg"
                                        class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/germany_flag.jpg"
                                        class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="components/assets/images/flags/argentina.jpg"
                                        class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="components/assets/images/flags/malaysia.jpg"
                                        class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="components/assets/images/flags/turkey.jpg"
                                        class="me-3 language"></span>Turkey
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

            <!-- MODAL EFFECTS -->
    <?php if(@$_SESSION['nivelAcesso'] <=2){?>
    <div class="modal fade modalGerenciamento" id="addClasse">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Adicionar Classe</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_cadastro" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('inserir_classe'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-12">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da classe</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" maxlength="10" value="" class="form-control" autocomplete="no" placeholder="Ex: 10ª">
                        </div>
                       </div>
                    </div>

                    <div class="modal-footer">

                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade modalGerenciamento" id="addTurma">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Adicionar Turma</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_cadastro" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('inserir_turma'). 'f' ?>">
                   <input name='classe' type="hidden" value="<?=$_GET['q']?>">
                    <div class="row">
                      <div class="col-md-9">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da Turma</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" maxlength="15" value="" class="form-control" autocomplete="no" placeholder="Ex: A">
                        </div>
                       </div>
                        <div class="col-md-3">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Ano</label>
                          <input type="number" minlength="4" min="<?=$anoActual?>" max="<?=$anoActual+1?>" required name="ano" maxlength="25" value="<?=$anoActual?>" class="form-control" autocomplete="no" placeholder="AAA">
                        </div>
                       </div>
                        <div class="col-md-6">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Número Minimo de alunos</label>
                          <input type="number" onload="$(this).is('focus');" minlength="1" required name="nrMinAluno" maxlength="15" value="" class="form-control" autocomplete="no">
                        </div>
                       </div>
                        <div class="col-md-6">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Número Máximo de alunos</label>
                          <input type="number" onload="$(this).is('focus');" minlength="1" required name="nrMaxAluno" maxlength="15" value="" class="form-control" autocomplete="no">
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Cadastrar</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>  

        <div class="modal fade modalGerenciamento" id="editarTurma">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Turma</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_edicao" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('editar_turma'). 'f' ?>">
                   <input name='turma' type="hidden" id='turmaID'>
                    <div class="row">
                      <div class="col-md-9">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da Turma</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" id="novoNomeTurma" maxlength="15" value="" class="form-control" autocomplete="no" placeholder="Ex: A">
                        </div>
                       </div>
                        <div class="col-md-3">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Ano</label>
                          <input type="number" minlength="4" disabled min="<?=$anoActual?>" disabled max="<?=$anoActual+1?>" required name="ano" id="novoAno" maxlength="25" class="form-control" autocomplete="no" placeholder="AAA">
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Ok</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>  

    <div class="modal fade modalGerenciamento" id="editarClasse">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Classe</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_edicao_classe" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('editar_classe'). 'f' ?>">
                   <input name='classe' type="hidden" id='classeID'>
                    <div class="row">
                      <div class="col-md-9">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da Classe</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" id="novoNomeClasse" maxlength="15" value="" class="form-control" autocomplete="no" placeholder="">
                        </div>
                       </div>
                      </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Ok</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>  

        <div class="modal fade modalGerenciamento" id="editarSala">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Sala</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_edicao_sala" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('editar_sala'). 'f' ?>">
                   <input name='id' type="hidden" id='salaID'>
                    <div class="row">
                      <div class="col-md-9">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da Sala</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" id="novoNomeSala" maxlength="15" value="" class="form-control" autocomplete="no" placeholder="">
                        </div>
                       </div>
                      </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Ok</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>  


     <div class="modal fade modalGerenciamento" id="eliminarTurma">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_turma'). 'f' ?>">
                   <input name='turma' type="hidden" id='turmaEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar turma</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

    
    <div class="modal fade modalGerenciamento" id="eliminarClasse">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_classe" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_classe'). 'f' ?>">
                   <input name='classe' type="hidden" id='classeEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar classe</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

       <div class="modal fade modalGerenciamento" id="eliminarSala">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_sala" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_sala'). 'f' ?>">
                   <input name='sala' type="hidden" id='salaEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar sala</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

       <div class="modal fade modalGerenciamento w-12" id="eliminarMensalidade">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_mensalidade" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_mensalidade'). 'f' ?>">
                   <input name='stampAluno' type="hidden" id='stampAluno'>
                   <input name='nomeMes' type="hidden" id='nomeMes'>
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Anular mensalidade</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade modalGerenciamento" id="eliminarFuncionario">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_funcionario" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_funcionario'). 'f' ?>">
                   <input name='funcionario' type="hidden" id='funcionarioEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar funcionario</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
     <div class="modal fade modalGerenciamento" id="eliminarUsuario">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_usuario" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_usuario'). 'f' ?>">
                   <input name='usuario' type="hidden" id='usuarioEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar usuário</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>


    <div class="modal fade modalGerenciamento" id="eliminarProfessor">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_professor" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_professor'). 'f' ?>">
                   <input name='professor' type="hidden" id='professorEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar professor</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>


        <div class="modal fade modalGerenciamento" id="eliminarAluno">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
             <div class="modal-body">
                <form class="form_eliminar_aluno" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('eliminar_aluno'). 'f' ?>">
                   <input name='aluno' type="hidden" id='alunoEliminarID'>
                   
                    <div class="row">
                    <div class='col col-sm-12'>
                         <div class="alert alert-danger">
                           <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" fill="#e62a45"></circle><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                            <strong>Eliminar aluno</strong>
                            <hr class="message-inner-separator">
                            <p class='mensagemEliminar'></p>
                        </div>
                      
                    </div>
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Confirmar</button> 
                    
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

        <div class="modal fade modalGerenciamento" id="addSala">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Adicionar Sala</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_cadastro_sala" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('inserir_sala'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-12">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Sala</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" maxlength="30" value="" class="form-control" autocomplete="no" placeholder="Ex: 01">
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade modalGerenciamento" id="atribuirProfessor">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
              
                <div class="modal-body">
                 <form class="form_cadastro" enctype="multipart/form-data">
                    <input name='controlador' type="hidden" value="<?=md5('atribuir_professor'). 'f' ?>">
                    <input name='turma' type="hidden" id='turma' value="<?=$_GET['q']?>">
                    <input name='classe' type="hidden" id='classe' value="<?=$_GET['q']?>">
                    <div class="row">
                        <div class="col-md-9">
                         <div class="form-group bmd-form-group">
                            <select class="form-control in text-center bg-success" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="professor" id="professor">
                                <?=$gestaoInterna->listaDeProfessorSelect('')?>
                            </select>
                            <input type="hidden" name="professorStamp" id="professorStamp" value="<?= isset($_GET['professorStamp']) ? $_GET['professorStamp'] : '' ?>">
                        </div>
                        </div>
                        
                        <div class="col-md-9">
                        <div class="form-group bmd-form-group" >
                            
                          <select class="form-control in text-center bg-secondary" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="disciplina" id="disciplina">
                                  <?=$gestaoInterna->listaDeDisciplinaSelect('')?>
                                  
                              </select>
                        </div>
                      </div>
                        <div class="col-md-9">
                        <div class="form-group bmd-form-group" >
                           
                          <select class="form-control in text-center bg-warning" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="sala" id="sala">
                                  <?=$gestaoInterna->listaDeSalaSelect('')?>
                                  
                           </select>

                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Ok</button>
                    </div>
                </form>


                </div>
                
            </div>
        </div>
    </div>  

  
    <div class="modal fade modalGerenciamento" id="addDisciplina">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Adicionar Disciplina</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_cadastro" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('inserir_disciplina'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-12">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da Disciplina</label>
                          <input type="text" onload="$(this).is('focus');" minlength="5" required name="nome" maxlength="25" value="" class="form-control" autocomplete="no" placeholder="Ex: Matemática">
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

        <div class="modal fade modalGerenciamento" id="matricularAluno">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Matricular aluno</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_matricula" enctype="multipart/form-data">
                   <input name='controlador' id='controlador' type="hidden" value="">
                   <input name='stamp' id='stamp' type="hidden" value="">
                   <input name='classe' id='classe' type="hidden" value="">
                   <div class="row">
                      <div class=" col-md-12">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome do aluno</label>
                          <input type="text" disabled minlength="2" required name="nome" id="nome" maxlength="30" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>
                      <div class=" col-md-6">
                         <div class="form-group bmd-form-group">
                          <a href="" target="_blank" id="anexoDocumento" class="btn btn-sm btn-block btn-primary" >Ver anexo do documento</a>
                        </div>
                       </div>
                       <!--targe="_blank" é para mandar ele abrir numa outra pagina--->
                        <div class=" col-md-6">
                         <div class="form-group bmd-form-group">
                          <a href="" target="_blank"  id="notaInformativa" class="btn btn-sm btn-block btn-success" >Ver nota informativa</a>
                        </a>
                       </div>
                       </div>
                      
                        <div class=" col-md-8">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Número do comprovativo de depósito</label>
                          <input type="number" required onload="$(this).is('focus');" minlength="2" required name="nRecibo" maxlength="110" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>
                          <div class=" col-md-4">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Turma</label>
                            <select required class="form-control in text-center text-primary" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="turma" id="turmaMatricula">
                            <option value="" selected="" disabled="" >Selecioone </option> 
                                                                  
                           </select>
                        </div>
                       </div>
                       <div class="col-md-12">
                       <label for="url_foto" id="lbl_url_foto" class="custom-file-labe text-center"> &nbsp;&nbsp;&nbsp;Selecione o Comprovativo</label>
                          <input type="file" required accept="application/pdf,.jpg" class="form-control custom-file-input in" id="" name="url_comprovativo">
                      </div>
                      <div class="col-12">
                          <label style="color: red; margin-top: 20px;">Informe o valor da matricula e da mensalidade</label>
                          <hr style="width: 100% !important; background: brown; height: 2px">
                      </div>
                        <div class=" col-md-3">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Valor da matricula</label>
                          <input type="number" required onload="$(this).is('focus');" minlength="2" required name="valorMatricula" maxlength="110" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>
                        <div class=" col-md-4">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Valor da mensalidade que irá pagar</label>
                          <input type="number" required onload="$(this).is('focus');" minlength="2" required name="valorMensalidade" maxlength="110" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

    <!------------------Modal de inscricao para aluno interno-------------------------->
    <div class="modal fade modalGerenciamento" id="alunoInternoModal">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><b>Buscar dados doaluno</b></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="buscar_aluno" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('buscar_aluno'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-14">
                         <div class="form-group bmd-form-group">
                         <label>Busque pelo email, telefone ou nº do documento</label>
                          <input type="text" minlength="5" required name="buscaAluno" maxlength="25" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

       <div class="modal fade modalprocurarAluno" id="procurarAlunoModal">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><b>Procurar aluno</b></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="procurar_aluno" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('procurar_aluno'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-14">
                         <div class="form-group bmd-form-group">
                         <label>Busque pelo email, telefone ou nº do documento</label>
                          <input type="text" minlength="5" required name="procurarAluno" maxlength="25" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

    <!--------------------------Fim------------------------------->


     <!-----------------Modal para consultar inscrição-------------------------->
     <div class="modal fade modalGerenciamento" id="consultarInscricaoModal">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><b>Buscar dados doaluno</b></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="consultar_inscricao" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('consultar_inscricao'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-14">
                         <div class="form-group bmd-form-group">
                         <label>Busque pelo email, telefone ou nº do documento</label>
                          <input type="text" minlength="5" required name="buscaAluno" maxlength="25" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>

                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
    <!--------------------------Valor inscricao------------------------------->

        <div class="modal fade modalGerenciamento" id="alterar_senhaModal">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><b>Alterar senha</b></h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="alterar_senha" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('alterar_senha'). 'f' ?>">
                    <div class="row">
                      <div class="col-lg-9 col-md-14">
                         <div class="form-group bmd-form-group">
                         <label>Digite a sua nova</label>
                          <input type="password" minlength="5" required name="senha" id="senha" maxlength="25" value="" class="form-control" autocomplete="no" >
                        </div>
                        <div class="form-group bmd-form-group">
                         <label>Confirmar senha</label>
                          <input type="password" minlength="5" required name="Confsenha" id="Confsenha" maxlength="25" value="" class="form-control" autocomplete="no" >
                        </div>
                       </div>

                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">OK</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>

     <div class="modal fade modalGerenciamento" id="editarTurma">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Turma</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form class="form_edicao" enctype="multipart/form-data">
                   <input name='controlador' type="hidden" value="<?=md5('editar_turma'). 'f' ?>">
                   <input name='turma' type="hidden" id='turmaID'>
                    <div class="row">
                      <div class="col-md-9">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nome da Turma</label>
                          <input type="text" onload="$(this).is('focus');" minlength="1" required name="nome" id="novoNomeTurma" maxlength="15" value="" class="form-control" autocomplete="no" placeholder="Ex: A">
                        </div>
                       </div>
                        <div class="col-md-3">
                         <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Ano</label>
                          <input type="number" minlength="4" disabled min="<?=$anoActual?>" disabled max="<?=$anoActual+1?>" required name="ano" id="novoAno" maxlength="25" class="form-control" autocomplete="no" placeholder="AAA">
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Ok</button> 
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>  


     <!-----------------Modal para consultar inscrição-------------------------->

    <div class="modal fade modalGerenciamento" id="pagarMensalidade">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                
              
                <div class="modal-body">
                <form class="form_mensalidade" enctype="multipart/form-data">
                    <input name='controlador' type="hidden" value="<?=md5('pagar_mensalidade'). 'f' ?>">
                    <input name='mensalidade' type="hidden" id='mensalidadeID'>
                    <input name='q' type="hidden" value="<?=md5($rs['id'])?>">
                    <input type="hidden" id="campoStampAluno" name="stampAluno" value="">
                    <input type="hidden" onload="$(this).is('focus');" minlength="1" required name="valorMensalidade" id="valorMensalidadeID" maxlength="15" value="" class="form-control" autocomplete="no" >
            <div class="col-12" style="margin-bottom: 0;">
                <label style="color: red; margin-bottom: 0;"><i>Dados do aluno</i></label>
                <hr style="width: 100% !important; background: #001f3f; height: 2px; margin-top: 0;">
            </div>
                <div class="col-md-12">
                <div style="display: inline-block; margin-right: 10px;width: 100px;">
                    <label class="bmd-label-floating">Nº do aluno</label>
                    <input type="text" id="idAluno" name="id" value="" class="form-control" readonly>
                </div>

                <div style="display: inline-block; margin-right: 10px;">
                    <label class="bmd-label-floating">Nome do aluno</label>
                    <input type="text" id="campoNomeAluno" name="nome" value="" class="form-control" readonly>
                </div>

                <div style="display: inline-block;width: 100px;">
                    <label class="bmd-label-floating">Classe </label>
                    <input type="text" id="campoClasseAluno" name="classe" value="" class="form-control" readonly>
                </div>
            </div><br>
             <div class="col-12" style="margin-bottom: 0;">
                <label style="color: red; margin-bottom: 0;"><i>Detalhes do pagamento</i></label>
                <hr style="width: 100% !important; background: #001f3f; height: 2px; margin-top: 0;">
            </div>
            <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: inline-block; width: 250px;">
                <label class="bmd-label-floating" for="aluno_id">Nº de comprovativo:</label>
                <input class="form-control" type="text" name="nrDoRecibo" ><br>
            </div>
            <div style="display: inline-block; width: 300px; margin-left: 10px;margin-top: -20px;">
                <label for="url_foto" id="lbl_url_foto" class="custom-file-labe text-center"> Comprovativo</label>
                <input type="file" required accept="application/pdf,.jpg" class="form-control custom-file-input in" id="url_comprovativo" name="url_comprovativo">
            </div>
        </div>
        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center;">
             <div style="display: inline-block; width: 250px;">
                <label class="bmd-label-floating">Data de depósito</label>
                <input type="text" onfocus="(this.type = 'date')" required onblur="(this.type = 'text')" id="dob" name="dataDeDeposito" value="" min="" max="" class="form-control">
            </div>
            <div style="display: inline-block; width: 250px; margin-left: 10px;">
                <label class="bmd-label-floating">Valor a pagar</label>
                 <input type="number" id="campoValorMensalidade" name="valorMensalidade" value="" class="form-control" readonly>
            </div>

        </div>
            <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center;">
           <div class="form-group" style="display: inline-block; width: 250px;">
                <label class="form-label" for="nomeMes">Pagamanto referente ao mês de:</label>
                <select class="form-control in text-center"  style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="nomeMes" >
                    <option value="" selected="" disabled="">Selecioonar o mês</option> 
                    <option value="Fevereiro" >Fevereiro</option> 
                    <option value="Marco" >Marco</option> 
                    <option value="Abril" >Abril</option> 
                    <option value="Maio" >Maio</option> 
                    <option value="Junho" >Junho</option> 
                    <option value="Julho" >Julho</option> 
                    <option value="Agosto" >Agosto</option> 
                    <option value="Setembro" >Setembro</option> 
                    <option value="Outubro" >Outubro</option> 
                    <option value="Novembro">Novembro</option> 
                </select>
                </div>
                <div class="form-group" style="display: inline-block; width: 270px;margin-left: 10px;">
                    <label class="form-label" for="tipoPagamento">Tipo de pagamento</label>
                 <select class="form-control in text-center"  style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF" name="tipoPagamento">
                    <option value="" selected="" disabled="">Selecioonar tipo de pagamento</option> 
                    <option value="deposito" >Depósito</option> 
                    <option value="pos" >POS</option> 
                    <option value="transferencia" >Transferência</option> 
                    <option value="numerario" >Numerário</option>
                </select> 
               </div>
           </div>
             <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center;">
           <div class="form-group" style="display: inline-block; width: 250px;">
                <label class="form-label" for="diasDeAtraso">Dias em atraso</label>
               <input type="text" id="campoDiasDeAtraso" name="diasDeAtraso" value="" class="form-control" readonly>
                </div>
                <div class="form-group" style="display: inline-block; width: 270px;margin-left: 10px;">
                    <label class="form-label" for="multa">Multa</label>
                 <input type="number" id="campoMulta" name="multa" value="" class="form-control" readonly>
               </div>
           </div>

                <input type="submit" class="btn btn-lg btn-primary" value="Pagar">
                 </form>

                </div>

            </div>
        </div>
    </div>
    <!--------------------------Fim------------------------------->

    <!----------------------MensalidadeDetalhes------------------------->
    <div class="modal fade modalGerenciamento w-12" id="MensalidadeDetalhes" >
        <div class="modal-dialog modal-dialog-centered " role="document" >
            <div class="modal-content modal-content-demo" style="min-width: 1000px;">
                
              <center><h4>Detales do aluno</h4></center>
                <div class="modal-body w-12">
                <form class="form_mensalidade w-12" enctype="multipart/form-data">

                        <div class="card-body">
                                        <div class="table-responsive">
                                            <button class="btn btn-primary btn-sm pull-right mt-3 botao" style="margin-left: 15px;"><i class="fe fe-printer" title="Recibo"> Recibo</i></a></button>
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-2" style="min-width: 1000px;">
                                                <thead style="min-width: 100%;">
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Nome Completo</th>
                                                        <th >Classe </th>
                                                        <th >Nº do Recibo</th>
                                                        <th >Mês</th>
                                                        <th >Valor</th>
                                                        <th style="min-width: 100px;">Data</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>                                               
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-------------------criarUsuario--------------------------------->
        <div class="modal fade modalprocurarAluno " id="criarUsuario" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-body">
                        <form class="form_criar_usuario" enctype="multipart/form-data" >
                            <input name='controlador' type="hidden" value="<?= md5('criar_usuario') . 'f' ?>">
                            <input name='nome' type="hidden" value="">
                            <input name='email' type="hidden" value=""> 
                            <input name='stamp' type="hidden" value="">
                                <div class="row">
                                <div class="col-lg-6 col-md-4">
                                    <div class="form-group bmd-form-group">
                                     <label>Nivel de acesso</label>
                                      <select class="form-control in" required style="color: #001f3f; text-align-last: left;" name=" nivelAcesso" >
                                      <option value="" selected='' disabled=''>Escolher nivel de acesso</option>
                                      <option class="text-center" value="1" >1</option>
                                      <option class="text-center" value="2" >2</option> 
                                     </select>
                                    </div>
                        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </div>
                            <div class="error-message"></div> <!-- Error message area -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!--------------------------Fim------------------------------->

         <div class="modal fade modalprocurarAluno" id="gerarRecibo">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-body">
                        <form class="form_gerar_recibo" enctype="multipart/form-data" action="gerar_pdf.php" method="POST">
                            <input name='controlador' type="hidden" value="<?= md5('gerar_recibo') . 'f' ?>">

                            <div class="row">
                                <div class="col-lg-9 col-md-14">
                                    <div class="form-group bmd-form-group">
                                        <label>Nº do comprovativo</label>
                                        <input type="number" minlength="5" required name="recibo" maxlength="25" value=""
                                            class="form-control" autocomplete="no">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </div>
                            <div class="error-message"></div> <!-- Error message area -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade modalprocurarAluno" id="gerarExcel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-body">
                        <form class="form_gerar_recibo" enctype="multipart/form-data" action="gerar_excel.php" method="POST">
                            <input name='controlador' type="hidden" value="<?= md5('gerar_excel') . 'f' ?>">

                            <div class="row">
                                <div class="col-lg-9 col-md-14">
                                    <div class="form-group bmd-form-group">
                                        <label>Classe</label>
                                        <select class="form-control in" required style="color: #001f3f; text-align-last: left;" name=" classe" >
                                      <option value="" selected='' disabled=''>Selecione a classe</option>
                                      <option value="1" >1</option> 
                                      <option value="2" >2</option> 
                                      <option value="3" >3</option> 
                                      <option value="4" >4</option> 
                                      <option value="5" >5</option> 
                                      <option value="6" >6</option> 
                                      <option value="7" >7</option> 
                                      <option value="8" >8</option> 
                                      <option value="9" >9</option> 
                                      <option value="10" >10</option> 
                                      <option value="11" >11</option> 
                                      <option value="12" >12</option> 
                                     </select>
                                    </div>
                        
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-lg-9 col-md-14">
                                    <div class="form-group bmd-form-group">
                                        <label>Turma</label>
                                        <select class="form-control in" required style="color: #001f3f; text-align-last: left;" name=" turma" >
                                      <option value="" selected='' disabled=''>Selecione a turma</option>
                                      <option value="A" >A</option> 
                                      <option value="B" >B</option> 
                                      <option value="C" >C</option> 
                                      <option value="D" >D</option> 
                                      </select>
                                    </div>
                        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </div>
                            <div class="error-message"></div> <!-- Error message area -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="modal fade modalInformacaoAluno" id="informacaoAluno">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-body">
                        <form class="form_gerar_recibo" enctype="multipart/form-data" action="aluno_encarregado.php" method="POST">
                            <input name='controlador' type="hidden" value="<?= md5('informacao_aluno') . 'f' ?>">

                            <div class="row">
                                <div class="col-lg-9 col-md-14">
                                    <div class="form-group bmd-form-group">
                                        <label>contacto</label>
                                        <input type="number" minlength="5" required name="contacto" maxlength="25" value="" class="form-control" autocomplete="no">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </div>
                            <div class="error-message"></div> <!-- Error message area -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php } ?>

        <div class="modal fade modalGerenciamento" id="lancarNota">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
              <label>Lançamento de notas</label>
                <div class="modal-body">
                 <form class="form_cadastro" enctype="multipart/form-data">
                    <input name='controlador' type="hidden" value="<?=md5('lancar_nota'). 'f' ?>">
                    <input name='turma' type="hidden" id='turma' value="<?=$_GET['q']?>">
                    <input name='classe' type="hidden" id='classe' value="<?=$_GET['q']?>">
                    <div class="row">
                       <!-----Trabalhar aqui
                        Ao criar a tabela de trimestres, deve conter os camos ACS1, ACS2....

                        ------->
                    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Ok</button>
                    </div>
                </form>


                </div>
                
            </div>
        </div>
    </div>  







    

       