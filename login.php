
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
    <title>ILIA - SIGE </title>

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
<body class="app sidebar-mini ltr" >

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="components/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page" style="background-image: url(components/assets/images/brand/colegio_ilia2.jpg);">
            <div class="">


                <!-- CONTAINER OPEN -->

              
                <!--<div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="components/assets/images/brand/logo-white.png" class="header-brand-img" alt="">
                    </div>
                </div>
            -->

                <div class="container-login100" >
                
                    <!--<div class="wrap-login100 p-6" style="width: 370px; background-image url(components/assets/images/brand/01.jpg); object-fit: cover;">-->
                    <div class="wrap-login100 p-6" style="background-color:transparent;border-left:2px solid sandybrown;border-top:2px solid #fff;border-right:2px solid teal;border-bottom:2px solid brown; border-top-left-radius: 20%;border-bottom-right-radius: 20%;">    
                    <form id='form_login' class="login100-form validate-form">
                            <input name='controlador' type="hidden" value="<?=md5('valida_login'). 'f' ?>">
                            <span class="login100-form-title pb-5"><i class="fa fa-user"></i> <h1><b style="color:sandybrown;">S</b><b style="color:#fff;">I</b><b style="color:teal;">G</b><b style="color:brown;">E</b></h1>

                                <h4 class="text-white text-center"><b>Sistema Integrado de Gestão Escolar<b></h4>
                            </span>

                            <p id='error' style="color: red; text-align: center;"></p>
                             <div class="col col-login mx-auto mt-0">
                             
                            </div>
                              <div class="panel panel-primary">
                               
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                      
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                
                                                <input class="input100 border-start-0 form-control ms-0" minlength="5" name='usuario' id='email' type="email" placeholder="Email do usuario">
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                              
                                                <input class="input100 border-start-0 form-control ms-0" minlength="5" name='senha' type="password" placeholder="Senha do usuario">
                                               
                                            </div>
                                            <div class="container-login100-form-btn col-xl-4">
                                               <button class="btn btn-primary pull-right mt-3 botao" type="submit" name="submit" value="Login" >Login</button>
                                            </div>
                                            <div class="text-center pt-3" style="margin-left: 140px;">
                                                <h6 class="text-white mb-0">Faça a sua inscrição<a href="formulario_inscricao" class="text-primary ms-1">aqui</a></h6>
                                            </div>
                                          
                                            <div class="text-end pt-4">
                                                <p class="text-white mb-0">Sobre<a href="sobre_nos" class="text-primary ms-1"> nós</a></p>
                                            </div>
                                            <div class="text-end pt-3" style="float:left;">
                                                <p class="text-white ">Esqueci a<a href="esqueci_senha" class="text-danger ms-1"> senha</a></p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="components/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="components/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="components/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="components/assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="components/assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="components/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="components/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="components/assets/js/custom.js"></script>

    <!----Configurando Ajax para o formulario para fazer requisoes para o valida_login, e não para ele mesmo-->
    <!--------AJAX-----
    <script>
        $("#form_login").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "includes/valida-login.php",
                data: $(this).serialize(),
                success: function (response) {
                    //console.log(response)
                      let objecto = JSON.parse(response) 
                      var success = objecto.success
                      var msg = objecto.msg

                     if (success) {
                         location.href = 'dashboard'
                   }else{
                   $('#error').text(msg)
                   $('#error').show()
                   setTimeout(() => {
                    $('#error').slideUp(1500);
                   }, 1500);

                    
                  }

                }
            });
        });
    </script>
   --------FIM AJAX----->

   <script>
    
       $("#form_login").submit(function (e) {
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: "includes/valida-login.php",
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response)
                    let objecto = JSON.parse(response)
                    var success = objecto.success
                    var msg = objecto.msg
                    if (success) {
                        location.href = 'dashboard'

                    }else{
                          $('#error').text(msg)
                          $('#error').show()
                          setTimeout(() => {
                              $('#error').slideUp(1500);

                          }, 1500);
                    }

                }
            });
       });

   </script>


</body>
</html>