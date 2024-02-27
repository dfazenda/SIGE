                        <?php if($_SESSION['nivelAcesso'] <=2){?>
                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Usuários</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Usuários</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Listagem de usuários</li>
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
                                        <h3 class="card-title">Listagem de usuários</h3>
                                       
                                        </div>
                                        
                                        <div class="col-1">
                                        <a href="cadastrar_usuario" class='btn btn-sm btn-primary' title="Adicionar usuário" style='float:right; left:100%;'><h6><b>+</b></h6></a>
                                     </div>
                                    </div>
                                   
                                   
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Nome</th>
                                                        <th class="wd-15p border-bottom-0">Usuário</th>
                                                        <th class="wd-20p border-bottom-0">Nivel de acesso</th>
                                                        <th class="wd-20p border-bottom-0">Acções</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?=$usuario->listar()?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                        <?php } ?>
                       