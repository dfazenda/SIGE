                        <?php if($_SESSION['nivelAcesso'] <=2){?>
                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Funcionários</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Funcionários</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Listagem de funcionários</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                      <!-- Row -->
                      <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                               
                                    <div class="card-header">
                                    
                                        <div class="coll-11">
                                        <h3 class="card-title">Listagem de funcionários</h3>
                                       
                                        </div>
                                        
                                        <div class="col-1">
                                        <a href="cadastrar_fucnionario" class='btn btn-sm btn-primary' title="Adicionar funcionário" style='float:right; left:100%;'><h6><b>+</b></h6></a>
                                     </div>
                                     
                                    </div>
                                   
                                   
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-2">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Nome Completo</th>
                                                        <th class="wd-15p border-bottom-0">Celular </th>
                                                        <th class="wd-15p border-bottom-0">Email </th>
                                                        <th class="wd-15p border-bottom-0">Data de Nascimento</th>
                                                        <?php if($_SESSION['nivelAcesso'] <=2){?>
                                                        <th class="wd-20p border-bottom-0">Acções</th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                             
                                                <?=$funcionario->listarFuncionario()?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->

                       <?php } ?>