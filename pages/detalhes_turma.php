                        <?php

                        $q = isset($_GET['q']) ? $_GET['q'] : '';


                        
                        ?>

                                                    

                      <!-- Row -->
                      <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                               
                                    <div class="card-header">
                                    
                                        <div class="coll-11">
                                        <h3 class="card-title">Detalhes da turma</h3>
                                       
                                        </div>
                                      
                                    </div>
                                   
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-2">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Professor</th>
                                                        <th class="wd-15p border-bottom-0">Disciplina </th>
                                                        <th class="wd-15p border-bottom-0">Classe</th>
                                                        <th class="wd-15p border-bottom-0">Turma</th>
                                                        <th class="wd-20p border-bottom-0">Sala</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php 
                                                    $classe = $_GET['classe'];
                                                    $turma = $_GET['turma'];
                                                    echo $gestaoInterna->listarDetalhesTurma($classe,$turma);
                                                    ?>

                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row 
                        
                       