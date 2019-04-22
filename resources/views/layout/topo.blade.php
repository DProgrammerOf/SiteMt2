<!DOCTYPE html>
<html lang="en">
@php
    
    if(!isset($pagina)){
        $pagina = '';
    }

@endphp
<!-- Mirrored from dev.team-quantum.org/Ayora2/Downloads by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Dec 2018 21:37:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!--

    /**
     * Copyright © 2017
     * Brought to you by:
     * ___________                    ________                       __
     * \__    ___/___ _____    _____  \_____  \  __ _______    _____/  |_ __ __  _____
     *   |    |_/ __ \\__  \  /     \  /  / \  \|  |  \__  \  /    \   __\  |  \/     \
     *   |    |\  ___/ / __ \|  Y Y  \/   \_/.  \  |  // __ \|   |  \  | |  |  /  Y Y  \
     *   |____| \___  >____  /__|_|  /\_____\ \_/____/(____  /___|  /__| |____/|__|_|  /
     *              \/     \/      \/        \__>          \/     \/                 \/
     *                          https://github.com/Team-Quantum
     *                      .PolluX / https://github.com/RealPolluX
     */

    -->

    <!-- SEO -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or 'Mt2Plus' }}</title>
    <meta name="description" content="Mt2 Live - Servidor Metin!">
    <link rel="author" href="http://mt2plus-temp-com.umbler.net/" content="Mt2 Live" />
    <meta property="og:title" content="Mt2 Live"/>
    <meta name="keywords" content="metin2, private server, mt2live" />

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300i,400,700%7cMarcellus+SC" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('ayora/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ayora/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ayora/bower_components/ionicons/css/ionicons.min.css') }}">
    <!-- Revolution Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ayora/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ayora/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ayora/plugins/revolution/css/navigation.css') }}">
    <!-- Flickity -->
    <link rel="stylesheet" href="{{ asset('ayora/bower_components/flickity/dist/flickity.min.css') }}">
    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ayora/bower_components/photoswipe/dist/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ayora/bower_components/photoswipe/dist/default-skin/default-skin.css') }}">
    <!-- Prism -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ayora/bower_components/prism/themes/prism-tomorrow.css') }}">
    <!-- GODLIKE -->
    <link rel="stylesheet" href="{{ asset('ayora/css/godlike.css') }}">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('ayora/css/custom.css') }}">


    <!-- OLD WebSite
    <link href="{{ asset('assets/stylesheets/responsive-slider.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.style.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.animate.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/application.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/mobile.css') }}" rel="stylesheet" type="text/css" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('assets/stylesheets/jquery.owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/responsive-slider.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.global.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/stylesheets/cs.style.css') }}" rel="stylesheet" type="text/css" media="all">
    
    <script src="{{ asset('assets/javascripts/modernizr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/cs.global.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/cs.script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/jquery.responsive-slider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/jquery.imagesloaded.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/application.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/jquery.form.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/owl.carousel.min.js') }}" type="text/javascript"></script> !-->
<!-------------------->
    <link href="{{ asset('global/status.css') }}" rel="stylesheet" type="text/css" media="all">
    @stack('layoutstilos')
    <!-- JS -->
    <script src="{{ asset('ayora/bower_components/jquery/dist/jquery.min.js') }}"></script>


    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('ayora/live/57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('ayora/live/60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('ayora/live/72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ayora/live/76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('ayora/live/114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('ayora/live/120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('ayora/live/144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('ayora/live/152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('ayora/live/180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('ayora/live/192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('ayora/live/32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('ayora/live/96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('ayora/live/16x16.png') }}">
    <link rel="manifest" href="{{ asset('ayora/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <style type="text/css">
        .divImperadorMain {
            max-width: 100% !important;
            width: 100vw !important;
            position: relative !important;
        }
        .divImperador {
            width: 100% !important;
            max-width: 100% !important;
            background: #fff no-repeat !important;
            padding: 0% 5%;
            height: 100% !important;
        }
        .divImperador div {
            position: relative !important;
            float: left;
            margin: 0 !important;
            background: no-repeat;
            margin-top: 50px !important;
        }

        @media only screen and (max-width: 751px) {
              .divImperador {
                padding: 0% 5% 5% 15%;
            }
        }
    </style>
</head>
<body>
    <!-- START: Page Preloader -->
    <div class="nk-preloader">
        <!--
         Preloader animation
         data-close-... data used for closing preloader
         data-open-...  data used for opening preloader
    -->
        <div class="nk-preloader-bg" style="background-color: #000;" data-close-frames="23" data-close-speed="1.2"
             data-close-sprites="{{ asset('ayora/img/preloader-bg.png') }}" data-open-frames="23"
             data-open-speed="1.2" data-open-sprites="{{ asset('ayora/img/preloader-bg-bw.png') }}">
        </div>

        <div class="nk-preloader-content">
            <div>
                <img class="nk-img" src="{{ asset('ayora/live/180x180.png') }}"
                     alt="MT2 Live!" width="170">
                <div class="nk-preloader-animation"></div>
            </div>
        </div>

        <!--<div class="nk-preloader-skip">Skip</div>-->
    </div>
    <!-- END: Page Preloader -->

    <!-- START: Page Background -->
    <div class="nk-page-background op-5" data-bg-mp4="{{ asset('ayora/video/bg-2.mp4') }}"
         data-bg-webm="ayora/video/bg-2.webm" data-bg-ogv="{{ asset('ayora/video/bg-2.ogv') }}"
         data-bg-poster="{{ asset('ayora/video/bg-2.jpg') }}"></div>
    <!-- END: Page Background -->

    <!-- START: Page Border -->
    <div class="nk-page-border">
        <div class="nk-page-border-t"></div>
        <div class="nk-page-border-r"></div>
        <div class="nk-page-border-b"></div>
        <div class="nk-page-border-l"></div>
    </div>
    <!-- END: Page Border -->

    <!-- ######################################################################################################### -->

    
<header class="nk-header nk-header-opaque">


    <!--
START: Top Contacts

Additional Classes:
    .nk-contacts-top-light
-->
    <div class="nk-contacts-top">
        <div class="container">
            <div id="contact">
                <div class="nk-contacts-left">
                    <div class="nk-navbar">
                        <ul class="nk-nav">
                            <li>Contact: </li>
                            <li><a href="https://dev.team-quantum.org/cdn-cgi/l/email-protection#3051545d595e7051495f4251021e5545"><span class="__cf_email__" data-cfemail="f9989d949097b99880968b98cbd79c8c">[email&#160;protected]</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="nk-contacts-right">
                    <div class="nk-navbar">
                        <ul class="nk-nav">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <span class="ion-social-facebook-outline"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/c/BirdMachineCS" target="_blank">
                                    <span class="ion-social-youtube-outline"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://discord.gg/Sw49T8N">
                                    <span class="ion-earth"></span>
                                </a>
                            </li>
                            <li>
                                <a href="ts3server_/62.104.20.html">
                                    <span class="ion-chatboxes"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Top Contacts -->


    <!--
    START: Navbar

    Additional Classes:
        .nk-navbar-sticky
        .nk-navbar-transparent
        .nk-navbar-autohide
        .nk-navbar-light
        .nk-navbar-no-link-effect
-->
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-transparent nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">

                <a href="/" class="nk-nav-logo">
                    <img src="{{ asset('ayora/live/57x57.png') }}" alt="">
                </a>


                <ul class="nk-nav nk-nav-right hidden-md-down" data-nav-mobile="#nk-nav-mobile">
                    <li class="@if($pagina=='home') active @endif nk-item">
                        <a href="/">Pagina Inicial</a>
                    </li>

                     <li class="@if($pagina=='cadastro') active @endif nk-item">
                        <a href="/cadastro">Cadastro</a>                    </li>
                  
                    <li class="@if($pagina=='download') active @endif nk-item">
                        <a href="/download">Downloads</a>
                    </li>

                     <li class="@if($pagina=='ranking') active @endif nk-drop-item">
                        <a href="/ranking">Ranking</a>
                        <ul class="dropdown">
                            <li>
                                <a href="/ranking/personagens" class="link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span>Evento</span></span><span class="link-effect-r"><span>Evento</span></span><span class="link-effect-shade"><span>Evento</span></span></span></a>
                            </li>
                            <li>
                                <a href="/ranking/guildas" class="link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span>Guilda</span></span><span class="link-effect-r"><span>Guilda</span></span><span class="link-effect-shade"><span>Guilda</span></span></span></a>
                            </li>
                            <li>
                                <a href="/ranking/killers" class="link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span>Kill</span></span><span class="link-effect-r"><span>Kill</span></span><span class="link-effect-shade"><span>Kill</span></span></span></a>
                            </li>
                            <li>
                                <a href="/ranking/insignia" class="link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span>Insiginia</span></span><span class="link-effect-r"><span>Insiginia</span></span><span class="link-effect-shade"><span>Insiginia</span></span></span></a>
                            </li>
                             <li>
                                <a href="/ranking/encruzilhada" class="link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span>Encruzilhada</span></span><span class="link-effect-r"><span>Encruzilhada</span></span><span class="link-effect-shade"><span>Encruzilhada</span></span></span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="@if($pagina=='doacao') active @endif nk-item">
                        <a href="/doacao">Doação</a>
                    </li>

                    <li class="@if($pagina=='forum') active @endif nk-item">
                        <a href="#">Forum</a>
                    </li>
                   
                   

                   

                                    </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    <li class="single-icon hidden-lg-up">
                        <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                            <span class="nk-icon-burger">
                                <span class="nk-t-1"></span>
                                <span class="nk-t-2"></span>
                                <span class="nk-t-3"></span>
                            </span>
                        </a>
                    </li>
                    @if( !Auth::check() )
                                        <li class="single-icon">
                        <a href="#" class="nk-sign-toggle no-link-effect" data-nav-toggle="#nk-side-login">
                            <span class="nk-icon-toggle">
                                <span class="nk-icon-toggle-front">
                                    <span class="fa fa-sign-in"></span>
                                </span>
                                <span class="nk-icon-toggle-back">
                                    <span class="nk-icon-close"></span>
                                </span>
                            </span>
                        </a>
                    </li>
                    @else
                    <li>
                    <a href="/painel/usuario">PAINEL USUARIO</a>
                    </li>
                    @endif
                                    </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>

<!--
    START: Right Navbar

    Additional Classes:
        .nk-navbar-right-side
        .nk-navbar-left-side
        .nk-navbar-lg
        .nk-navbar-align-center
        .nk-navbar-align-right
        .nk-navbar-overlay-content
        .nk-navbar-light
        .nk-navbar-no-link-effect
-->
@if( !Auth::check() )

    <nav class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-lg nk-navbar-align-center nk-navbar-overlay-content"
         id="nk-side-login">

        <div class="nk-navbar-bg">
            <div class="bg-image" style="background-image: url('{{ asset('ayora/img/bg-nav-side.jpg') }}')"></div>
        </div>
        <div class="nano">
            <div class="nano-content">
                <div class="nk-nav-table">

                    <div class="nk-nav-row">
                        <a href="/" class="nk-nav-logo">
                            <img src="{{ asset('ayora/live/114x114.png') }}" alt="" >
                        </a>
                    </div>

                    <div class="nk-nav-row nk-nav-row-full nk-nav-row-center">
                        <ul class="nk-nav">
                            <li class="">

                                <!-- LOGIN -->
                                <div class="nk-box-3" style="padding-top: 0px;"><h2 class="nk-title h3 text-center">
                                        Login</h2>
                                    <div class="nk-gap-1"></div><!-- START: Form 2 -->
                                    <form id="frmLogin" action="{{ URL::to('logar') }}" class="nk-form nk-form-style-1"
                                          method="post">
                                          {{ csrf_field() }}
                                        <input class="form-control required" name="login" placeholder="Login"
                                               aria-required="true" type="text">
                                        <div class="nk-gap"></div>
                                        <input class="form-control required" name="password" placeholder="Senha"
                                               aria-required="true" type="password">
                                        <div class="nk-gap">
                                            <a href=#>Esqueceu a senha?</a>
                                        </div>

                                        <div class="captcha-widget">
                                                                        </div>

                                        <div class="nk-gap"></div>
                                        <button class="nk-btn nk-btn-lg link-effect-4 ready" type="submit" name="auth"
                                                value="Abschicken">
                                        <span class="link-effect-inner">
                                            <span class="link-effect-l">
                                                <span>Logar</span>
                                            </span>
                                            <span class="link-effect-r">
                                                <span>Logar</span>
                                            </span>
                                            <span class="link-effect-shade">
                                                <span>Logar</span>
                                            </span>
                                        </span>
                                        </button>
                                        <button class="nk-btn nk-btn-lg link-effect-4" type="reset">
                                        <span class="link-effect-inner">
                                            <span class="link-effect-l">
                                                <span>Limpar</span>
                                            </span>
                                            <span class="link-effect-r">
                                                <span>Limpar</span>
                                            </span>
                                            <span class="link-effect-shade">
                                                <span>Limpar</span>
                                            </span>
                                        </span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Right Navbar -->
@endif

    

<!--
START: Navbar Mobile

Additional Classes:
    .nk-navbar-left-side
    .nk-navbar-right-side
    .nk-navbar-lg
    .nk-navbar-overlay-content
    .nk-navbar-light
    .nk-navbar-no-link-effect
-->
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-left-side nk-navbar-overlay-content hidden-lg-up">
    <div class="nano">
        <div class="nano-content">
            <a href="/" class="nk-nav-logo">
                <img src="{{ asset('ayora/live/96x96.png') }}" alt="">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END: Navbar Mobile -->
<div class="nk-main">    <!-- START: Header Title -->
    <!--
Additional Classes:
    .nk-header-title-sm
    .nk-header-title-md
    .nk-header-title-lg
    .nk-header-title-xl
    .nk-header-title-full
    .nk-header-title-parallax
    .nk-header-title-parallax-opacity
    .nk-header-title-boxed
-->
            <div class="nk-header-title nk-header-title-sm nk-header-title-parallax nk-header-title-parallax-opacity">
                            <div class="bg-image">
                            <div class="op-4" style="background-image: url('{{ asset('ayora/img/image-5.jpg') }} ')">
                            </div></div>        <div class="nk-header-table">
            <div class="nk-header-table-cell">
                <div class="container">
                    <div class="nk-header-text">
                        <h1 class="nk-title display-3">Live</h1>
                        <!--<div>
                            Titte raus, es ist Sommer!
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Header Title -->
    @yield('conteudo');  
    <!-- START: Footer -->
    <!--
    Additional Classes:
    .nk-footer-parallax
    .nk-footer-parallax-opacity
    -->
<div class="nk-gap-4"></div>
<div class="nk-gap-4"></div>
<div class="nk-gap-4"></div>
    <footer style="display: none;" class="nk-footer nk-footer-parallax nk-footer-parallax-opacity">
        <img class="nk-footer-top-corner" src="{{ asset('ayora/img/footer-corner.png') }}" alt="">
        <div class="container">
            <div class="nk-gap-2"></div>
            <p>
                This site is not associated with YMIR or WEBZEN. The METIN2 logo, and the WEBZEN YMIR logos are trademarks <br>
                or registered trademarks of WEBZEN, INC. All other trademarks are the property of their respective owners.<br>
                <a href="index.html" target="_self" rel="nofollow">Ayora2</a> is a Metin2 online game server.
            </p>
            <p>
                Copyright &copy; 2018  <a href="index.html" target="_self" rel="nofollow">Ayora2</a>. &bull; Developed by <a href="https://github.com/RealPolluX" target="_blank">RealPolluX</a> &bull; All rights reserved.
                <br>  Powered by <a>QuantumCMS <small>v1.9.8</small></a>. &bull; Page generated in 0.0075                seconds.
            </p>
            <div class="nk-gap"></div>
        </div>
    </footer>
    <!-- END: Footer -->

    <!--
        START: Side Buttons
            .nk-side-buttons-visible
    -->
    <div class="nk-side-buttons nk-side-buttons-visible">
        <ul>
            <li>
                <span class="nk-btn nk-btn-lg nk-btn-icon nk-bg-audio-toggle">
                    <span class="icon">
                        <span class="ion-android-volume-up nk-bg-audio-pause-icon"></span>
                        <span class="ion-android-volume-off nk-bg-audio-play-icon"></span>
                    </span>
                </span>
            </li>
            <li class="nk-scroll-top">
                <span class="nk-btn nk-btn-lg nk-btn-icon">
                    <span class="icon ion-ios-arrow-up"></span>
                </span>
            </li>
        </ul>
    </div>
    <!-- END: Side Buttons -->
</div>

    <!-- ######################################################################################################### -->

    <!-- START: Scripts -->

    <!-- GSAP -->
    
    <script src="{{ asset('ayora/bower_components/gsap/src/minified/TweenMax.min.js') }}"></script>
    <script src="{{ asset('ayora/bower_components/gsap/src/minified/plugins/ScrollToPlugin.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('ayora/bower_components/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('ayora/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Sticky Kit -->
    <script src="{{ asset('ayora/bower_components/sticky-kit/dist/sticky-kit.min.js') }}"></script>

    <!-- Jarallax -->
    <script src="{{ asset('ayora/bower_components/jarallax/dist/jarallax.min.js') }}"></script>
    <script src="{{ asset('ayora/bower_components/jarallax/dist/jarallax-video.min.js') }}"></script>

    <!-- imagesLoaded -->
    <script src="{{ asset('ayora/bower_components/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

    <!-- Flickity -->
    <script src="{{ asset('ayora/bower_components/flickity/dist/flickity.pkgd.min.js') }}"></script>

    <!-- Isotope -->
    <script src="{{ asset('ayora/bower_components/isotope/dist/isotope.pkgd.min.js') }}"></script>

    <!-- Photoswipe -->
    <script src="{{ asset('ayora/bower_components/photoswipe/dist/photoswipe.min.js') }}"></script>
    <script src="{{ asset('ayora/bower_components/photoswipe/dist/photoswipe-ui-default.min.js') }}"></script>

    <!-- Typed.js -->
    <script src="{{ asset('ayora/bower_components/typed.js/dist/typed.min.js') }}"></script>

    <!-- Jquery Form -->
    <script src="{{ asset('ayora/bower_components/jquery-form/dist/jquery.form.min.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ asset('ayora/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <!-- Jquery Countdown + Moment -->
    <script src="{{ asset('ayora/bower_components/jquery.countdown/dist/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('ayora/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('ayora/bower_components/moment-timezone/builds/moment-timezone-with-data.js') }}"></script>

    <!-- Hammer.js -->
    <script src="{{ asset('ayora/bower_components/hammer.js/hammer.min.js') }}"></script>

    <!-- NanoSroller -->
    <script src="{{ asset('ayora/bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js') }}"></script>

    <!-- SoundManager2 -->
    <script src="{{ asset('ayora/bower_components/SoundManager2/script/soundmanager2-nodebug-jsmin.js') }}"></script>

    <!-- DateTimePicker -->
    <script src="{{ asset('ayora/bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="{{ asset('ayora/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ayora/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ayora/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ayora/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ayora/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>

    <!-- Keymaster -->
    <script src="{{ asset('ayora/bower_components/keymaster/keymaster.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('ayora/bower_components/summernote/dist/summernote.min.js') }}"></script>

    <!-- Prism -->
    <script src="{{ asset('ayora/bower_components/prism/prism.js') }}"></script>

    <!-- GODLIKE -->
    <script src="{{ asset('ayora/js/godlike.min.js') }}"></script>
    <script>
        ;(function() {
            'use strict';

            /*------------------------------------------------------------------

             Theme Options

             -------------------------------------------------------------------*/
            var options = {
                enableSearchAutofocus: false,
                enableActionLikeAnimation: true,
                enableShortcuts: false,
                enableFadeBetweenPages: true,
                enableMouseParallax: true,
                enableCookieAlert: true,
                scrollToAnchorSpeed: 700,
                parallaxSpeed: 0.6,
                backgroundMusic: 'ayora/sound/purpleplanetmusic-desolation.mp3',
                backgroundMusicVolume: 35,
                backgroundMusicAutoplay: true,

                templates: {
                    secondaryNavbarBackItem: 'Back',

                    likeAnimationLiked: 'Liked!',
                    likeAnimationDisliked: 'Disliked!',

                    cookieAlert: '<span class="nk-cookie-alert-close"><span class="nk-icon-close"></span></span>\n            Usamos cookies para fornecer o nosso serviço e garantir que você obtenha a melhor experiência do usuário no Live. Ao navegar neste site, você concorda com nossa política.\n            <div class="nk-gap"></div>\n            <span class="nk-cookie-alert-confirm nk-btn link-effect-4 nk-btn-bg-white nk-btn-color-dark-1">OK!</span>',

                    plainVideoIcon: '<span class="nk-video-icon"><i class="fa fa-play pl-5"></i></span>',
                    plainVideoLoadIcon: '<span class="nk-loading-spinner"><i></i></span>',
                    fullscreenVideoClose: '<span class="nk-icon-close"></span>',
                    gifIcon: '<span class="nk-gif-icon"><i class="fa fa-hand-pointer-o"></i></span>',

                    audioPlainButton: '<div class="nk-audio-plain-play-pause">\n                <span class="nk-audio-plain-play">\n                    <span class="ion-play ml-3"></span>\n                </span>\n                <span class="nk-audio-plain-pause">\n                    <span class="ion-pause"></span>\n                </span>\n            </div>',

                    instagram: '<div class="col-4">\n                <a href="#link}}" target="_blank">\n                    <img src="#image}}" alt="#caption}}" class="nk-img-stretch">\n                </a>\n            </div>',
                    instagramLoadingText: 'Loading...',
                    instagramFailText: 'Failed to fetch data',
                    instagramApiPath: 'php/instagram/instagram.php',

                    twitter: '<div class="nk-twitter">\n                <span class="nk-twitter-icon fa fa-twitter"></span>\n                <div class="nk-twitter-text">\n                   #tweet}}\n                </div>\n                <div class="nk-twitter-date">\n                    <span>#date}}</span>\n                </div>\n            </div>',
                    twitterLoadingText: 'Loading...',
                    twitterFailText: 'Failed to fetch data',
                    twitterApiPath: 'php/twitter/tweet.php',

                    countdown: '<div>\n                <span>%D</span>\n                Days\n            </div>\n            <div>\n                <span>%H</span>\n                Hours\n            </div>\n            <div>\n                <span>%M</span>\n                Minutes\n            </div>\n            <div>\n                <span>%S</span>\n                Seconds\n            </div>'
                },
                events: {
                    actionHeart: function actionHeart(params) {
                        params.updateIcon();

                        // fake timeout for demonstration
                        // Change on AJAX request or something
                        setTimeout(function () {
                            var result = params.currentNum + (params.type === 'like' ? 1 : -1);
                            params.updateNum(result);
                        }, 300);
                    },
                    actionLike: function actionLike(params) {
                        params.updateIcon();

                        // fake timeout for demonstration
                        // Change on AJAX request or something
                        setTimeout(function () {
                            var additional = 0;
                            if (params.type === 'like') {
                                if (params.isLiked) {
                                    additional = -2;
                                }
                                if (params.isDisliked) {
                                    additional = 1;
                                }
                            }
                            if (params.type === 'dislike') {
                                if (params.isLiked) {
                                    additional = -1;
                                }
                                if (params.isDisliked) {
                                    additional = 2;
                                }
                            }
                            var result = params.currentNum + (params.type === 'like' ? 1 : -1) + additional;
                            params.updateNum(result);
                        }, 300);
                    }
                }
            };

            if (typeof Godlike !== 'undefined') {
                Godlike.setOptions(options);
                Godlike.init();
            }
        }());
    </script>
    <!-- END: Scripts -->

    <script type="text/javascript">
        var tpj = jQuery;
        var revapi50;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_50_1").revolution === undefined) {
                revslider_showDoubleJqueryError("#rev_slider_50_1");
            } else {
                revapi50 = tpj("#rev_slider_50_1").show().revolution({
                    sliderType: "carousel",
                    jsFileLocation: "ayora/plugins/revolution/js/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        onHoverStop: "off"
                    },
                    carousel: {
                        maxRotation: 8,
                        vary_rotation: "off",
                        minScale: 20,
                        vary_scale: "off",
                        horizontal_align: "center",
                        vertical_align: "center",
                        fadeout: "off",
                        vary_fade: "off",
                        maxVisibleItems: 3,
                        infinity: "on",
                        space: -90,
                        stretch: "off"
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    gridwidth: [800, 600, 400, 320],
                    gridheight: [600, 400, 320, 280],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "on",
                    stopAfterLoops: 0,
                    stopAtSlide: 0,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: true
                    }
                });
            }
        });
    </script>

    <style>
        .hidden-element {
            visibility: hidden;
            opacity: 0;
        }
    </style>
    

    

    <script type="text/javascript">
        function log(text) {
            console.log(text);
        }

        $(document).ready(function () {

            // e = html code/response, der eingefügt/geloggt wird!
            function refreshStatus(that) {
                log('ajax geladen');
               /* $.ajax({
                    url: 'https://dev.team-quantum.org/Ayora2/ajax.php',
                    type: 'GET',
                    data: {
                        ajax: 'pollux',
                        method: 'statusRefresh'
                    },
                    success: function (e) {
                        $('#serverStatusSpacer').html(e);
                    },
                    fail: function (e) {
                        log(e+' | status not refreshed!');
                    }
                })
                    .always(function(){
                        log('lade refresh');
                        _refresh_after_10_min();
                    });*/
            }

            function _refresh_after_10_min(){
                setTimeout(refreshStatus, 10*60*1000);
            }

            // führt den refresh beim seitenladen aus
           // refreshStatus();
        });
    </script>

</body>

<!-- Mirrored from dev.team-quantum.org/Ayora2/Downloads by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Dec 2018 21:37:02 GMT -->
</html>
