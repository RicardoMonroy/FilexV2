<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">

    <title>Filex | {{ $titlePage}}</title>

    <meta name="description" content="Aplicación Filex, firma de contratos digitales">
    <meta name="author" content="Tooring">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <link rel="apple-touch-icon" href="{{ asset('backend/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('backend/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/site.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/vendor/waves/waves.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/global/vendor/dropify/dropify.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/examples/css/tables/basic.css') }}">

        <link rel="stylesheet" href="{{ asset('backend/global/vendor/toastr/toastr.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/examples/css/advanced/toastr.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/examples/css/uikit/modals.css') }}">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('backend/global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="{{ asset('backend/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ asset('backend/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Scripts -->

    <script src="{{ asset('backend/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('layouts.header')

    @include('layouts.sidebar')

    <!-- Page -->
    <div class="page">
      @yield('content')
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal"><?php echo date('Y'); ?> &copy; <a href="{{ route('welcome') }}">Filex</a></div>
      <div class="site-footer-right">
        Hecho con <i class="red-600 icon md-favorite"></i> por <a href="#">Tooring</a>
      </div>
    </footer>

    @stack('js')

    <!-- Core  -->
    <script src="{{ asset('backend/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/waves/waves.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('backend/global/vendor/switchery/switchery.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ asset('backend/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-tmpl/tmpl.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-load-image/load-image.all.min.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload-process.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload-image.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload-video.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/dropify/dropify.min.js') }}"></script>

        <script src="{{ asset('backend/global/vendor/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('backend/global/vendor/toastr/toastr.js') }}"></script>

        <script src="{{ asset('backend/global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('backend/global/js/Component.js') }}"></script>
    <script src="{{ asset('backend/global/js/Plugin.js') }}"></script>
    <script src="{{ asset('backend/global/js/Base.js') }}"></script>
    <script src="{{ asset('backend/global/js/Config.js') }}"></script>

    <script src="{{ asset('backend/assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('backend/assets/js/Plugin/menu.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('backend/global/js/config/colors.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config/tour.js') }}"></script>
    <script>Config.set('assets', '{{ asset('backend/assets') }}');</script>

    <!-- Page -->
    <script src="{{ asset('backend/assets/js/Site.js') }}"></script>
    <script src="{{ asset('backend/global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ asset('backend/global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ asset('backend/global/js/Plugin/switchery.js') }}"></script>
        <script src="{{ asset('backend/global/js/Plugin/dropify.js') }}"></script>

        <script src="{{ asset('backend/assets/examples/js/forms/uploads.js') }}"></script>
        <script src="{{ asset('backend/global/js/Plugin/peity.js') }}"></script>
        <script src="{{ asset('backend/global/js/Plugin/asselectable.js') }}"></script>
        <script src="{{ asset('backend/global/js/Plugin/selectable.js') }}"></script>
        <script src="{{ asset('backend/global/js/Plugin/table.js') }}"></script>

        <script src="{{ asset('backend/assets/examples/js/charts/peity.js') }}"></script>

        <script src="{{ asset('backend/global/js/Plugin/toastr.js') }}"></script>

        <script src="{{ asset('backend/global/js/Plugin/jquery-placeholder.js') }}"></script>
        <script src="{{ asset('backend/global/js/Plugin/input-group-file.js') }}"></script>

        @stack('js')

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
        </script>
  </body>
</html>
