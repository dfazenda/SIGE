

            <!--app-content open-->
        
            <div class="main-content app-content mt-0" style="width: 100%;margin-left: 0px;">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                           <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <?php if(@$_SESSION['nivelAcesso'] <=2){?>
                        <div class="row">
                         <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="card bg-secondary img-card box-primary-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <a href="usuarios" class="text-white mb-0" _msthash="4390737" _msttexthash="348088">Usuários</a>
                                                <h2 class="mb-0 number-font" _msthash="4484987" _msttexthash="30732"><?=$gestaoInterna->totalUsuarios()?></h2>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-users text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="card bg-pink img-card box-secondary-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <a href="professores" class="text-white mb-0" _msthash="4391751" _msttexthash="289549">Professores</a>
                                                <h2 class="mb-0 number-font" _msthash="4484987" _msttexthash="30732"><?=$gestaoInterna->totalProfessores()?></h2>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-users text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4" >
                                <div class="card bg-cyan img-card box-secondary-shadow" >
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white" >
                                                <a href="funcionarios" class="text-white mb-0" _msthash="4391751" _msttexthash="289549">Funcionários</a>
                                                <h2 class="mb-0 number-font" _msthash="4486027" _msttexthash="39104"><?=$gestaoInterna->totalFuncionarios()?></h2>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-users text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php } ?>


                            <?php if(@$_SESSION['nivelAcesso'] <=2){?>
                             <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="card bg-success img-card box-primary-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <a href="alunos" class="text-white mb-0" _msthash="4390737" _msttexthash="348088">Alunos</a>
                                                <h2 class="mb-0 number-font" _msthash="4484987" _msttexthash="30732"><?=$gestaoInterna->totalAlunos()?></h2>
                                            </div>
                                            <div class="ms-auto"> <i class="fa icon-people text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="card bg-recentorder img-card box-primary-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <a href="classes" class="text-white mb-0" _msthash="4390737" _msttexthash="348088">Classes</a>
                                                <h2 class="mb-0 number-font" _msthash="4484987" _msttexthash="30732"><?=$gestaoInterna->totalClasses()?></h2>
                                            </div>
                                            <div class="ms-auto"> <i class="fa icon-book-open text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="card bg-danger img-card box-info-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <a href="#" class="text-white mb-0" _msthash="4393779" _msttexthash="159523">Turmas</a>
                                                <h2 class="mb-0 number-font" _msthash="4488107" _msttexthash="16991"><?=$gestaoInterna->totalTurmas(0)?></h2>
                                            </div>
                                            <div class="ms-auto"> <i class="fa icon-book-open text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                 
                        </div>

                        <?php if(@$_SESSION['nivelAcesso'] <=1){?>
                            <?php
                            $matriculaValue = $gestaoInterna->coleta_matricula();
                            $mensalidadeValue = $gestaoInterna->coleta_mensalidade();
                            $anualValue = $gestaoInterna->coleta_total_anual();
                            ?>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-order">
                                            <!-- <h6 class="mb-2">Orders</h6> -->
                                            <h2 class="text-end"><i class="mdi mdi-currency-usd icon-size float-start text-danger text-danger-shadow border-danger brround p-3"></i><span><?=$formattedValue = number_format($matriculaValue, 2, ',', '.');?></span></h2>
                                            <p class="mb-0 pt-5">Ganhos anual em matriculas no ano lectivo<span class="float-end"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widget">
                                            <!-- <h6 class="mb-2">Total Tax</h6> -->
                                            <h2 class="text-end"><i class="mdi mdi-currency-usd icon-size float-start text-warning text-warning-shadow border-solid border-warning brround p-3"></i><span><?=$formattedValue = number_format($mensalidadeValue, 2, ',', '.');?></span></h2>
                                            <p class="mb-0 pt-5">Total de ganhos anual em mensalidades<span class="float-end"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widget">
                                            <!-- <h6 class="mb-2">Total Profit</h6> -->
                                            <h2 class="text-end"><i class="icon-size mdi mdi-currency-usd float-start text-primary text-primary-shadow border-solid border-primary brround p-3"></i><span><?=$formattedValue = number_format($anualValue, 2, ',', '.');?></span></h2>
                                            <p class="mb-0 pt-5">Total de ganhos anual no ano lectivo<span class="float-end"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widget">
                                            <!-- <h6 class="mb-2">Total Sales</h6> -->
                                            <h2 class="text-end"><i class="mdi mdi-currency-usd icon-size float-start text-success text-success-shadow border-solid border-success brround p-3"></i><span>0.00,00</span></h2>
                                            <p class="mb-0 pt-5">Total mensal de gastos por dispesas<span class="float-end"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                        </div>
                        <?php } ?>

                          <?php if(@$_SESSION['nivelAcesso'] >=4){?>

                        <div class="row">
                            <div class="col-md-12">


                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h3 class="card-title">Olá <b class="text-danger"><?=@$_SESSION['nome_usuario']?></b>!</h3>
                                    </div>
                                   <div class="container">
                                    <p style="font-size: 22px;text-align: justify;">Nesta página poderás consultar o pagamento das mensalidades, notas de avaliações e anúncios.
                                    Por favor não compartilhe a sua senha com outra pessoa, apenas com o seu encarregado de educação, porque as informações aqui disponibilizadas são estritamente para si e seu encarregado.<br>
                                    Para consultar suas informações, clica em "<b class="text-primary">Ver</b>" e selecione o que pretende ver.
                                    </p>
                                       
                                   </div>
                                </div>
                            </div>
                          
                        </div>

                        <?php } ?> 
                        



            <!--app-content open-->
          
                        <!-- ROW-2 END -->

                        
                        <!-- ROW-1 END -->

                        <!-- ROW-2 -->
                 