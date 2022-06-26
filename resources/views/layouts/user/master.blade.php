<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="seo & digital marketing">
    <meta name="keywords" content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company">
    <meta name="author" content="Themefisher.com">

   <title>Event </title>
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('user/plugins/bootstrap/css/bootstrap.css') }}">
    <!-- Icofont Css -->
    <link rel="stylesheet" href="{{ asset('user/plugins/fontawesome/css/all.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('user/plugins/animate-css/animate.css') }}">
    <!-- Icofont -->
    <link rel="stylesheet" href="{{ asset('user/plugins/icofont/icofont.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">


</head>


<body data-spy="scroll" data-target=".fixed-top">



<nav class="navbar navbar-expand-lg fixed-top trans-navigation">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="" class="img-fluid b-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
              </button>

            <div class="collapse navbar-collapse justify-content-end" id="mainNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="{{ url('/') }}">Home</a>
                    </li>
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript.void(0)" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                            @foreach (DB::table('categories')->get() as $item)

                            <a class="dropdown-item " href="{{ url('category/'.$item->slug) }}">
                                {{ $item->cat_title }}
                            </a>
                            @endforeach

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript.void(0)" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarWelcome">

                            @if (Route::has('login'))
                            @auth
                            <a class="dropdown-item" href="">
                                {{ Auth::user()->name }}
                            </a>
                            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                            <a class="dropdown-item" href="{{ url('order-list') }}">My order list</a>
                            @if (Auth::user()->role == 'admin')

                            <a class="dropdown-item " href="{{ url('/author') }}">Admin </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item " href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                            </a>
                            </form>

                            @else

                            <a href="{{ route('login') }}" class="dropdown-item ">Log in</a>

                            <a href="{{ route('register') }}" class="dropdown-item ">Registration</a>

                            @endauth
                            @endif

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="{{ url('/packages') }}">Packages</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="{{ url('contact-us') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--MAIN HEADER AREA END -->

<!--MAIN BANNER AREA START -->
@yield('content')
<!--  COUNTER AREA END  -->

<!--  FOOTER AREA START  -->
<section id="footer" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-8 col-md-8">
                <div class="footer-widget footer-link">
                    <h4>We concern about you<br> to grow business rapidly.</h4>
                    <p>Our main purpose is to capture and  make your special moments unforgatable with outstanding photography and video graphy as well.That's why we are hear for you</p>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 col-md-4">
                <div class="footer-widget footer-link">
                    <h4>About</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Team</a></li>
                       
                    </ul>
                </div>
            </div>

            <!-- This Quick link jkhn lagbe tkhn use korbo 

            <div class="col-lg-2 col-sm-6 col-md-6">
                <div class="footer-widget footer-link">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">How it Works</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Report Bug</a></li>
                        <li><a href="#">License</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                    </ul>
                </div>
            </div>
             This is a comment -->
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget footer-text">
                    <h4>Our location</h4>
                    <p class="mail"><span>Mail:</span> mirzanawshad@gmail.com</p>
                    <p><span>Phone :</span>+8801625716366</p>
                    <p><span>Location:</span>  Bhairab Bazar,Kishoreganj,Dhaka,Bangladesh </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer-copy">
                    © 2022 Promodise inc. All Rights Reserved.By Tazir Munna & Mirza Md. Nawshad
                </div>
            </div>
        </div>
    </div>
</section>
<!--  FOOTER AREA END  -->



    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('user/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('user/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
   <!-- Woow animtaion -->
    <script src="{{ asset('user/plugins/counterup/wow.min.js') }}"></script>
    <script src="{{ asset('user/plugins/counterup/jquery.easing.1.3.js') }}"></script>
     <!-- Counterup -->
    <script src="{{ asset('user/plugins/counterup/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('user/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- Google Map -->
    <script src="{{ asset('user/plugins/google-map/gmap3.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>
    <!-- Contact Form -->
    <script src="{{ asset('user/plugins/jquery/contact.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>

  </body>
  </html>
