                

                         <?php
                       if (!isset($_SESSION)) {
                            session_start();
                            }
                       $q = isset($_GET['q']) ? $_GET['q'] : '';
                        ?>


                         <!-- PAGE-HEADER -->
                         <div class="page-header">
                             <h1 class="page-title " style="color: #f60;"><b>Listagem das mensalidades e notas das avaliações</b></h1>
                             <div>
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="javascript:void(0)">Minha informação</a></li>
                                     <li class="breadcrumb-item active" aria-current="page">Mensalidades pagas</li>
                                 </ol>
                             </div>
                         </div>

                                                                                   

                         <!-- PAGE-HEADER END -->

                         <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                              
                                    <div class="card-body">
                                            
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-1">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 300px;">Nome do aluno</th>
                                                        <th>Classe </th>
                                                        <th>Matr</th>
                                                        <th>Fev &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Mar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Abr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Mai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Jun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Jul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Ago &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Set &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Out &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Nov &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Dez &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </th>
                                                        <th >Colecta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?=$gestaoInterna->mensalidadeDoAluno($q)?>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="container bg-secondary">
                                  <h3 class="text-center text-danger">Notas das avaliações</h3>
                                  <p style="font-size: 16px;color:#010;">Aqui estão as suas notas. Qualquer dúvida contacte o professor da disciplina.</p>
                                  </div>
                            </div>
                        </div>


                    

                       


                      
