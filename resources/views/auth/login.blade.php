<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">

    <title>Filex</title> <!-- TODO: Modificar etiquetas Meta de la app -->

    <meta name="description" content="Aplicación Filex, firma de contratos digitales">
    <meta name="author" content="Tooring">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <link rel="apple-touch-icon" href="backend/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="backend/assets/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="backend/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="backend/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="backend/assets/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="backend/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="backend/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="backend/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="backend/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="backend/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="backend/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="backend/global/vendor/waves/waves.css">
        <link rel="stylesheet" href="backend/assets/examples/css/pages/login-v2.css">


    <!-- Fonts -->
    <link rel="stylesheet" href="backend/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="backend/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="backend/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="backend/global/vendor/media-match/media.match.min.js"></script>
    <script src="backend/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="backend/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition page-login-v2 layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->
    <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content">
        <div class="page-brand-info">
          <div class="brand">
            <img class="brand-img" src="{{ asset('backend/img/brand.png') }}" alt="...">
            <h2 class="brand-text font-size-40">Filex</h2>
          </div>
          <p class="font-size-20">Olvidate de los papeles, una plataforma para firmar tus documentos legales con firma electrónica, de forma sencilla y con validez legal.</p>
        </div>

        <div class="page-login-main">
            <div class="brand hidden-md-up">
            <img class="brand-img" src="{{ asset('backend/img/brand.png') }}" alt="...">
            <h3 class="brand-text font-size-40">Filex</h3>
            </div>
            <h3 class="font-size-24">Iniciar sesión</h3>
            <p>Introduce tu correo y tu password.</p>

            <form method="POST" action="{{ route('login') }}" id="form-login" class="form-horizontal">
            @csrf
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="email" class="form-control empty" id="inputEmail" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label class="floating-label" for="inputEmail">Email</label>
                </div>

                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="password" class="form-control empty" id="inputPassword" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label class="floating-label" for="inputPassword">Password</label>
                </div>

                <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                    <input type="checkbox" id="remember" name="checkbox">
                    <label for="inputCheckbox">Recordarme</label>
                    </div>
                    <a class="float-right" href="{{ route('password.request') }}">Olvidaste tu password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </form>

            <p>No tienes cuenta? <a href="{{ route('register') }}">Crear una</a></p>

            <footer class="page-copyright">
            <p><?php echo date('Y'); ?> &copy;. Derechos reservados.</p>
            {{-- <div class="social">
                <a class="btn btn-icon btn-round social-twitter mx-5" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
                <a class="btn btn-icon btn-round social-facebook mx-5" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
                <a class="btn btn-icon btn-round social-google-plus mx-5" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a> --}}
            </div>
            </footer>
        </div>

      </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="backend/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="backend/global/vendor/jquery/jquery.js"></script>
    <script src="backend/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="backend/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="backend/global/vendor/animsition/animsition.js"></script>
    <script src="backend/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="backend/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="backend/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="backend/global/vendor/waves/waves.js"></script>

    <!-- Plugins -->
    <script src="backend/global/vendor/switchery/switchery.js"></script>
    <script src="backend/global/vendor/intro-js/intro.js"></script>
    <script src="backend/global/vendor/screenfull/screenfull.js"></script>
    <script src="backend/global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="backend/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Scripts -->
    <script src="backend/global/js/Component.js"></script>
    <script src="backend/global/js/Plugin.js"></script>
    <script src="backend/global/js/Base.js"></script>
    <script src="backend/global/js/Config.js"></script>

    <script src="backend/assets/js/Section/Menubar.js"></script>
    <script src="backend/assets/js/Section/Sidebar.js"></script>
    <script src="backend/assets/js/Section/PageAside.js"></script>
    <script src="backend/assets/js/Plugin/menu.js"></script>

    <!-- Config -->
    <script src="backend/global/js/config/colors.js"></script>
    <script src="backend/assets/js/config/tour.js"></script>
    <script>Config.set('assets', 'backend/assets');</script>

    <!-- Page -->
    <script src="backend/assets/js/Site.js"></script>
    <script src="backend/global/js/Plugin/asscrollable.js"></script>
    <script src="backend/global/js/Plugin/slidepanel.js"></script>
    <script src="backend/global/js/Plugin/switchery.js"></script>
        <script src="backend/global/js/Plugin/jquery-placeholder.js"></script>
        <script src="backend/global/js/Plugin/material.js"></script>

    <script>
      (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
  </body>
</html>
