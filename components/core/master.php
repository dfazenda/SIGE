<?php
 if(!isset($_SESSION))
    session_start();

$url = explode('/', $_GET['url']);
$url = $url[0];
$url = explode('.', $url);
$url = $url[0];

//Se o url for igual a index, ele manda atribui ou manda para dashboard
$url = ($url == 'index') ? 'dashboard': $url;


//Conectar à pagina aluno
require 'Class.class.php';
$aluno = new aluno();
$funcionario = new funcionario();
$professor = new professor();
$utilitarios = new utilitarios();
$gestaoInterna = new gestaoInterna();
$usuario = new usuario();

$parametros = $utilitarios -> parametros();
$idadeMinAluno = $parametros['idadeMinAluno'];
$idadeMinFuncionario = $parametros['idadeMinFuncionario'];
$validadeMaxDocumento = $parametros['validadeMaxDocumento'];
$nomeDoSistema = $parametros['nomeDoSistema'];


$dataIdadeMinAluno = strtotime(-$idadeMinAluno."years",time());
$dataIdadeMinAluno = Date('Y'.'-12-31',$dataIdadeMinAluno);


$dataIdadeMinFuncionario = strtotime(-$idadeMinFuncionario."years",time());
$dataIdadeMinFuncionario = Date('Y'.'-12-31',$dataIdadeMinFuncionario);

$dataValidadeMaxDocumento = strtotime(-$validadeMaxDocumento."years",time());
$dataValidadeMaxDocumento = Date('Y-m-d',$dataValidadeMaxDocumento);

$anoActual = Date('Y');

  
 /* if($url == 'esqueci_senha') {  
    echo '<meta http-equiv="refresh" content="0;url=esqueci_senha.php">';
    exit();
  }elseif ($url == 'redefinir_senha') {  
    echo '<meta http-equiv="refresh" content="0;url=redefinir_senha.php?usuario='$_GET["usuario"]'&processo='$_GET["processo"]'">';
    exit();
  }elseif ($url == 'login' || @$_SESSION['activa']!= 1) {  
    echo '<meta http-equiv="refresh" content="0;url=login.php">';
    exit();
 }    */ //DEDPOIS TENHO QUE TIRAR COMENTARIO PARA FAZER TESTES   


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="components/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title><?=ucwords($nomeDoSistema) ?> | <?=ucwords($url) ?></title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="components/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="components/assets/css/style.css" rel="stylesheet" />
    <link href="components/assets/css/dark-style.css" rel="stylesheet" />
    <link href="components/assets/css/transparent-style.css" rel="stylesheet">
    <link href="components/assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="components/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="components/assets/colors/color1.css" />
</head>

<body class="app sidebar-mini ltr <?=$_SESSION['temaPadrao']?>">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader" style="background: #00000040;">
        <img src="components/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->

          
            <?php include("../appheader.php"); ?>
           
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
           
           <?php require '../appsidebar.php'; ?>
       
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            <div class="main-content app-content mt-2">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                       
                        <!-- PAGE-HEADER -->
                    <?php require '../appsidebar.php'; ?>
                        <!-- PAGE-HEADER END -->

                        <?php //Verificar as paginas
                        if($url == 'formulario_inscricao'){
                            require '../../pages/'.$url.'.php';
                        }elseif($url == 'sobre_nos'){
                            require '../../pages/'.$url.'.php';
                        }elseif($url == 'pagina_agenda'){
                            require '../../agendas/'.$url.'.php';
                        }elseif($url == 'gerar_pdf'){
                            require '../../pages/'.$url.'.php';
                        }elseif($url == 'gerar_excel'){
                            require '../../pages/'.$url.'.php';
                        }elseif($url == 'recibo_inscricaol'){
                            require '../../pages/'.$url.'.php';
                        }elseif ($url == 'esqueci_senha') {  
                             echo '<meta http-equiv="refresh" content="0;url=esqueci_senha.php">';
                        }elseif ($url == 'redefinir_senha') {  
                             echo '<meta http-equiv="refresh" content="0;url=redefinir_senha.php">';
                        }elseif ($url == 'login' || @$_SESSION['activa']!= 1) {  
                             echo '<meta http-equiv="refresh" content="0;url=login.php">';
                        }elseif(file_exists('../../pages/'.$url.'.php')){
                            require '../../pages/'.$url.'.php';

                       }else{//Se ele nao encontrar nada, manda para a pagina Not found (404)
                           echo '<meta http-equiv="refresh" content="0;url=404.php">';
                        }
                        ?>
 
                        <!-- ROW-1 OPEN -->
                        <!-- Row -->
                        <div class="row ">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <!-- /Row -->
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- Sidebar-right -->
         
        <?php include("../appsidebar2.php"); ?>
        <!--/Sidebar-right-->

        <!-- Country-selector modal-->
        <?php include("../appmodal.php"); ?>

        <!-- Country-selector modal-->

        <!-- FOOTER -->
      
        <?php include("../appfooter.php"); ?>
 
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="components/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="components/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="components/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SIDE-MENU JS -->
    <script src="components/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- SIDEBAR JS -->
    <script src="components/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="components/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="components/assets/plugins/p-scroll/pscroll.js"></script>
    <script src="components/assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- Color Theme js -->
    <script src="components/assets/js/themeColors.js"></script>

    <!-- Sticky js -->
    <script src="components/assets/js/sticky.js"></script>
    <script src="components/assets/js/fazenda.js"></script>

    <!-- CUSTOM JS -->
    <script src="components/assets/js/custom.js"></script>

      <!-- DATA TABLE JS-->
    <script src="components/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="components/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="components/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="components/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="components/assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="components/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="components/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="components/assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="components/assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="components/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="components/assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="components/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="components/assets/js/table-data.js"></script>

       <!-- SWEET-ALERT JS -->
    <script src="components/assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="components/assets/js/sweet-alert.js"></script>

     <!-- SELECT2 JS -->
    <script src="components/assets/plugins/select2/select2.full.min.js"></script>
    <script src="components/assets/js/select2.js"></script>

    <!-- INTERNAL Notifications js -->
    <script src="components/assets/plugins/notify/js/rainbow.js"></script>
     <script src="components/assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="components/assets/plugins/notify/js/notifIt.js"></script>
 <!-- FULL CALENDAR JS -->
    <script src='components/assets/plugins/fullcalendar/moment.min.js'></script>
    <script src='components/assets/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script src="components/assets/js/fullcalendar.js"></script>


</body>

</html>
