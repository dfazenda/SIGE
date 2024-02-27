     <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                          <!--<img style="max-width: 150px; max-height: 150px; margin-top: 20px;" src="components/assets/images/brand/logo2.png" class="header-brand-img desktop-logo" alt="logo">
                            <img style="max-width: 150px; max-height: 150px;margin-top: 20px;" src="components/assets/images/brand/logo2.png" class="header-brand-img toggle-logo" alt="logo">
                            <img style="max-width: 150px; max-height: 150px;margin-top: 20px;" src="components/assets/images/brand/logo2.png" class="header-brand-img light-logo" alt="logo">
                            <img style="max-width: 150px; max-height: 150px;margin-top: 20px;" src="components/assets/images/brand/logo2.png" class="header-brand-img light-logo1" alt="logo">
                          --->
                         
                        <!-- LOGO -->
                        <h1 style="margin-top: 20px;margin-left: -50PX;">ILIA - SIGE</h1>
                    </a>
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <?php if(isset($_SESSION['activa'])){ ?>

                        <ul class="side-menu">
                           
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="dashboard"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                            </li>
                            <?php if($_SESSION['nivelAcesso'] <=1){?>
                              <li class="slide">
                                <a class="side-menu__item usuarios" data-bs-toggle="slide" href="usuarios"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Usuários</span></a>
                            </li>
                             <?php } ?>
                             <?php if($_SESSION['nivelAcesso'] <=2){?>
                             <li class="slide">
                                <h5 class="side-menu__item" data-bs-toggle="slide" href="#"><i class="#"></i><span class="side-menu__label"><i class="text-warning">GESTÃO ACADÉMICA</i></span></h3>
                            </li>
                             
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="index.html"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Alunos</span></a>
                                
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                                    
                                    <li><a href="inscricoes" class="slide-item inscricoes">Inscrições</a></li>
                                                                    
                                    <li><a href="alunos" class="slide-item alunos">Listagem</a></li>
                                                                   
                                </ul>
                               
                            </li>
                            <?php } ?>
                             <?php if($_SESSION['nivelAcesso'] >=4){?>
                                <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="index.html"><i class="side-menu__icon fe fe-eye"></i><span class="side-menu__label">Ver</span></a>
                                <ul class="slide-menu">
                                    
                                    <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                                    <li><a href="aluno_encarregado" class="slide-item classes">Mensalidade & Notas</a></li>
                                    <li><a href="anuncios" class="slide-item disciplinas">Anúncios</a></li>
                                    <!---<li><a href="form" class="slide-item">Geral</a></li>--->
                                   
                                   
                                </ul>

                            </li>
                             <?php } ?>

                             <li class="slide">
                                <?php if($_SESSION['nivelAcesso'] <=2){?>
                                <a class="side-menu__item funcionarios" data-bs-toggle="slide" href="funcionarios"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Funcionários</span></a>
                                <?php } ?>
                            </li>
                          
                               <li class="slide">
                                <?php if(@$_SESSION['nivelAcesso'] <=2){?>
                                <a class="side-menu__item professores" data-bs-toggle="slide" href="professores"><i class="side-menu__icon fe fe-user "></i><span class="side-menu__label">Professores</span></a>
                                <?php } ?>
                               </li>
                               <?php if(@$_SESSION['nivelAcesso'] <=1){?>
                                <li class="slide">
                                <a class="side-menu__item mensalidade" data-bs-toggle="slide" href="mensalidade"><i class="side-menu__icon fa fa-dollar "></i><span class="side-menu__label">Mensalidades</span></a>
                                </li>
                                <?php } ?>
                             
                            <?php if($_SESSION['nivelAcesso'] <=3){?>
                             <li class="slide">
                                <h5 class="side-menu__item" data-bs-toggle="slide" href="#"><i class="#"></i><span class="side-menu__label"><i class="text-warning">GESTÃO PEDAGÓGICA</i></span></h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="index.html"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Gerenciar</span></a>
                                <ul class="slide-menu">
                                    
                                    <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                                    <?php if($_SESSION['nivelAcesso'] <=2){?>
                                    <li><a href="classes" class="slide-item classes">Classes</a></li>
                                    <li><a href="disciplinas" class="slide-item disciplinas">Disciplinas</a></li>
                                    <?php } ?>
                                    <li><a href="turmas" class="slide-item turmas">Turmas</a></li>
                                     <?php if($_SESSION['nivelAcesso'] <=2){?>
                                    <li><a href="sala" class="slide-item sala">Sala</a></li>
                                    <li><a href="sistema" class="slide-item sistema">Config do Sistema</a></li>
                                   <?php } ?>
                                   
                                </ul>

                            </li>
                            <?php } ?> 
                            
                              <li class="slide">
                                <?php if(@$_SESSION['nivelAcesso'] <=2){?>
                                <a class="side-menu__item agenda" data-bs-toggle="slide" href="pagina_agenda"><i class="side-menu__icon fe fe-calendar "></i><span class="side-menu__label">Agendas</span></a>
                                <?php } ?>
                               </li>
                             
                        </ul>
                        
                        <?php } else { ?>
                            <ul class="side-menu">
                           
                       
                             <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="formulario_inscricao"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Inscrição</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="login"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Login</span></a>
                            </li>
                                                
                          </ul>

                        <?php } ?>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
            
                