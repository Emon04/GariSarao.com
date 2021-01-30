<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GariSarao</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('customerLendingHome/css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
<header>
    <div class="header-area ">
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i> info.garisarao@gmail.com</a></li>
                                <li><a href="#"> <i class="fa fa-phone"></i> 01735-215385</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="service.html">What We do?</a></li>
                                        <li><a href="service.html">What We do?</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> GariSarao <br>
                                .com </h3>
                            <p>GariSarao.com brings new opportunities <br>
                                to expand your business.</p>
                            <div class="video_service_btn">
                                <a href="{{ route('getService.home') }}" target="_blank" class="boxed-btn3">Visit Repair Services</a>
                                <a href="{{route('/')}}" target="_blank" class="boxed-btn3-white"> <i class="fa fa-play"></i>
                                    Get Car or Motor Parts</a>
                                <a href="{{ route('autoMobileWorkshop.register') }}" target="_blank" class="boxed-btn3">Become Registered Automobile Workshop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- service_area_start -->
<div class="service_area">
    @yield('content')

</div>
<!-- service_area_end -->

<!-- about  -->

<!--/ project  -->

<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="{{asset('customerLendingHome/img/footer_logo.png')}}" alt="">
                            </a>
                        </div>
                        <p>
                            Firmament morning sixth subdue darkness
                            creeping gathered divide.
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Consulting</a></li>
                            <li><a href="#">Finance</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Useful Links
                        </h3>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#"> Contact</a></li>
                            <li><a href="#"> Free quote</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <ul>
                            <li>200, D-block, Green lane USA</li>
                            <li>+10 367 467 8934</li>
                            <li><a href="#"> docmed@contact.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- link that opens popup -->

<!-- form itself end-->

<!-- form itself end -->

<!-- JS here -->
<script src="{{asset('customerLendingHome/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/popper.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/bootstrap.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/ajax-form.js')}}"></script>
<script src="{{asset('customerLendingHome/js/waypoints.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/scrollIt.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/wow.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/nice-select.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/plugins.js')}}"></script>
<script src="{{asset('customerLendingHome/js/gijgo.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/slick.min.js')}}"></script>
<!--contact js-->
<script src="{{asset('customerLendingHome/js/contact.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.form.js')}}"></script>
<script src="{{asset('customerLendingHome/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('customerLendingHome/js/mail-script.js')}}"></script>

<script src="{{asset('customerLendingHome/js/main.js')}}"></script>
</body>

</html>
