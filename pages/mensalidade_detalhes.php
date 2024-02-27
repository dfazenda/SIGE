                  <?php

                        $q = isset($_GET['q']) ? $_GET['q'] : '';


                        
                        ?>

                                                    

                      <!-- Row -->

                <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                               
                                    <div class="card-header">
                                    
                                        <div class="coll-11">
                                        <h3 class="card-title">Detalhes das mensalidades</h3>
                                       
                                        </div>
                                      </div>
                                   
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-2">
                                                <thead>
                                                     <tr>
                                                        <th class="wd-15p border-bottom-0">Mês</th>
                                                        <th class="wd-15p border-bottom-0">Valor</th>
                                                        <th class="wd-15p border-bottom-0">Tipo pagamento</th>
                                                        <th class="wd-15p border-bottom-0">Comprovativo</th>
                                                        <th class="wd-20p border-bottom-0">Data depósito</th>
                                                        <th class="wd-20p border-bottom-0">Dias em atraso</th>
                                                        <th class="wd-20p border-bottom-0">Multa</th>
                                                        <th class="wd-20p border-bottom-0">Data pagamento</th>
                                                    </tr>
                                                </thead>
                                                
                                                  <?php 
                                                        $stampAluno = $_GET['stampAluno'];
                                                        echo $gestaoInterna->mensalidadeDetalhes($stampAluno);
                                                    ?>


                                                </tbody>
                                             
                                               
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary pull-right mt-3 w-9 botao gerarPDF" style="margin-left: 90%;" onclick="imprimirPagina()"> 
                                        <span class="fe fe-printer"></span> Imprimir
                                    </button>

                                    <script>
                                        function imprimirPagina() {
                                            window.print();
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                        <!-- End Row 

                        
                       