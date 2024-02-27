                         <?php
                        $q = isset($_GET['q']) ? $_GET['q'] : '';

                        ?>



                         <?php if($_SESSION['nivelAcesso'] <=2){?>
                         <!-- PAGE-HEADER -->
                         <div class="page-header">
                             <h1 class="page-title " style="color: #f60;"><b>GESTÃO DE MENSALIDADES</b></h1>
                             <div>
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="javascript:void(0)">Gestão Interna</a></li>
                                     <li class="breadcrumb-item active" aria-current="page">Mensalidades</li>
                                 </ol>
                             </div>
                         </div>

                         <!-- ROW-1 -->
                         <div class="row">
                            <?php
                            $matriculaValue = $gestaoInterna->coleta_matricula();
                            $mensalidadeValue = $gestaoInterna->coleta_mensalidade();
                            $anualValue = $gestaoInterna->coleta_total_anual();
                            ?>
                             <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2 ">
                                <div class="card bg-warning">
                                    <div class="card-body">
                                        <div class="widget text-center">
                                            <h3 class="mb-2 mt-0"><?=$formattedValue = number_format($matriculaValue, 2, ',', '.');?></h3>
                                            <div id="circle-1" class="mt-3 mb-3 chart-dropshadow-success"><canvas width="30" height="30" style="height: 30px; width: 30px;"></canvas></div>
                                            <div  class="chart-circle-value-3 text-success fs-20 "><h1 style="border: 1px solid white;border-radius: 50%;"><i class="mdi mdi-currency-usd"></i></h1></div>
                                            <p class="mb-0 text-start"><span class="dot-label bg-success me-2"></span>G. em matriculas <span class="float-end">anual em meticais</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2 ">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="widget text-center">
                                                <h3 class="mb-2 mt-0"><?=$formattedValue = number_format($mensalidadeValue, 2, ',', '.');?></h3>
                                                <div id="circle-1" class="mt-3 mb-3 chart-dropshadow-success"><canvas width="30" height="30" style="height: 30px; width: 30px;"></canvas></div>
                                                <div class="chart-circle-value-3 text-danger fs-20 "><h1 style="border: 1px solid white;border-radius: 50%;"><i class="mdi mdi-currency-usd"></i></h1></div>
                                                <p class="mb-0 text-start"><span class="dot-label bg-danger me-2"></span>Ganhos mensais <span class="float-end">anual em meticais</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2 ">
                                <div class="card bg-danger">
                                    <div class="card-body">
                                        <div class="widget text-center">
                                            <h3 class="mb-2 mt-0"><?=$formattedValue = number_format($anualValue, 2, ',', '.');?></h3>
                                            <div id="circle-1" class="mt-3 mb-3 chart-dropshadow-success"><canvas width="30" height="30" style="height: 30px; width: 30px;"></canvas></div>
                                            <div class="chart-circle-value-3 text-success fs-20 "><h1 style="border: 1px solid white;border-radius: 50%;"><i class="mdi mdi-currency-usd"></i></h1></div>
                                            <p class="mb-0 text-start"><span class="dot-label bg-success me-2"></span>Total de ganhos <span class="float-end">anual em meticais</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3 col-lg-1 col-xl-6 bg-light" >
                            <div class="card img-card bg-info" >
                                <div style="width: 530px; height: 180px;">
                                <canvas id="grafico" width="530" height="180"></canvas>
                                <center><p>Ganhos em mensalidades por cada mês</p></center>
                                </div>
                                </div>

                            </div>

                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                         <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels"></script>
                         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                            <script>
                                  // Dados dos meses e valores (substitua pelos seus dados reais)
                            var meses = ["Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
                            var valores = [
                                [<?=$gestaoInterna->coleta_de_fevereiro()?>, 
                                            <?=$gestaoInterna->coleta_de_marco()?>, 
                                            <?=$gestaoInterna->coleta_de_abril()?>, 
                                            <?=$gestaoInterna->coleta_de_maio()?>, 
                                            <?=$gestaoInterna->coleta_de_junho()?>, 
                                            <?=$gestaoInterna->coleta_de_julho()?>, 
                                            <?=$gestaoInterna->coleta_de_agosto()?>, 
                                            <?=$gestaoInterna->coleta_de_setembro()?>, 
                                            <?=$gestaoInterna->coleta_de_outubro()?>, 
                                            <?=$gestaoInterna->coleta_de_novembro()?>, 
                                            <?=$gestaoInterna->coleta_de_dezembro()?>]
                                // Adicione mais arrays de dados para empilhar as barras
                            ];

                            var ctx = document.getElementById('grafico').getContext('2d');

                            var data = {
                                labels: meses.map(month => month[0]), // Usar apenas a primeira letra dos meses
                                datasets: []
                            };

                            // Adicione um conjunto de dados para cada conjunto de valores
                            for (var i = 0; i < valores.length; i++) {
                                var backgroundColors = valores[i].map((_, index) => getBackgroundColor(index)); // Obter cores para as barras

                                var dataset = {
                                    label: 'Conjunto ' + (i + 1),
                                    data: valores[i],
                                    backgroundColor: backgroundColors, // Cores de preenchimento das barras
                                    borderColor: 'rgba(0, 0, 0, 1)', // Cor da borda das barras
                                    borderWidth: 1,
                                    stack: 'Stack 1' // Identificador de pilha (para empilhar barras)
                                };

                                data.datasets.push(dataset);
                            }

                            function getBackgroundColor(index) {
                                // Defina as cores aqui para cada barra
                                var cores = [
                                    'rgba(0, 123, 255, 0.7)',
                                    'rgba(255, 0, 0, 0.7)',
                                    'rgba(0, 255, 0, 0.7)',
                                    'rgba(255, 123, 0, 0.7)',
                                    'rgba(123, 0, 255, 0.7)',
                                    'rgba(0, 255, 255, 0.7)'
                                    // Adicione mais cores conforme necessário
                                ];

                                return cores[index % cores.length];
                            }

                            var options = {
                                responsive: false, // Desativar responsividade para definir largura e altura fixas
                                maintainAspectRatio: false, // Manter a proporção de aspecto
                                scales: {
                                    x: {
                                        stacked: true // Empilhar barras no eixo X
                                    },
                                    y: {
                                        stacked: true // Empilhar barras no eixo Y
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false // Não mostrar a legenda
                                    }
                                }
                            };

                            var myStackedBarChart = new Chart(ctx, {
                                type: 'bar', // Tipo de gráfico de barras
                                data: data,
                                options: options
                            });
                        
                            </script>
                                                                    

                         <!-- PAGE-HEADER END -->
                         <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                // Adiciona um ouvinte de evento ao item selecionado no dropdown
                                $(".dropdown-menu").on("click", function () {
                                    // Obtém o valor do item clicado
                                    var classeSelecionada = $(this).text();

                                    // Atualiza a tabela de mensalidades com base na classe selecionada
                                    atualizarTabelaMensalidade(classeSelecionada);
                                });

                                // Função para atualizar a tabela de mensalidades
                                function atualizarTabelaMensalidade(classe) {
                                    // Realiza uma solicitação AJAX para obter os dados dos alunos com base na classe
                                    $.ajax({
                                        type: "POST",
                                        url: "listar.php", // Substitua pelo caminho do seu script PHP que retorna os dados dos alunos
                                        data: { classe: classe },
                                        success: function (data) {
                                            // Atualiza o conteúdo da tabela com os dados retornados
                                            $("tbody").html(data);
                                        },
                                        error: function () {
                                            console.error("Erro ao obter dados dos alunos.");
                                        }
                                    });
                                }
                            });
                        </script>

                         <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                         <!-- Campo de Pesquisa -->
                                        <div class="form-group w-40">
                                            <input type="text" class="form-control" id="campoPesquisa" placeholder="Pesquisar aluno...">
                                        </div>
                                          <div class="col-md-3" style="float: right;margin-left: 400px;">
                                        <div class="form-group bmd-form-group" >
                                          
                                          <select class="form-control in text-center" required style="color: #001f3f; text-align-last: left; border-bottom-color: #FFF; 10px;border: 1px solid red;" name="classe" id="classe">
                                                  
                                                  <?=$gestaoInterna->listaDeClassesSelect('')?>
                                                  
                                              </select>
                                           
                                        </div>
                                      </div>
                                       <button class="btn btn-primary pull-right mt-3 botao gerarRecibo" style="margin-bottom: 30px;"><a href='#' data-toggle="modal" data-target="" class="text-white text-center" style="text-decoration: none;"> <i class="fe fe-printer " title="Recibo"></i> Recibo</a></button>
                                        
                                    </div>
                                    <div class="btn-group" role="group">
                                        
                                        <ul class="dropdown-menu" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0)">1</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">2</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">3</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">5</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">6</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">7</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">8</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">9</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">10</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">11</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">12</a></li>
                                        </ul>
                                    </div>
                                
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom dadTable no-footer dtr-inline collapsed tabela-responsiva-1">
                                                 <thead>
                                                    <tr>
                                                        <th style="width: 300px;">Nome do aluno</th>
                                                        <th>Cla </th>
                                                        <th>Mat</th>
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
                                                            Dez 
                                                        </th>
                                                        <th>GA</th>
                                                        <th>Dt</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?=$gestaoInterna->mensalidade($q)?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        <script>
                        function filtrarAlunos() {
                            var input, filtro, tabela, linhas, celula, i, j;
                            input = document.getElementById("campoPesquisa");
                            filtro = input.value.toUpperCase();
                            tabela = document.querySelector(".tabela-responsiva-1");
                            linhas = tabela.getElementsByTagName("tr");

                            for (i = 1; i < linhas.length; i++) {
                                linhas[i].style.display = "none"; // Oculta todas as linhas inicialmente
                                linhas[i].style.display = "contacto"; 
                                linhas[i].style.display = "numeroDeDocumento"; 
                                celula = linhas[i].getElementsByTagName("td");
                                for (j = 0; j < celula.length; j++) {
                                    if (celula[j]) {
                                        if (celula[j].innerHTML.toUpperCase().indexOf(filtro) > -1) {
                                            linhas[i].style.display = ""; // Exibe a linha se encontrar um resultado
                                            break; // Uma vez que encontramos um resultado, não precisamos verificar outras células
                                        }
                                    }
                                }
                            }
                        }

                        // Adicione um ouvinte de evento ao campo de pesquisa para chamar a função de filtragem
                        document.getElementById("campoPesquisa").addEventListener("keyup", filtrarAlunos);
                    </script>
