<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="Tooring">
    <!-- Description -->
    <meta name="description" content="Plataforma de firmas digitales">
    <!-- Page Title -->
    <title>{{ config('app.name', 'Filex') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('frontend/images/favicon.ico') }}" rel="icon">
    <!-- Bundle -->
    <link href="{{ asset('vendor/css/bundle.min.css') }}" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="{{ asset('endor/css/LineIcons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/revolution-settings.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/cubeportfolio.min.css') }}" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('frontend/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

<!-- Loader -->
<div class="loader-bg">
    <div class="loader"></div>
</div>
<!-- Loader ends -->

<!-- START HEADER -->
<header>
    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
        <div class="container round-nav">
            <a href="index-frontend.html" title="Logo" class="logo scroll">
                <!--Logo Default-->
                <img src="{{ asset('frontend/images/logoAlt.png') }}" alt="logo" class="ml-lg-3 m-0">
            </a>

            <!--Nav Links-->
            <div class="collapse navbar-collapse" id="megaone">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link scroll line" href="#slider-section">Inicio</a>
                    <a class="nav-link scroll line" href="#about">Nosotros</a>
                    {{-- <a class="nav-link scroll line" href="#portfolio">Our Clients</a> --}}
                    <a class="nav-link scroll line" href="#pricing">Planes</a>
                    {{-- <a class="nav-link scroll line" href="#blog">Blog</a> --}}
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-large btn-rounded btn-hvr-up btn-hvr-green dashboard" >Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-large btn-rounded btn-hvr-up btn-hvr-green dashboard">Acceder</a>
                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue" >Registro</a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <!--Side Menu Button-->
        <div class="navigation-toggle">
            <ul class="slider-social toggle-btn my-0">
                <li>
                    <a href="javascript:void(0);" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Side Nav-->
    <div class="side-menu hidden">

        <div class="mega-title" id="mega-title"><h2 class="inner-mega-title">FILEX</h2></div>

        <span id="btn_sideNavClose">
          <i class="las la-times btn-close"></i>
        </span>
        <div class="inner-wrapper">
            <nav class="side-nav w-100">
                <a href="index-frontend.html" title="Logo" class="logo scroll navbar-brand">
                    <img src="frontend/images/logo.png" alt="logo">
                </a>
                <ul class="navbar-nav text-capitalize">
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#slider-section">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#about">Nosotros</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link scroll" href="#portfolio">Our Clients</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#pricing">Planes</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link scroll" href="#blog">Blog</a>
                    </li> --}}
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue">Acceder</a>
                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue" >Registro</a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif
                </ul>
            </nav>

            <div class="side-footer w-100">
                {{-- <ul class="social-icons-simple">
                    <li><a class="facebook_bg_hvr2 wow fadeInLeft" href="javascript:void(0)" data-wow-delay="300ms"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a class="instagram_bg_hvr2 wow fadeInUp" href="javascript:void(0)" data-wow-delay="500ms"><i class="fab fa-instagram"></i> </a> </li>
                    <li><a class="twitter_bg_hvr2 wow fadeInRight" href="javascript:void(0)" data-wow-delay="300ms"><i class="fab fa-twitter"></i> </a> </li>
                </ul> --}}
                <p>&copy; 2020 Filex. Made With Love by Tooring</p>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->

    <!--Get Started Model Popup-->
    {{-- <div class="quote-content hidden animated-modal" id="animatedModal">
        <!--Heading-->
        <div class="pb-md-5 p-0 text-center">
            <span class="text-blue font-weight-200 font-20">We are MegaOne Company</span>
            <h2 class="main-font font-weight-600 text-black mt-2">Lets start your <span class="text-strongBlue js-rotating">project, website</span></h2>
        </div>
        <!--Contact Form-->
        <form class="contact-form" id="modal-contact-form-data">
            <div class="row">
                <!--Result-->
                <div class="col-12" id="quote_result"></div>

                <!--Left Column-->
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="quote_name" name="quoteName" placeholder="Name" required=""
                               type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_contact" name="userPhone" placeholder="Contact #" required=""
                               type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_type" name="projectType" placeholder="Project type" required=""
                               type="text">
                    </div>
                </div>

                <!--Right Column-->
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="quote_email" name="userEmail" placeholder="Email" required=""
                               type="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_address" name="userAddress" placeholder="City / Country"
                               required="" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_budget" name="quoteBudget" placeholder="Budget" required=""
                               type="text">
                    </div>
                </div>

                <!--Full Column-->
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" id="userMessage"
                                  name="userMessage"  placeholder="Please explain your project in detail."></textarea>
                    </div>
                </div>

                <!--Button-->
                <div class="col-md-12">
                    <div class="form-check">
                        <label class="checkbox-lable font-weight-200 font-16">Contact by phone is preferred
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue modal_contact_btn" id="quote_submit_btn">Enviar</a>
                </div>
            </div>
        </form>
    </div> --}}
</header>
<!-- END HEADER -->

<!-- START MAIN SLIDER -->
<div id="slider-section" class="slider-section">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
            <ul>
                <!-- SLIDE 1 -->
                @foreach ($sliders as $slider)
                <li data-index="rs-0{{ $slider->id }}" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="01">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('storage') }}/{{ $slider->banner }}"  data-kenburns="on" data-duration="15000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10"  data-bgfit="cover" data-bgrepeat="no-repeat" data-bgposition="center center" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="bg-overlay bg-black opacity-5"></div>
                    <!-- LAYER NR. 1 -->
                    {{-- <div class="tp-caption tp-resizeme rs-parallaxlevel-2" --}}
                    <div class="tp-caption tp-resizeme"
                         data-x="['{{ $slider->margin }}','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-55','-55']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":280,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         >
                        <p class="text-white alt-font font-18">{{ $slider->title }}</p>
                    </div>
                    <!-- LAYER NR. 3 -->
                    {{-- <div class="tp-caption tp-resizeme rs-parallaxlevel-3" --}}
                    <div class="tp-caption tp-resizeme"
                         data-x="['{{ $slider->margin }}','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-5','-5','-5','-5']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                    <h1 class="text-white font-40 main-font font-weight-600"><span>{!! $slider->subtitle !!}</span>
                        </h1>
                    </div>
                    <!-- LAYER NR. 4 -->
                    {{-- <div class="tp-caption tp-resizeme rs-parallaxlevel-2" --}}
                    <div class="tp-caption tp-resizeme"
                         data-x="['{{ $slider->margin }}','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        {{-- <p class="text-white alt-font font-18">{{ $slider->paragraph }}</p> --}}
                        <h1 class="text-white font-40 main-font font-weight-600"><span>{!! $slider->paragraph !!}</span>
                    </div>
                    <!-- LAYER NR. 5 -->
                    {{-- <div class="tp-caption tp-resizeme rs-parallaxlevel-2" --}}
                    <div class="tp-caption tp-resizeme"
                         data-x="['{{ $slider->margin }}','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['155','155','150','150']"
                         data-width="['500','500','500','500']" data-textalign="['center','center','center','center']" data-type="text"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <a href="#about" class="scroll btn btn-medium btn-rounded btn-blue btn-hvr-strongBlue btn-hvr-up">Conócenos</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <ul class="social-icons social-icons-simple revicon white d-none d-md-block d-lg-block">
        <li class="d-table"><a href="javascript:void(0)" class="facebook_bg_hvr2"><i class="fab fa-facebook-f"></i></a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="twitter_bg_hvr2"><i class="fab fa-twitter"></i> </a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="linkdin_bg_hvr2"><i class="fab fa-linkedin-in"></i> </a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="instagram_bg_hvr2"><i class="fab fa-instagram"></i> </a> </li>
    </ul>
</div>
<!--scroll down-->
<a href="#about" class="scroll-down link scroll main-font font-15 animate">Ver información <i class="fas fa-long-arrow-alt-down"></i></a>
<!-- END MAIN SLIDER -->

<!-- START ABOUT US -->
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="300ms">
                <p class="text-blue font-weight-200 font-20">{{ $about->title }}</p>
                <h1 class="main-font font-weight-600 text-black">
                    <span>{{ $about->subtitleLeft }}
                        <span class="text-strongBlue js-rotating">
                            @foreach ($documents as $document)
                                {{ $document->name }}
                                @if ($document->id < $last)
                                    <p>,</p>
                                @else
                                    <p></p>
                                @endif
                            @endforeach
                        </span>
                    </span>
                    <span> {{ $about->subtitleRight }}
                    </span>
                </h1>
            </div>

            <div class="col-12 col-lg-6 m-ipad wow fadeInRight" data-wow-delay="300ms">
                <div class="ml-md-4 pl-md-2 font-weight-200 text-grey font-18">
                    <p>{{ $about->paragraph }}</p>
                    {{-- <p>Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. </p> --}}
                </div>
            </div>
        </div>
        <!-- About Boxes -->
        <div class="row about-margin">
            <!-- First Box -->
            <div class="col-md-4 col-sm-12">
                <div class="about-box center-block bg-strongBlue wow zoomIn" data-wow-delay="400ms">
                    <div class="about-main-icon pb-4">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <h5>Firma con validez legal en México.</h5>
                </div>
            </div>
            <!-- Second Box -->
            <div class="col-md-4 col-sm-12">
                <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
                    <div class="about-main-icon pb-4">
                        <i class="fas fa-file-medical" aria-hidden="true"></i>
                    </div>
                    <h5>Lleva un historial <span>de tus firmas.</span></h5>
                </div>
            </div>
            <!-- Third Box -->
            <div class="col-md-4 col-sm-12">
                <div class="about-box center-block bg-strongBlue wow zoomIn" data-wow-delay="600ms">
                    <div class="about-main-icon pb-4">
                        <i class="fas fa-mail-bulk" aria-hidden="true"></i>
                    </div>
                    <h5>Invita a usuarios a firmar <span> de forma segura.</span></h5>
                </div>
            </div>
        </div>
        <!-- About Image -->
        <div class="d-flex justify-content-center wow bounceInLeft" data-wow-delay="300ms">
            <img src="{{ asset('storage') }}/{{ $about->picture }}" alt="About-Us Plant" width="765">
        </div>
    </div>
</section>
<!-- END ABOUT US -->

<!-- START TEAM STATS -->
{{-- <section class="half-section p-0 stats-bg">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 p-0 order-1 order-md-2">
                <div class="owl-carousel owl-theme owl-split">
                    <!-- Team-1 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/team-img1.jpg" class="team-img">
                        </div>
                    </div>
                    <!-- Team-2 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/team-img2.jpg" class="team-img">
                        </div>
                    </div>
                    <!-- Team-3 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/team-img3.jpg" class="team-img">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="skill-box">
                    <div class="main-title mb-5 text-center text-lg-left main-title wow fadeIn" data-wow-delay="300ms">
                        <p class="font-weight-200 font-20 text-white">Check Our Skills</p>
                        <h2 class="margin-top main-font font-40 font-weight-normal text-white">We have best financial <span class="d-block mt-1">skilled team.</span></h2>
                    </div>
                    <ul class="text-left">
                        <!-- First Bar -->
                        <li class="custom-progress text-white">
                            <h6 class="font-16 mb-0 text-capitalize">Business Consulting <span class="float-right"><b class="numscroller">85</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar blue-bar progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                        <!-- Second Bar -->
                        <li class="custom-progress text-white">
                            <h6 class="font-16 mb-0 text-capitalize">Financial Advising<span class="float-right"><b class="numscroller">68</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar strongBlue-bar progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                        <!-- Third Bar -->
                        <li class="custom-progress text-white">
                            <h6 class="font-16 mb-0 text-capitalize">Brand Consulting <span class="float-right"><b class="numscroller">85</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar blue-bar progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                        <!-- Fourth Bar -->
                        <li class="custom-progress mb-0 text-white">
                            <h6 class="font-16 mb-0">Strategic Consulting<span class="float-right"><b class="numscroller">95</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar strongBlue-bar progress-bar-striped" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END TEAM STATS -->

<!-- START PORTFOLIO -->
{{-- <section id="portfolio" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center pb-5 wow fadeInUp" data-wow-delay="100ms">
                    <p class="text-strongBlue font-weight-200 font-20">Basic Info about work</p>
                    <h1 class="main-font font-weight-600 text-black">Our Valued Customers</h1>
                    <p class="margin-top font-16 alt-font font-weight-normal text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in velit dolor.<span class="d-block"> Vivamus gravida, neque nec interdum cursus, erat ligula</span>.</p>
                </div>
                <div class="pointer nav nav-pills mb-4 mb-md-4 d-flex justify-content-center filtering">
                    <span data-filter="*" class="nav-link active">All</span>
                    <span class="nav-link" data-filter=".Agencies">Agencies</span>
                    <span class="nav-link" data-filter=".Business">Clinical</span>
                    <span class="nav-link" data-filter=".Personal">Personal</span>
                    <span class="nav-link" data-filter=".Medical">Medical</span>
                </div>

                <ul class="da-thumbs gallery">
                    <!-- First Image -->
                    <li class="items Business Medical Agencies">
                        <img src="frontend/images/portfolio-img1.jpg" alt="img">
                        <a href="frontend/images/portfolio-img1.jpg" class="text-center" data-fancybox="images">
                            <div class="overlay">
                                <div>
                                    <div class="search-icon"><i class="fa fa-search"></i></div>
                                    <h4 class="">Hudson Lee</h4>
                                    <span>New York, USA</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    <!-- Second Image -->
                    <li class="items Business Medical Agencies">
                        <img src="frontend/images/portfolio-img2.jpg" alt="img">
                            <a href="frontend/images/portfolio-img2.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Will Smith</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Third Image -->
                    <li class="items Personal Business">
                        <img src="frontend/images/portfolio-img3.jpg" alt="img">
                            <a href="frontend/images/portfolio-img3.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Steve Smith</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Fourth Image -->
                    <li class="items Medical Personal">
                        <img src="frontend/images/portfolio-img4.jpg" alt="img">
                            <a href="frontend/images/portfolio-img4.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Janey Woods</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Fifth Image -->
                    <li class="items Medical Agencies">
                        <img src="frontend/images/portfolio-img5.jpg" alt="img">
                            <a href="frontend/images/portfolio-img5.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Paul Jackson</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Sixth Image -->
                    <li class="items Business surgery Medical">
                        <img src="frontend/images/portfolio-img6.jpg" alt="img">
                            <a href="frontend/images/portfolio-img6.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Eva Marie</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>
                </ul>
                <div class="text-center pt-5">
                    <a href="frontend/standalone.html" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue">View More Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END PORTFOLIO -->

<!-- START CLIENTS -->
{{-- <section class="pt-0 padding-bottom">
    <h2 class="d-none">hidden</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--Client Slider-->
                <div class="owl-carousel partners-slider">
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END CLIENTS -->

<!-- START PARALLAX -->
<section class="parallax-img parallax">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <!-- Testimonial Slider -->
                <div id="testimonial-carousal" class="owl-carousel owl-theme testimonial-owl text-center wow fadeIn" data-wow-delay="300ms">
                    <!-- Item-1 -->
                    <div class="item">
                        <div class="icon-quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="description">
                            <p class="text-black paragraph text-white">FILEX una solución tecnológica con la cual podrás firmar tus documentos desde cualquier parte del mundo, con validez legal. </p>
                        </div>
                        <div class="testimonial-img mt-4" >
                            <img src="frontend/images/testimonial-1.png" alt="student img">
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0 text-black alt-font font-weight-500 font-24 text-white">Jaime Ancer, CEO</h3>
                        </div>
                    </div>

                    <!-- Item-2-->
                    {{-- <div class="item">
                        <div class="icon-quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="description">
                            <p class="text-white paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapibus diam. Mauris malesuada, nisl non rutrum commodo, sem magna laoreet tellus, eu euismod dolor enim et mi. In at tempor purus. </p>
                        </div>
                        <div class="testimonial-img mt-4">
                            <img src="frontend/images/testimonial-2.png" alt="student img">
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0 text-white alt-font font-weight-normal font-24">Trixly Wanders</h3>
                        </div>
                    </div> --}}

                    <!-- Item-3 -->
                    {{-- <div class="item">
                        <div class="icon-quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="description">
                            <p class="text-white paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapibus diam. Mauris malesuada, nisl non rutrum commodo, sem magna laoreet tellus, eu euismod dolor enim et mi. In at tempor purus. </p>
                        </div>
                        <div class="testimonial-img mt-4">
                            <img src="frontend/images/testimonial-3.png" alt="student img">
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0 text-white alt-font font-weight-normal font-24">Steve Austin</h3>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PARALLAX -->

<!-- START PRICE -->
<section id="pricing" class="pricing">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <div class="col-12 text-center">
                <!-- <p class="text-blue font-weight-200 font-20">Listo para una mejor experiencia</p> -->
                <h1 class="main-font font-weight-600 text-black">Conoce nuestros planes</h1>
                <p class="margin-top font-16 alt-font font-weight-normal text-grey">Regístrate gratis en FILEX y comienza un periodo de prueba de 3 documentos gratis en cualquiera de nuestros planes.</p>
            </div>
        </div>
        <div class="row pt-5">
            {{-- <!-- Plan-1 -->
                <div class="col-lg-6 col-md-12 col-sm-12 price-strongBlue wow fadeInLeft" data-wow-delay="300ms">
                    <div class="pricing-item">
                        <h3 class="pb-3 main-font font-24 text-blue">Básico</h3>
                        <div class="pricing-price d-flex"><sup class="price-dollar text-strongBlue">$</sup> <span class="pricing-currency text-strongBlue">0.00
                            <span class="d-block alt-font font-weight-200 font-10 text-center text-strongBlue">mxn / moth</span></span>
                            <p class="pricing-para text-grey ml-3">Tarfa plana, sujeto a cambios</p>
                        </div>
                        <ul class="pricing-list mb-0">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Firma de documentos.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Firma dígital.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tus datos seguros.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> </li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> </li>
                        </ul>
                        <a href="{{ route('login') }}" class="btn btn-large strongBlue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-strongBlue">Regístrarme</a>
                    </div>
                </div>
            <!-- Plan-2 --> --}}
            {{-- @foreach ($products as $product) --}}

            {{-- {{ dd($product) }} --}}
            <div class="col-lg-4 col-md-12 col-sm-12 price-blue wow fadeInUp" data-wow-delay="500ms">
                <div class="pricing-item">
                    <h3 class="pb-3 main-font font-24 text-strongBlue">Plan FILEX Básico</h3>
                    <div class="pricing-price">
                        <div class="d-flex">
                            <div class="d-flex" style="align-items: center;">
                                <span><sup class="price-dollar text-blue">MXN</sup></span><span class="pricing-currency text-blue width-9">50</span>
                            </div>
                            <!-- <span class="d-block alt-font font-weight-200 font-10 text-center"> /  </span> -->
                            <p class="pricing-para text-grey ml-3">Por documento individual</p>
                        </div>
                        <p class="text-blue font-weight-200 font-12 text-center mt-2">  </p>
                    </div>
                    <ul class="pricing-list mb-0">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Firma de documentos legales de forma electrónica, y paga por cada documento.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Acceso completo a la plataforma, para ver el estatus e historial de tus documentos firmados.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tus datos personales y confidencialidad de documentos se encuentran protegidos mediante el Cifrado AES-256.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Cada documento incluye su sello digital de tiempo y constancia de conservación conforme a la NOM-151-SCFI-2016.</li>
                            <!-- <li><i class="fa fa-check" aria-hidden="true"></i> Implementar eFirma</li> -->
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-large blue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-blue">Regístrarme</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 price-blue wow fadeInUp" data-wow-delay="500ms">
                <div class="pricing-item">
                    <h3 class="pb-3 main-font font-24 text-strongBlue">Plan FILEX Premium</h3>
                    <div class="pricing-price">
                        <div class="d-flex">
                            <div class="d-flex" style="align-items: center;">
                                <span><sup class="price-dollar text-blue">MXN</sup></span><span class="pricing-currency text-blue width-9">35</span>
                            </div>
                            <!-- <span class="d-block alt-font font-weight-200 font-10 text-center"> /  </span> -->
                            <p class="pricing-para text-grey ml-3">Por documento individual</p>
                        </div>
                        <p class="text-blue font-weight-200 font-12 text-center mt-2">10 a 99 documentos</p>
                    </div>
                    <ul class="pricing-list mb-0">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Firma de documentos legales de forma electrónica, y paga por cada documento.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Acceso completo a la plataforma, para ver el estatus e historial de tus documentos firmados.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tus datos personales y confidencialidad de documentos se encuentran protegidos mediante el Cifrado AES-256.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Cada documento incluye su sello digital de tiempo y constancia de conservación conforme a la NOM-151-SCFI-2016.</li>
                            <!-- <li><i class="fa fa-check" aria-hidden="true"></i> Implementar eFirma</li> -->
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-large blue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-blue">Regístrarme</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 price-blue wow fadeInUp" data-wow-delay="500ms">
                <div class="pricing-item">
                    <h3 class="pb-3 main-font font-24 text-strongBlue">Plan FILEX Corporativo</h3>
                    <div class="pricing-price">
                        <div class="d-flex">
                            <div class="d-flex" style="align-items: center;">
                                <span><sup class="price-dollar text-blue">MXN</sup></span><span class="pricing-currency text-blue width-9">25</span>
                            </div>
                            <!-- <span class="d-block alt-font font-weight-200 font-10 text-center"> /  </span> -->
                            <p class="pricing-para text-grey ml-3">Por documento individual</p>
                        </div>
                        <p class="text-blue font-weight-200 font-12 text-center mt-2">100 a 1,000 documentos</p>
                    </div>
                    <ul class="pricing-list mb-0">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Firma de documentos legales de forma electrónica, y paga por cada documento.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Acceso completo a la plataforma, para ver el estatus e historial de tus documentos firmados.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tus datos personales y confidencialidad de documentos se encuentran protegidos mediante el Cifrado AES-256.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Cada documento incluye su sello digital de tiempo y constancia de conservación conforme a la NOM-151-SCFI-2016.</li>
                            <!-- <li><i class="fa fa-check" aria-hidden="true"></i> Implementar eFirma</li> -->
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-large blue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-blue">Regístrarme</a>
                </div>
            </div>
            {{-- @endforeach --}}
            <!-- plan-3 -->
            {{-- <div class="col-lg-4 col-md-12 col-sm-12 price-strongBlue wow fadeInRight" data-wow-delay="300ms">
                <div class="pricing-item">
                    <h3 class="pb-3 main-font font-24 text-blue">Advance</h3>
                    <div class="pricing-price d-flex"><sup class="price-dollar text-strongBlue">$</sup> <span class="pricing-currency text-strongBlue">99
                            <span class="d-block alt-font font-weight-200 font-10 text-center">Month</span></span>
                        <p class="pricing-para text-grey ml-3">It has survived not only five centuries, but also the leap into electronic</p>
                    </div>
                    <ul class="pricing-list mb-0">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Full Access.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Unlimited Bandwidth.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Professional Websites.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Social media integration.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> 40MB of storage space.</li>
                    </ul>
                    <a href="javascript:void(0)" class="btn btn-large strongBlue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-strongBlue">Choose Plan</a>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- END PRICE -->

<!-- START BLOG -->
<section class="half-section p-0 blog" id="blog">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center blog-bg">
            <div class="col-lg-12 col-md-12">

                <div class="main-title m-5 text-lg-left wow fadeInUp" data-wow-delay="300ms">
                    <p class="text-strongBlue font-weight-200 font-20">FILEX</p>
                    <h1 class="main-font font-weight-600 text-black margin-top">Preguntas Frecuentes</h1>
                </div>
                <div class="accordion m-5" id="accordionExample">
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1. ¿Qué es FILEX?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>FILEX es una plataforma para firmar tus documentos legales con firma electrónica, de forma sencilla y con validez legal.</p>
                                    <p>Los documentos firmados con FILEX tienen validez legal en México y pueden llegar a tener validez legal en otros países, sujeto a las disposiciones aplicables en dichas jurisdicciones.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. ¿Qué tipo de servicios de firmas ofrece FILEX?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>FILEX ofrece los siguientes servicios de firma electrónica de documentos, a través de: </p>
                                    <ul>
                                        <li style="list-style:unset">Firma Electrónica.</li>
                                        <li style="list-style:unset">E-Firma (antes Firma Electrónica Avanzada) (próximamente).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        3. ¿Cuál es la diferencia entre los diferentes tipos de firma electrónica?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>Principalmente, la diferencia se puede identificar en el propósito para el que serán utilizadas y/o el fundamento de las mismas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        4. ¿Cuál es el propósito y fundamento de la Firma Digital?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                <p>La Firma Digital se utiliza principalmente para documentos sin mayor importancia legal, ya que este tipo de firma no se encuentra regulada en las leyes mexicanas y tampoco tiene validez legal alguna.</p>
                                <p>La Firma Digital incluye:</p>
                                <ul>
                                    <li style="list-style:unset">Pegar una imagen (e.g., jpg) de una firma en un documento.</li>
                                    <li style="list-style:unset">Firmar un documento con una pluma digital en tu tableta o computadora.</li>
                                    <li style="list-style:unset">Entre otras actividades similares.</li>
                                </ul>
                                <p>La Firma Digital se utiliza principalmente en comunicados, comprobantes de pago y comunicaciones entre las partes, de menor importancia legal.</p>
                                <p>Por las razones expuestas, FILEX no ofrece el servicio de Firma Digital.</p>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        5. ¿Cuál es el propósito y fundamento de la Firma Electrónica?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>La Firma Electrónica se utiliza para la firma general de documentos legales (e.g., contratos, certificaciones, etc.), salvo aquellos documentos que conforme a las leyes aplicables deban revestir una forma establecida por la ley (e.g., documentos que deben de constar en escritura pública o documentos que la ley exige necesariamente la firma autógrafa, como lo es el caso del pagaré).</p>
                                    <p>El fundamento de la Firma Electrónica se encuentra en el Código Civil Federal (aplicado supletoriamente al Código de Comercio) y en el Código de Comercio, tal como se muestra a continuación, de forma enunciativa, mas no limitativa:</p>
                                    <p><b>I.- CÓDIGO CIVIL FEDERAL (APLICADO SUPLETORIAMENTE EL CÓDIGO DE COMERCIO).</b></p>
                                    <p><b>Artículo 1794.-</b> <u>Para la existencia del contrato se requiere: I. Consentimiento</u>; II. Objeto que pueda ser materia del contrato.</p>
                                    <p><b>Artículo 1796.-</b> <u>Los contratos se perfeccionan por el mero consentimiento, excepto aquellos que deben revestir una forma establecida por la ley</u>. Desde que se perfeccionan obligan a los contratantes, no sólo al cumplimiento de lo expresamente pactado, sino también a las consecuencias que, según su naturaleza, son conforme a la buena fe, al uso o a la ley.</p>
                                    <p><b>Artículo 1803.-</b> <u>El consentimiento puede ser expreso o tácito</u>, para ello se estará a lo siguiente: I.- Será expreso cuando la voluntad se manifiesta verbalmente, por escrito, por medios electrónicos, ópticos o por cualquier otra tecnología, o por signos inequívocos, y II.- El tácito resultará de hechos o de actos que lo presupongan o que autoricen a presumirlo, excepto en los casos en que por ley o por convenio la voluntad deba manifestarse expresamente.</p>
                                    <p><b>Artículo 1805.-</b> Cuando la oferta se haga a una persona presente, sin fijación de plazo para aceptarla, el autor de la oferta queda desligado si la aceptación no se hace inmediatamente. <u>La misma regla se aplicará a la oferta hecha por teléfono o a través de cualquier otro medio electrónico, óptico o de cualquier otra tecnología que permita la expresión de la oferta y la aceptación de ésta en forma inmediata</u>.</p>
                                    <p><b>Artículo 1807.-</b> <u>El contrato se forma en el momento en que el proponente reciba la aceptación, estando ligado por su oferta, según los artículos precedentes</u>.</p>
                                    <p><b>II.- CÓDIGO DE COMERCIO.</b></p>
                                    <p><b>Artículo 89.-</b>  Las disposiciones de este Título regirán en toda la República Mexicana en asuntos del orden comercial, sin perjuicio de lo dispuesto en los tratados internacionales de los que México sea parte.</p>
                                    <p><u>Las actividades reguladas por este Título se someterán en su interpretación y aplicación a los principios de neutralidad tecnológica</u>, autonomía de la voluntad, compatibilidad internacional y equivalencia funcional del Mensaje de Datos en relación con la información documentada en medios no electrónicos y de la Firma Electrónica en relación con la firma autógrafa.</p>
                                    <p><u>En los actos de comercio y en la formación de los mismos podrán emplearse los medios electrónicos</u>, ópticos o cualquier otra tecnología. Para efecto del presente Código, se deberán tomar en cuenta las siguientes definiciones:</p>
                                    <p><b>Certificado</b>: Todo Mensaje de Datos u otro registro que confirme el vínculo entre un Firmante y los datos de creación de Firma Electrónica.</p>
                                    <p><b>Datos de Creación de Firma Electrónica</b>: Son los datos únicos, como códigos o claves criptográficas privadas, que el Firmante genera de manera secreta y utiliza para crear su Firma Electrónica, a fin de lograr el vínculo entre dicha Firma Electrónica y el Firmante. </p>
                                    <p><b>Destinatario</b>: La persona designada por el Emisor para recibir el Mensaje de Datos, pero que no esté actuando a título de Intermediario con respecto a dicho Mensaje. </p>
                                    <p><b>Digitalización</b>: Migración de documentos impresos a mensaje de datos, de acuerdo con lo dispuesto en la norma oficial mexicana sobre digitalización y conservación de mensajes de datos que para tal efecto emita la Secretaría.</p>
                                    <p><b>Emisor</b>: Toda persona que, al tenor del Mensaje de Datos, haya actuado a nombre propio o en cuyo nombre se haya enviado o generado ese mensaje antes de ser archivado, si éste es el caso, pero que no haya actuado a título de Intermediario. </p>
                                    <p><b>Firma Electrónica</b>: <u>Los datos en forma electrónica consignados en un Mensaje de Datos, o adjuntados o lógicamente asociados al mismo por cualquier tecnología, que son utilizados para identificar al Firmante en relación con el Mensaje de Datos e indicar que el Firmante aprueba la información contenida en el Mensaje de Datos, y que produce los mismos efectos jurídicos que la firma autógrafa, siendo admisible como prueba en juicio</u>. </p>
                                    <p><b>Firma Electrónica Avanzada o Fiable</b>: <u>Aquella Firma Electrónica que cumpla con los requisitos contemplados en las fracciones I a IV del artículo 97</u>. En aquellas disposiciones que se refieran a Firma Digital, se considerará a ésta como una especie de la Firma Electrónica. Firmante: La persona que posee los datos de la creación de la firma y que actúa en nombre propio o de la persona a la que representa. </p>
                                    <p><b>Intermediario</b>: En relación con un determinado Mensaje de Datos, se entenderá toda persona que, actuando por cuenta de otra, envíe, reciba o archive dicho Mensaje o preste algún otro servicio con respecto a él. </p>
                                    <p><b>Mensaje de Datos</b>: La información generada, enviada, recibida o archivada por medios electrónicos, ópticos o cualquier otra tecnología. Parte que Confía: La persona que, siendo o no el Destinatario, actúa sobre la base de un Certificado o de una Firma Electrónica. </p>
                                    <p><b>Prestador de Servicios de Certificación</b>: La persona o institución pública que preste servicios relacionados con firmas electrónicas, expide los certificados o presta servicios relacionados como la conservación de mensajes de datos, el sellado digital de tiempo y la digitalización de documentos impresos, en los términos que se establezca en la norma oficial mexicana sobre digitalización y conservación de mensajes de datos que para tal efecto emita la Secretaría.</p>
                                    <p><b>Secretaría</b>: Se entenderá la Secretaría de Economía. </p>
                                    <p><b>Sello Digital de Tiempo</b>: El registro que prueba que un dato existía antes de la fecha y hora de emisión del citado Sello, en los términos que se establezca en la norma oficial mexicana sobre digitalización y conservación de mensajes de datos que para tal efecto emita la Secretaría.</p>
                                    <p><b>Sistema de Información</b>: Se entenderá todo sistema utilizado para generar, enviar, recibir, archivar o procesar de alguna otra forma Mensajes de Datos. </p>
                                    <p><b>Titular del Certificado</b>: Se entenderá a la persona a cuyo favor fue expedido el Certificado.</p>
                                    <p><b>Artículo 89 bis.-</b> <u>No se negarán efectos jurídicos, validez o fuerza obligatoria a cualquier tipo de información por la sola razón de que esté contenida en un Mensaje de Datos</u>. Por tanto, dichos mensajes podrán ser utilizados como medio probatorio en cualquier diligencia ante autoridad legalmente reconocida, y surtirán los mismos efectos jurídicos que la documentación impresa, siempre y cuando los mensajes de datos se ajusten a las disposiciones de este Código y a los lineamientos normativos correspondientes.</p>
                                    <p><b>Artículo 90.-</b> Se presumirá que un Mensaje de Datos proviene del Emisor si ha sido enviado: I. Por el propio Emisor; II. Usando medios de identificación, tales como claves o contraseñas del Emisor o por alguna persona facultada para actuar en nombre del Emisor respecto a ese Mensaje de Datos, o III. Por un Sistema de Información programado por el Emisor o en su nombre para que opere automáticamente</p>
                                    <p>I. Haya aplicado en forma adecuada el procedimiento acordado previamente con el Emisor, con el fin de establecer que el Mensaje de Datos provenía efectivamente de éste, o II. El Mensaje de Datos que reciba el Destinatario o la Parte que Confía, resulte de los actos de un Intermediario que le haya dado acceso a algún método utilizado por el Emisor para identificar un Mensaje de Datos como propio.</p>
                                    <p>…</p>
                                    <p><b>Artículo 93.-</b> <u>Cuando la ley exija la forma escrita para los actos, convenios o contratos, este supuesto se tendrá por cumplido tratándose de Mensaje de Datos, siempre que la información en él contenida se mantenga íntegra y sea accesible para su ulterior consulta, sin importar el formato en el que se encuentre o represente</u>. Cuando adicionalmente la ley exija la firma de las partes, dicho requisito se tendrá por cumplido tratándose de Mensaje de Datos, siempre que éste sea atribuible a dichas partes.</p>
                                    <p>En los casos en que la ley establezca como requisito que un acto jurídico deba otorgarse en instrumento ante fedatario público, éste y las partes obligadas podrán, a través de Mensajes de Datos, expresar los términos exactos en que las partes han decidido obligarse, en cuyo caso el fedatario público deberá hacer constar en el propio instrumento los elementos a través de los cuales se atribuyen dichos mensajes a las partes y conservar bajo su resguardo una versión íntegra de los mismos para su ulterior consulta, otorgando dicho instrumento de conformidad con la legislación aplicable que lo rige.</p>
                                    <p><b>Artículo 93 bis.-</b> Sin perjuicio de lo dispuesto en el artículo 49 de este Código, cuando la ley requiera que la información sea presentada y conservada en su forma original, ese requisito quedará satisfecho respecto a un Mensaje de Datos: I. Si existe garantía confiable de que se ha conservado la integridad de la información, a partir del momento en que se generó por primera vez en su forma definitiva, como Mensaje de Datos o en alguna otra forma, y II. De requerirse que la información sea presentada, si dicha información puede ser mostrada a la persona a la que se deba presentar.</p>
                                    <p>Para efectos de este artículo, se considerará que el contenido de un Mensaje de Datos es íntegro, si éste ha permanecido completo e inalterado independientemente de los cambios que hubiere podido sufrir el medio que lo contiene, resultado del proceso de comunicación, archivo o presentación. El grado de confiabilidad requerido será determinado conforme a los fines para los que se generó la información y de todas las circunstancias relevantes del caso.</p>
                                    <p><b>Artículo 95 bis 2.-</b> En materia de conservación de mensajes de datos, será responsabilidad estricta del comerciante mantenerlos bajo su control, acceso y resguardo directo, a fin de que su ulterior consulta pueda llevarse a cabo en cualquier momento.</p>
                                    <p><b>Artículo 96.-</b> Las disposiciones del presente Código serán aplicadas de modo que no excluyan, restrinjan o priven de efecto jurídico cualquier método para crear una Firma Electrónica.</p>
                                    <p><b>Artículo 97.-</b> Cuando la ley requiera o las partes acuerden la existencia de una Firma en relación con un Mensaje de Datos, se entenderá satisfecho dicho requerimiento si se utiliza una Firma Electrónica que resulte apropiada para los fines para los cuales se generó o comunicó ese Mensaje de Datos.</p>
                                    <p>La Firma Electrónica se considerará Avanzada o Fiable si cumple por lo menos los siguientes requisitos: I. Los Datos de Creación de la Firma, en el contexto en que son utilizados, corresponden exclusivamente al Firmante; II. Los Datos de Creación de la Firma estaban, en el momento de la firma, bajo el control exclusivo del Firmante; III. Es posible detectar cualquier alteración de la Firma Electrónica hecha después del momento de la firma; y IV. Respecto a la integridad de la información de un Mensaje de Datos, es posible detectar cualquier alteración de ésta hecha después del momento de la firma. </p>
                                    <p>Lo dispuesto en el presente artículo se entenderá sin perjuicio de la posibilidad de que cualquier persona demuestre de cualquier otra manera la fiabilidad de una Firma Electrónica; o presente pruebas de que una Firma Electrónica no es fiable.</p>
                                    <p><b>Artículo 98.-</b> Los Prestadores de Servicios de Certificación determinarán y harán del conocimiento de los usuarios si las Firmas Electrónicas Avanzadas o Fiables que les ofrecen cumplen o no los requerimientos dispuestos en las fracciones I a IV del artículo 97. </p>
                                    <p>La determinación que se haga, con arreglo al párrafo anterior, deberá ser compatible con las normas y criterios internacionales reconocidos.</p>
                                    <p><em>Entre otros.</em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        6. ¿Cuál es el propósito y fundamento de la E-Firma (antes Firma Electrónica Avanzada)?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>La E-Firma (antes Firma Electrónica Avanzada) se utiliza principalmente para el cumplimiento de obligaciones fiscales; sin embargo, por su estructuración, puede ser utilizada también para el mismo propósito que la Firma Electrónica y con sus mismas limitantes (ver pregunta y respuesta 5).</p>
                                    <p>El fundamento de la E-Firma (antes Firma Electrónica Avanzada) se encuentra en el Código Fiscal de la Federación, la Ley de Firma Electrónica Avanzada, la Resolución Miscelánea Fiscal vigente, Regla 2.2.15 <em>"Requisitos para la solicitud de generación o renovación del certificado de E.firma”</em> y el Anexo 1-A de la Resolución Miscelánea Fiscal vigente, fichas de trámites 105/CFF <em>"Solicitud de generación del Certificado de e.firma"</em> y 197/CFF <em>"Aclaración en las solicitudes de trámites de Contraseña o Certificado de E.firma"</em>, tal como se muestra a continuación, de forma enunciativa, mas no limitativa:</p>
                                    <p><b>CÓDIGO FISCAL DE LA FEDERACIÓN</b>.</p>
                                    <p><b>Artículo 17-D.-</b> <u>Cuando las disposiciones fiscales obliguen a presentar documentos, éstos deberán ser digitales y contener una firma electrónica avanzada del autor, salvo los casos que establezcan una regla diferente</u>. Las autoridades fiscales, mediante reglas de carácter general, podrán autorizar el uso de otras firmas electrónicas. Para los efectos mencionados en el párrafo anterior, se deberá contar con un certificado que confirme el vínculo entre un firmante y los datos de creación de una firma electrónica avanzada, expedido por el Servicio de Administración Tributaria cuando se trate de personas morales y de los sellos digitales previstos en el artículo 29 de este Código, y por un prestador de servicios de certificación autorizado por el Banco de México cuando se trate de personas físicas. El Banco de México publicará en el Diario Oficial de la Federación la denominación de los prestadores de los servicios mencionados que autorice y, en su caso, la revocación correspondiente. En los documentos digitales, una firma electrónica avanzada amparada por un certificado vigente sustituirá a la firma autógrafa del firmante, garantizará la integridad del documento y producirá los mismos efectos que las leyes otorgan a los documentos con firma autógrafa, teniendo el mismo valor probatorio. Se entiende por documento digital todo mensaje de datos que contiene información o escritura generada, enviada, recibida o archivada por medios electrónicos, ópticos o de cualquier otra tecnología.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        7. ¿Tiene que tener mi documento legal alguna leyenda para que pueda ser firmado por Firma Electrónica?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>Aunque las leyes aplicables explícitamente no lo requieren, se recomienda incluir el siguiente texto en los documentos que serán firmados de este modo: <br></p>
                                    <p><em>“Las partes acuerdan que el presente instrumento podrá ser firmado a través de las correspondientes firmas autógrafas y/o firmas electrónicas, indistintamente, las cuales aceptan y ratifican en este acto, para todos los efectos legales correspondientes.”</em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingEight">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        8. ¿La información de mi documento es confidencial?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>Sí, toda la información firmada y almacenada en FILEX es confidencial, lo que significa que nuestro equipo legal y nuestro equipo tecnológico <u>no</u> tienen acceso a dicha información.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingNine">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        9. ¿Están protegidos mis datos personales, así como información bancaria?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                <p>Sí, los datos personales se encuentran protegidos de conformidad Ley Federal de Protección de Datos Personales en Posesión de los Particulares y el Reglamento de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>
                                <p>Los datos bancarios se encuentran protegidos a través de [*].</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="300ms">
                        <div class="card">
                            <div class="card-header" id="headingTen">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed main-font text-blue btn-collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        10. ¿Cómo puedo contactar al equipo legal y/o tecnológico de FILEX?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                <div class="card-body mx-3 font-weight-200 text-grey font-16">
                                    <p>Para cualquier duda o comentario, favor de comunicarte al correo: <a href="mailto:"> informacion@filex.com.mx </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END BLOG -->

<!-- START CONTACT-FORM -->
<section id="contact" class="contact-sec">
    <div class="container">
        <!--Heading-->
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 text-center">
                <p class="text-blue font-weight-200 font-20">¿Alguna duda?</p>
                <h1 class="main-font font-weight-600 text-black">Estámos en contacto</h1>
            </div>
        </div>

        <!-- Contact-us -->
        <div class="row">
            <div class="col-12 col-lg-6 contact-details text-md-left">
                <div class="font-15 alt-font light-grey text-center text-lg-left">
                    {{ $contact->paragraph }}
                </div>
                <div class="row mt-5 wow fadeIn" data-wow-delay="200ms">
                    <!-- Address-Box -->
                    <div class="col-12 col-md-6 text-center text-lg-left">
                        <h4 class="main-font text-blue font-16 font-weight-600">Dirección</h4>
                        <p class="alt-font font-14 light-grey mt-3">{{ $contact->address }} </p>
                    </div>
                    <!-- Phone-Box -->
                    <div class="col-12 col-md-6 pt-5 pt-md-0 wow fadeIn text-center text-lg-left" data-wow-delay="400ms">
                        <h4 class="main-font text-blue font-16 font-weight-600">Teléfono</h4>
                        <p class="alt-font font-14 light-grey mt-3">Oficina : {{ $contact->addressPhone }} <br> Movil : {{ $contact->addressMovil }} </p>
                    </div>
                </div>

                <div class="row mt-5">
                    <!-- Email-Box -->
                    <div class="col-12 col-md-6 wow fadeIn text-center text-lg-left" data-wow-delay="600ms">
                        <h4 class="main-font text-blue font-16 font-weight-600">Email</h4>
                        <p class="alt-font font-14 light-grey mt-3">Contacto : <a href="mailto:{{ $contact->emailContact }}">{{ $contact->emailContact }}</a> <br> Ventas : <a href="mailto:{{ $contact->emailSales }}">{{ $contact->emailSales }}</a> </p>
                    </div>
                    <!-- Support-Box -->
                    <div class="col-12 col-md-6 pt-5 pt-md-0 wow fadeIn text-center text-lg-left" data-wow-delay="800ms">
                        <h4 class="main-font text-blue font-16 font-weight-600">Soporte</h4>
                        <p class="alt-font font-14 light-grey mt-3">Soporte : <a href="mailto:{{ $contact->emailSupport }}">{{ $contact->emailSupport }}</a></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 contact-form-box">
                <form class="contact-form" id="contact-form-data">
                    <div class="row">
                        <!-- Submission Popup -->
                        <div class="col-12">
                            <div class="col-sm-12 px-0" id="result"></div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nombre:" required="" id="first_name" name="firstName">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Apellido:" required="" id="last_name" name="lastName">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email:" required="" id="email" name="userEmail">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="tel" placeholder="Teléfono:" id="phone" name="userPhone">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Mensaje" id="message" name="userMessage"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-large strongBlue-long-btn rounded-pill w-100 btn-hvr-up btn-hvr-gray mt-4 contact_btn" id="submit_btn">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT-FORM -->

<!-- START GOOGLE MAP -->
{{-- <section id="map" class="p-0">
    <div class="row">
        <div class="col-12">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.9674103770367!2d-111.89998968532109!3d33.31966746342612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDE5JzEwLjgiTiAxMTHCsDUzJzUyLjEiVw!5e0!3m2!1sen!2s!4v1573716071790!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END GOOGLE-MAP -->

<!-- START FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <!--Social-->
            <div class="col-12 text-center">
                {{-- <div class="footer-social">
                    <ul class="list-unstyled social-icons social-icons-simple">
                        <li><a class="facebook_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-facebook-f" aria-hidden="true"></i> </a> </li>
                        <li><a class="twitter_bg_hvr2 wow fadeInDown" href="javascript:void(0)"><i class="fab fa-twitter" aria-hidden="true"></i> </a> </li>
                        <li><a class="googleplus_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-google-plus-g" aria-hidden="true"></i> </a> </li>
                        <li><a class="linkdin_bg_hvr2 wow fadeInDown" href="javascript:void(0)"><i class="fab fa-linkedin-in" aria-hidden="true"></i> </a> </li>
                        <li><a class="instagram_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-instagram" aria-hidden="true"></i> </a> </li>
                        <li><a class="pintrest_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-pinterest-p" aria-hidden="true"></i> </a> </li>
                    </ul>
                </div> --}}
                <!--Text-->
                <p class="company-about fadeIn mb-2"><a href="#">Aviso de Privacidad</a></p>
                <p class="company-about fadeIn">© 2020 Filex. Made With Love By <a href="#">Tooring</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!--START SCROLL TOP-->
<div class="go-top"><i class="fas fa-angle-up"></i><i class="fas fa-angle-up"></i></div>
<!--END SCROLL TOP-->

<!-- JavaScript -->
<script src="{{ asset('vendor/js/bundle.min.js') }}"></script>
<!-- Plugin Js -->
<script src="{{ asset('vendor/js/jquery.appear.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('vendor/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/js/parallaxie.min.js') }}"></script>
<script src="{{ asset('vendor/js/wow.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.cubeportfolio.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('vendor/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{ asset('vendor/js/morphext.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.video.min.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('frontend/js/isotope.pkgd.js') }}"></script>
<script src="{{ asset('frontend/js/modernizr.custom.97074.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.hoverdir.js') }}"></script>
<!-- custom script -->
<script src="{{ asset('vendor/js/contact_us.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
</body>
</html>
