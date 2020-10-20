@inject('request', 'Illuminate\Http\Request')

<!DOCTYPE html>

<html lang="zxx">



    <head>

        <meta charset="utf-8" />

        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <title>PMP | @yield('title')</title>

        <meta content="" name="description" />

        <meta content="" name="keywords" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta content="telephone=no" name="format-detection" />

        <meta name="HandheldFriendly" content="true" />

        <link rel="stylesheet" href="{{ asset('assets/assets/css/master.css')}}" />

        <!-- SWITCHER-->

        <link href="{{ asset('assets/assets/plugins/switcher/css/switcher.css') }}" rel="stylesheet" id="switcher-css" />

        <link href="{{ asset('assets/assets/plugins/switcher/css/color1.css') }}" rel="alternate stylesheet" title="color1" />

        <link href="{{ asset('assets/assets/plugins/switcher/css/color2.css') }}" rel="alternate stylesheet" title="color2" />

        <link href="{{ asset('assets/assets/plugins/switcher/css/color3.css') }}" rel="alternate stylesheet" title="color3" />

        <link href="{{ asset('assets/assets/plugins/switcher/css/color4.css') }}" rel="alternate stylesheet" title="color4" />

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/assets/media/content/icon/favicon.ico') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css') }}"/>

        <!--[if lt IE 9 ]>

<script src="assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">

<![endif]-->

@yield('css')
<style type="">
    @font-face {
    font-family: sfui;
    src: url({{ asset('assets/sfui/SFUIText-Medium.ttf') }});
    }
    body{
        font-family: sfui;
    }
    .active {
        color: #d01818;
    }
    .header-boxed-width .header-navibox-1{
        margin-left: 0px !important;
    }
    .navbar-brand {
        padding: 8px 0 0 44px !important;
    }

    .header-navibox-1{
        padding: 14px 0 !important;
    }
    .navbar .navbar-nav > li > a{
        font-size: 17px;
    }
    .navbar .navbar-nav > li{
        padding: 19px 8px !important;
    }
    .b-goods-1__name{
        text-transform: none !important;
        font-family: sfui;
    }
    h1,h2,h3,h4,h5{
        font-family: sfui !important;
    }
    .header-color-black *, .header.header-color-black .navbar .navbar-nav > li > a:hover{
        color: #000;
    }
    .navbar .navbar-nav > li > a.active{
        color: #d01818 !important;
    }
    .navbar .navbar-nav > li > a.active:hover{
        color: #000 !important;
    }
    body:not(.header-demo) .header.navbar-scrolling .navbar .navbar-nav > li:hover > a, .header.navbar-scrolling .navbar .navbar-nav > li a:hover{
        color: #000 !important;
    }
    .yamm.nav > li > a:hover{
        background: #B3B3B3 !important;
    }
    .text-truncate{
        overflow: hidden;
        white-space: nowrap;
    }
    .in-search{
        padding: 8px 22px 2px !important;
    }
    .in-search::after{
        color: rgba(0,47,52,.2) !important;
    }
    .in-search-mobile{
        margin-left: 20px;
        width: 205px;
        margin-bottom: 10px;
    }
    .in-search-mobile::after{
        color: rgba(0,47,52,.2) !important;
    }
    .btn-search{
        border: 0px !important;
        height: 36px;
    }
    .btn-search i{
        color: #ffffff !important;
    }

    .btn-search-mobile{
        border: 0px !important;
        margin-left: 20px;
    }
</style>

    </head>



    <body>

        <!-- Loader-->

        {{-- <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span>

        </div> --}}

        <!-- Loader end-->

        <!-- ==========================-->

        <!-- MOBILE MENU-->

        <!-- ==========================-->

        <div data-off-canvas="mobile-slidebar left overlay">

            <a class="navbar-brand scroll" href="{{ url('/') }}">

                <img class="normal-logo img-resonsive visible-xs visible-sm" src="{{ asset('assets/asset-new/PARLOGO2.png?v=4') }}" alt="logo" style="width: 100px;padding: 2%;"/>

                <img class="scroll-logo img-resonsive hidden-xs hidden-sm" src="{{ asset('assets/asset-new/PARLOGO2.png?v=4') }}" alt="logo" style="width: 100px" />

            </a>

            <ul class="nav navbar-nav">

                <li><a class="header-list__link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}" tabindex="-1">Home</a></li>

                                    {{-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Home<b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">

                                            <li><a href="{{ url('/') }}" tabindex="-1">Home one page</a></li>

                                            <li><a href="#" tabindex="-1">Home standart</a>

                                            </li>

                                        </ul>

                                    </li> --}}

                                    

                <li class="dropdown"><a class="dropdown-toggle {{ in_array($request->segment(1), ['searchFilter']) ? 'active' : '' }}" href="#" data-toggle="dropdown">Mobil Dijual<b class="caret"></b></a>

                    <ul class="dropdown-menu" role="menu">
                    @include('Frontend.layout.menu-dijual')

                    </ul>

                </li>

                <li><a href="{{ url('http://patrajasa-par.com') }}" tabindex="-1">Info PAR</a></li>
            </ul>

            @yield('nav-search-mobil')
            {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 in-search-mobile" type="search" placeholder="Temukan mobil yang anda inginkan" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 btn-search-mobile btn-success" type="submit">Cari </button>
            </form> --}}

        </div>

        <div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">

            <!-- Start Switcher-->

            {{-- <div class="switcher-wrapper">

                <div class="demo_changer">

                    <div class="demo-icon text-primary"><i class="fa fa-cog fa-spin fa-2x"></i>

                    </div>

                    <div class="form_holder">

                        <div class="predefined_styles">

                            <div class="skin-theme-switcher">

                                <h4>Color</h4>

                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1" style="background-color:#d01818"></a>

                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color2" style="background-color:#FFAC3A"></a>

                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color3" style="background-color:#28af0f"></a>

                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color4" style="background-color:#e425e9"></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div> --}}

            <!-- end switcher-->

            <!-- ==========================-->

            <!-- SEARCH MODAL-->

            <!-- ==========================-->

            <div class="header-search open-search">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

                            <div class="navbar-search">

                                <form class="search-global">

                                    <input class="search-global__input" type="text" placeholder="Type to search" autocomplete="off" name="s" value="" />

                                    <button class="search-global__btn"><i class="icon stroke icon-Search"></i>

                                    </button>

                                    <div class="search-global__note">Begin typing your search above and press return to search.</div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <button class="search-close close" type="button"><i class="fa fa-times"></i>

                </button>

            </div>

            <div data-off-canvas="slidebar-1 left overlay">

                <ul class="nav navbar-nav">

                    <li><a class="scrollTo" href="#features-section">features</a>

                    </li>

                    <li><a class="scrollTo" href="#services-section">Services</a>

                    </li>

                    <li><a class="scrollTo" href="#works-section">Works</a>

                    </li>

                    <li><a class="scrollTo" href="#about-section">About</a>

                    </li>

                    <li><a class="scrollTo" href="#team-section">Team</a>

                    </li>

                    <li><a href="#">News</a>

                        <div class="wrap-inside-nav">

                            <div class="inside-col">

                                <ul class="inside-nav">

                                    <li><a href="#">Blog 1</a>

                                    </li>

                                    <li><a href="#">Blog 2</a>

                                    </li>

                                    <li><a href="#">Blog single</a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </li>

                    <li><a href="#">Portfolio</a>

                        <div class="wrap-inside-nav">

                            <div class="inside-col">

                                <ul class="inside-nav">

                                    <li><a href="#">Portfolio</a>

                                    </li>

                                    <li><a href="#">Portfolio single</a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </li>

                    <li><a href="#">Contact</a>

                        <div class="wrap-inside-nav">

                            <div class="inside-col">

                                <ul class="inside-nav">

                                    <li><a href="#">Contact 1</a>

                                    </li>

                                    <li><a href="#">Contact 2</a>

                                    </li>

                                    <li><a href="#">Contact 3</a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </li>

                </ul>

            </div>

            <header class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">

                <div class="container container-boxed-width">

                    <div class="top-bar">

                        <div class="container">

                            <div class="header-topbarbox-1">

                                <ul>

                                    <li><a href="mailto:Parmobil@par.com">Parmobil@par.com</a></li> |

                                    <li>Senin s/d Jum'at : 09:00 to 18:00 WIB</li>

                                    {{-- <li>Bekasi, Jawa Barat ID 19456</li> --}}

                                </ul>

                            </div>
                            <!-- Login & Register-->
                            <div class="header-topbarbox-2">

                                <ul>

                                    <li><a href="#">| Login | Register</a></li> |

                                </ul>

                            </div>
                            <!-- End Login & Register-->

                            {{-- <div class="header-topbarbox-2">

                                <ul class="social-links">

                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-twitter"></i></a>

                                    </li>

                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-facebook"></i></a>

                                    </li>

                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-linkedin"></i></a>

                                    </li>

                                    <li class="li-last"><a href="/" target="_blank"><i class="social_icons fa fa-instagram"></i></a>

                                    </li>

                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-youtube-play"></i></a>

                                    </li>

                                </ul>

                            </div> --}}

                        </div>

                    </div>

                    <nav class="navbar" id="nav" style="-webkit-box-shadow: 0px 5px 5px -5px rgba(0,0,0,0.4);-moz-box-shadow: 0px 5px 5px -5px rgba(0,0,0,0.4);box-shadow: 0px 5px 5px -5px rgba(0,0,0,0.4);">

                        <div class="container">

                            <div class="header-navibox-1">

                                <!-- Mobile Trigger Start-->

                                <button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
                                    
                                </button>

                                <!-- Mobile Trigger End-->

                                <a class="navbar-brand scroll" href="{{ url('/') }}">

                                    <img class="normal-logo img-responsive" src="{{ asset('assets/asset-new/PARLOGO2.png') }}" alt="logo" style="width: 100px;" />

                                    <img class="scroll-logo hidden-xs img-responsive" src="{{ asset('assets/asset-new/PARLOGO2.png') }}" alt="logo" style="width: 100px;"/>

                                </a>

                            </div>

                            <div class="header-navibox-2">

                                <ul class="yamm main-menu nav navbar-nav">

                                    <li><a class="header-list__link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}" tabindex="-1">Home</a></li>

                                    {{-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Home<b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">

                                            <li><a href="{{ url('/') }}" tabindex="-1">Home one page</a></li>

                                            <li><a href="#" tabindex="-1">Home standart</a>

                                            </li>

                                        </ul>

                                    </li> --}}


                                    <li class="dropdown"><a class="dropdown-toggle {{ in_array($request->segment(1), ['searchFilter']) ? 'active' : '' }}" href="#" data-toggle="dropdown">Mobil Dijual<b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">
                                            @include('Frontend.layout.menu-dijual')
                                        </ul>

                                    </li>

                                    <li><a href="{{ url('http://patrajasa-par.com') }}" tabindex="-1">Info PAR</a></li>

                                    <li><a href="#" tabindex="-1">Login </a></li>

                                    <li><a href="#" tabindex="-1">Register </a></li>

                                </ul>

                            </div>
                            {{-- <div class="header-navibox-3">
                                <ul class="yamm main-menu nav navbar-nav" style="margin-right: 40px !important">
                                    <li class="text-truncate">
                                        <form class="input-group" style="width: 438px;" action="{{ url('searchFilter') }}" method="get">
                                            <input class="form-control in-search" name="search" placeholder="Temukan mobil yang anda inginkan" autocomplete="off" autofocus="autofocus" type="text" aria-label="Small">
                                            <div class="input-group-btn">
                                                <button class="btn btn-outline-success btn-primary btn-search" type="submit"><i class="fa fa-white fa-search"></i></button>
                                            </div>
                                            <input type="hidden" name="tipeMobilFilter">
                                            <input type="hidden" name="merekFilter">
                                            <input type="hidden" name="tahunFilter">
                                            <input type="hidden" name="lokasiFilter">
                                            <input type="hidden" name="transmisiFilter">
                                            <input type="hidden" name="bahan_bakarFilter">
                                            <input type="hidden" name="filterHargaLow">
                                            <input type="hidden" name="filterHargaHigh">
                                        </form>
                                    </li>    
                                </ul>

                            </div> --}}
                            @yield('nav-search')

                        </div>

                    </nav>

                </div>

            </header>

            <!-- end .header-->

            @yield('slider')

            

            <!-- end .main-slider-->

            @yield('content')

            <!-- end .section-default-->

            <footer class="footer area-bg">

                <div class="area-bg__inner">

                    <div class="footer__main">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-2">

                                    <div class="footer-section">

                                        <a class="footer__logo" href="{{ url('/') }}">

                                            <img class="img-responsive" src="{{ asset('assets/assets/media/general/PAR-LOGO-2-Putih.png') }}" alt="Logo" style="margin-left: -20px;width: 75%;" />

                                        </a>

                                        <!-- end .social-list-->

                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="footer-section">

                                        

                                        <div class="footer__info">Komitmen pelayanan prima dengan standar keamanan premium serta kenyamanan yang memudahkan menjadi visi kami untuk memuaskan pelanggan. Call Center kami siap 24 jam untuk membantu pelanggan saat menemui kendala ketika menggunakan layanan kami. Hubungi kami di 1 500 751.</div>
                                        <!-- end .social-list-->

                                    </div>

                                </div>

                                <div class="col-md-2">

                                   <section class="footer-section footer-section_list-columns">

                                        <h3 class="footer-section__title ui-title-inner">Jual Beli<hr></h3>

                                        <ul class="footer-list list-unstyled">

                                            <li class="footer-contact"><a class="footer-list__link" href="{{ url('searchFilter')}}">Mobil Dijual</a>

                                            </li>

                                        </ul>

                                    </section>

                                </div>

                                <div class="col-md-3">

                                    <section class="footer-section">

                                        <h3 class="footer-section__title ui-title-inner">Company Profile<hr></h3>

                                        <a class="footer-list__link" href="http://patrajasa-par.com/">patrajasa-par.com</a>

                                    </section>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="container">

                            <div class="row" style="margin-bottom: 2%;">

                                <div class="col-xs-12">
                                    <center>
                                    ©Copyright 2019 Prima Armada Raya | Powered by <a class="copyright__brand" href="http://goodeva.co.id">Goodeva Technology</a>
                                    </center>

                                </div>

                            </div>

                        </div>


                </div>

            </footer>

            <!-- .footer-->

        </div>

        <!-- end layout-theme-->





        <!-- ++++++++++++-->

        <!-- MAIN SCRIPTS-->

        <!-- ++++++++++++-->

        <script src="{{ asset('assets/assets/libs/jquery-1.12.4.min.js') }}"></script>

        <script src="{{ asset('assets/assets/libs/jquery-migrate-1.2.1.js') }}"></script>

        <!-- Bootstrap-->

        <script src="{{ asset('assets/assets/libs/bootstrap/bootstrap.min.js') }}"></script>

        <!-- User customization-->

        <script src="{{ asset('assets/assets/js/custom.js') }}"></script>

        <!-- Headers scripts-->

        <script src="{{ asset('assets/assets/plugins/headers/slidebar.js') }}"></script>

        <script src="{{ asset('assets/assets/plugins/headers/header.js') }}"></script>

        <!-- Color scheme-->

        <script src="{{ asset('assets/assets/plugins/switcher/js/dmss.js') }}"></script>

        <!-- Select customization & Color scheme-->

        <script src="{{ asset('assets/assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

        <!-- Slider-->

        <script src="{{ asset('assets/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

        <!-- Pop-up window-->

        <script src="{{ asset('assets/assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

        <!-- Mail scripts-->

        <script src="{{ asset('assets/assets/plugins/jqBootstrapValidation.js') }}"></script>

        {{-- <script src="{{ asset('assets/assets/plugins/contact_me.js') }}"></script> --}}

        <!-- Filter and sorting images-->

        <script src="{{ asset('assets/assets/plugins/isotope/isotope.pkgd.min.js') }}"></script>

        <script src="{{ asset('assets/assets/plugins/isotope/imagesLoaded.js') }}"></script>

        <!-- Progress numbers-->

        <script src="{{ asset('assets/assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js') }}"></script>

        <script src="{{ asset('assets/assets/plugins/rendro-easy-pie-chart/waypoints.min.js') }}"></script>

        <!-- NoUiSlider-->

        <script src="{{ asset('assets/assets/plugins/noUiSlider/nouislider.min.js') }}"></script>

        <script src="{{ asset('assets/assets/plugins/noUiSlider/wNumb.js') }}"></script>

        <!-- Animations-->

        <script src="{{ asset('assets/assets/plugins/scrollreveal/scrollreveal.min.js') }}"></script>

        <!-- Main slider-->

        <script src="{{ asset('assets/assets/plugins/slider-pro/jquery.sliderPro.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/slick/slick.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.slider-home').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 99,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    dots: true,
                    centerMode: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    focusOnSelect: true
                });
                $('.same-2').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                        },
                        {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                        },
                        {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });
                $('.same').slick({
                    centerMode: true,
                    centerPadding: '60px',
                    slidesToShow: 3,
                    responsive: [
                        {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                        },
                        {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                        }
                    ]
                });
            });
        </script>

    @yield('js')

    </body>



</html>