                        <?php

                        $q = isset($_GET['q']) ? $_GET['q'] : '';


                        
                        ?>

                                                    

                      <!-- Row -->
                      <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                               
                                    <div class="card-header">
                                    
                                        <div class="coll-11">
                                        <h3 class="card-title">Listagem de alunos</h3>
                                       
                                        </div>
                                        <?php if($_SESSION['nivelAcesso'] <=2){?>
                                        <div class="col-1">
                                        <a href="cadastrar_aluno" class='btn btn-sm btn-primary' title="Adicionar aluno" style='float:right; left:100%;'><h6><b>+</b></h6></a>
                                        
                                     </div>
                                   <button class="btn btn-primary pull-right mt-3 botao gerarExcel"
                                            style="margin-left: 700px;"><a href='#' data-toggle="modal" data-target="" class="text-white text-center" style="text-decoration: none;"> <i class="ti-write " title="Recibo"></i> Gerar excel</a>
                                    </button>
                                    
                                     <?php } ?>
                                    </div>
                                   
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-2">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Nome Completo</th>
                                                        <th class="wd-15p border-bottom-0">Celular </th>
                                                        <!--<th class="wd-15p border-bottom-0">Email </th>--->
                                                        <th class="wd-15p border-bottom-0">Data de Nascimento</th>
                                                        <th class="wd-15p border-bottom-0">Turma</th>
                                                        <th class="wd-20p border-bottom-0">Acções</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <?php if($_SESSION['nivelAcesso'] <=2 ){?>
                                                <tbody>
                                                 <?=$aluno->listar($q)?>
                                                </tbody>
                                                <?php } ?>
                                                <?php if($_SESSION['nivelAcesso'] ==3 ){?>
                                                <tbody>
                                                    <?=$aluno->listarAlunos($q)?>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row 
                        
                       