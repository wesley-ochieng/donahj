<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> JaneAller Music Events</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/janealler.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS
	============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

</head>

<body>


    <div class="main-wrapper">

        <!-- Preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- Header Start -->
        <div class="meeta-header-section meeta-header-2">

            <!-- Header Middle Start -->
            <div class="header-middle header-sticky">
                <div class="container">

                    <div class="header-wrap">
                        <!-- Header Logo Start -->
                        <div class="header-logo">
                            <a href="https://janeallermusic.com" target="_blank" ><img src="{{ asset('assets/images/janealler.png') }}" class="img-fluid" style="max-width: 81px" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Navigation Start -->
                        <div class="header-navigation d-none d-lg-block">
                            <ul class="main-menu">
                                <li class="active-menu"><a href="#">Home</a>
                                </li>
                                <li><a href="#about">About</a></li>
                                
                                <li><a href="#prices">Prices</a>
                                </li>
                                <li><a href="https://janeallermusic.com/contact/" target="_blank">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Header Navigation End -->

                        <!-- Header Meta Start -->
                        <div class="header-meta">

                            <div class="header-btn d-none d-md-block">
                                <a href="price.html" class="btn btn-primary">Buy Ticket Now</a>
                            </div>

                            <!-- Header Toggle Start -->
                            <div class="header-toggle d-lg-none">
                                <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            <!-- Header Toggle End -->

                        </div>
                        <!-- Header Meta End -->

                    </div>

                </div>
            </div>
            <!-- Header Middle End -->

        </div>
        <!-- Header End -->

        <!-- Mini Cart Start -->
        <div class="off-canvas">
            <div class="icon-close"></div>

            <!-- Mini Cart Box Start -->
            <div class="meeta-mini-cart-box">

                <div class="mini-cart-items">

                    <div class="mini-cart-item">
                        <div class="mini-cart-item-image">
                            <a href="#"><img src="assets/images/cart/cart-1.jpg" alt="Cart"></a>
                        </div>
                        <div class="mini-cart-item-content">
                            <h4 class="mini-cart-title"><a href="#">Virtual Event with Protected Content and Hidden Livestream </a></h4>
                            <p class="mini-cart-quantity">1 × $19.99</p>
                        </div>
                        <button class="btn-close"></button>
                    </div>

                    <div class="mini-cart-item">
                        <div class="mini-cart-item-image">
                            <a href="#"><img src="assets/images/cart/cart-2.jpg" alt="Cart"></a>
                        </div>
                        <div class="mini-cart-item-content">
                            <h4 class="mini-cart-title"><a href="#">Virtual Event with Protected Content and Hidden Livestream </a></h4>
                            <p class="mini-cart-quantity">1 × $19.99</p>
                        </div>
                        <button class="btn-close"></button>
                    </div>

                    <div class="mini-cart-item">
                        <div class="mini-cart-item-image">
                            <a href="#"><img src="assets/images/cart/cart-3.jpg" alt="Cart"></a>
                        </div>
                        <div class="mini-cart-item-content">
                            <h4 class="mini-cart-title"><a href="#">Virtual Event with Protected Content and Hidden Livestream </a></h4>
                            <p class="mini-cart-quantity">1 × $19.99</p>
                        </div>
                        <button class="btn-close"></button>
                    </div>

                </div>

                <div class="mini-cart-sub-total">
                    <p><strong>Subtotal:</strong> <span class="mini-cart-amount">$99.97</span></p>
                </div>
                <div class="mini-cart-sub-btn">
                    <a class="btn btn-primary" href="#">View cart</a>
                    <a class="btn btn-white" href="#">Checkout</a>
                </div>
            </div>
            <!-- Mini Cart Box End -->

        </div>
        <!-- Mini Cart End -->


        <!-- Offcanvas Start-->
        <div class="offcanvas offcanvas-start" id="offcanvasExample">
            <div class="offcanvas-header">
                <!-- Offcanvas Logo Start -->
                <div class="offcanvas-logo">
                    <a href="https://janeallermusic.com" target="_blank" ><img src="{{ asset('assets/images/janealler.png') }}" style="max-width: 81px" class="img-fluid" alt="Logo"></a>
                </div>
                <!-- Offcanvas Logo End -->
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i class="flaticon-close"></i></button>
            </div>

            <!-- Offcanvas Body Start -->
            <div class="offcanvas-body">
                <div class="offcanvas-menu offcanvas-menu-2">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="#">Home</a>
                        </li>
                        <li><a href="#about">About</a></li>
                        
                        <li><a href="#prices">Blog</a>
                        </li>
                        <li><a href="https://janeallermusic.com/contact/" target="_blank">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- Offcanvas Body End -->
        </div>
        <!-- Offcanvas End -->

        <!-- Slider Section Start  -->
        <div class="meeta-hero-section-2" style="background-image: url('{{ asset('storage/' . $upcoming_event->poster_image) }}');">
            <div class="shape-1">
                <img src="{{ asset('frontend/assets/images/shape/hero-sahpe-1.png') }}" alt="">
            </div>
            <div class="shape-2">
                <img src="{{ asset('frontend/assets/images/shape/hero-shape-2.png') }}" alt="">
            </div>
            <div class="shape-3">
                <img src="{{ asset('frontend/assets/images/shape/hero-shape-3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="meeta-hero-content text-center" data-aos-delay="700" data-aos="fade-up">
                            <h2 class="title">{{ $upcoming_event->name }}</h2>
                            <span class="text"> {{ \Carbon\Carbon::parse($upcoming_event->start_date)->format('d M, Y')}} ,  {{ $upcoming_event->venue }}</span>

                            <!-- Countdown Start -->
                            <div class="meeta-countdown-2 countdown" data-countdown="2024/05/8" data-format="short">
                                <div class="single-countdown">
                                    <span class="count countdown__time daysLeft"></span>
                                    <span class="value countdown__time daysText"></span>
                                    <div class="half-circle"></div>
                                </div>
                                <div class="single-countdown countdown-2">
                                    <span class="count countdown__time hoursLeft"></span>
                                    <span class="value countdown__time hoursText"></span>
                                </div>
                                <div class="single-countdown countdown-3">
                                    <span class="count countdown__time minsLeft"></span>
                                    <span class="value countdown__time minsText"></span>
                                </div>
                                <div class="single-countdown countdown-4">
                                    <span class="count countdown__time secsLeft"></span>
                                    <span class="value countdown__time secsText"></span>
                                </div>
                            </div>
                            <!-- Countdown End -->
                            <div class="header-btn" data-aos-delay="900" data-aos="fade-up">
                                <a class="btn-2" href="price.html">Get Your Ticket Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Section End -->

        <!-- About Section Start -->
        <div class="meeta-about-section-2 section-padding" id="about">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <!-- About Images Start -->
                        <div class="meeta-about-images-2">
                            <div class="shape-1">
                                <img src="{{ asset('storage/' . $upcoming_event->poster_image) }}" alt="">
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/' . $upcoming_event->poster_image) }}" alt="About">
                            </div>
                            <div class="play-btn">
                                <a class="popup-video" href="https://www.youtube-nocookie.com/embed/Ga6RYejo6Hk"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <!-- About Images End -->

                    </div>
                    <div class="col-lg-6">
                        <div class="about-2-content-wrap">
                            <!-- Section Title Start -->
                            <div class="meeta-section-title-2">
                                <h4 class="sub-title">About Event</h4>
                                <h2 class="main-title">{{ $upcoming_event->name }}</h2>
                            </div>
                            <!-- Section Title End -->

                            <!-- About Content Start -->
                            <div class="meeta-about-content">

                                <p>{!! $upcoming_event->description !!}.</p>

                                <div class="about-list">
                                    <ul>
                                        <li class="about-list-item">
                                            <div class="about-icon">
                                                <img src="assets/images/ab-icon-1.png" alt="">
                                            </div>
                                            <div class="about-text">
                                                <h3 class="title">Live Music</h3>
                                            </div>
                                        </li>
                                        <li class="about-list-item">
                                            <div class="about-icon">
                                                <img src="assets/images/ab-icon-2.png" alt="">
                                            </div>
                                            <div class="about-text">
                                                <h3 class="title">Live Recording</h3>
                                            </div>
                                        </li>
                                        <li class="about-list-item">
                                            <div class="about-icon">
                                                <img src="assets/images/ab-icon-3.png" alt="">
                                            </div>
                                            <div class="about-text">
                                                <h3 class="title">Networking</h3>
                                            </div>
                                        </li>
                                        <li class="about-list-item">
                                            <div class="about-icon">
                                                <img src="assets/images/ab-icon-4.png" alt="">
                                            </div>
                                            <div class="about-text">
                                                <h3 class="title">Qr Code Tickets</h3>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <!-- About Content End -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- About Section End -->

        <!-- Counter Start -->
        <div class="meeta-counter-section section-padding" style="background-image: url('{{ asset('storage/' . $upcoming_event->poster_image) }}');">
            <div class="shape-1">
                <img src="{{ asset('frontend/assets/images/shape/counter-shape-1.png') }}" alt="">
            </div>
            <div class="shape-2">
                <img src="{{ asset('frontend/assets/images/shape/counter-shape-2.png') }}" alt="">
            </div>
            <div class="shape-3">
                <img src="{{ asset('frontend/assets/images/shape/hero-sahpe-1.png') }}" alt="">
            </div>
            <div class="shape-4">
                <img src="{{ asset('frontend/assets/images/shape/counter-shape-4.png') }}" alt="">
            </div>
            <div class="container">
                <div class="counter-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <!-- Single Counter Start -->
                            <div class="single-counter counter-item-1 text-center">
                                <div class="counter-text">
                                    <span class="counter">4</span>
                                    <p>Artists</p>
                                </div>
                            </div>
                            <!-- Single Counter End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Single Counter Start -->
                            <div class="single-counter counter-item-2 text-center">
                                <div class="counter-text">
                                    <span class="counter">12</span>
                                    <p>Tickets Sold</p>
                                </div>
                            </div>
                            <!-- Single Counter End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Single Counter Start -->
                            <div class="single-counter counter-item-3 text-center">
                                <div class="counter-text">
                                    <span class="counter">34</span>
                                    <p>Vip Tickets Available</p>
                                </div>
                            </div>
                            <!-- Single Counter End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Single Counter Start -->
                            <div class="single-counter text-center">
                                <div class="counter-text">
                                    <span class="counter">10</span>
                                    <p>Standard Tickets Available</p>
                                </div>
                            </div>
                            <!-- Single Counter End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter End -->

        <!-- Pricing Start -->
        <div class="meeta-pricing meeta-pricing-2 section-padding" id="prices">

            <div class="shape-1">
                {{-- <img src="{{ asset('assets/images/janealler.png') }}" alt=""> --}}
            </div>

            <div class="container">

                <!-- Section Title Start -->
                <div class="meeta-section-title-2 text-center">
                    <h4 class="sub-title">Ticket Price</h4>
                    <h2 class="main-title text-white">Get Your Tickets Now</h2>
                </div>
                <!-- Section Title End -->

                <div class="row gy-5 justify-content-center meeta-pricing-row">
                    <div class="col-lg-4 col-md-8">

                        <!-- Single Pricing Start -->
                        <div class="single-pricing">
                            <div class="pricing-header">
                                <h3 class="price_title">Standard</h3>
                                <div class="price">
                                    <span><sup>Ksh</sup>1,000</span>
                                </div>
                            </div>
                            <div class="pricing-body">
                                <ul>
                                    <li>Middle Row Seats</li>
                                    <li>Networking</li>
                                </ul>
                                <a class="btn" href="price.html">Book A Seat</a>
                            </div>
                        </div>
                        <!-- Single Pricing End -->

                    </div>
                    <div class="col-lg-4 col-md-8">

                        <!-- Single Pricing Start -->
                        <div class="single-pricing active">
                            <div class="pricing-header">
                                <h3 class="price_title">VIP</h3>
                                <div class="price">
                                    <span><sup>Ksh</sup>3,000</span>
                                </div>
                            </div>
                            <div class="pricing-body">
                                <ul>
                                    <li>Front Row Seats</li>
                                    <li>Networking</li>
                                </ul>
                                <a class="btn" href="price.html">Book A Seat</a>
                            </div>
                        </div>
                        <!-- Single Pricing End -->

                    </div>
                    <div class="col-lg-4 col-md-8">

                        <!-- Single Pricing Start -->
                        <div class="single-pricing">
                            <div class="pricing-header">
                                <h3 class="price_title">Kids</h3>
                                <div class="price">
                                    <span><sup>Ksh</sup>800</span>
                                </div>
                            </div>
                            <div class="pricing-body">
                                <ul>
                                    <li>Kids Between 3-16 </li>
                                    <li>Accompanied by an Adult</li>
                                
                                </ul>
                                <a class="btn" href="price.html">Book A Seat</a>
                            </div>
                        </div>
                        <!-- Single Pricing End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->

        <!-- Event Sponsors Start -->
        <div class="meeta-event-sponsors-2 section-padding" >
            <div class="container">

                <!-- Section Title Start -->
                <div class="meeta-section-title-2 text-center">
                    <h2 class="main-title">Event Sponsors</h2>
                </div>
                <!-- Section Title End -->

                <!-- Sponsor Active Start -->
                <div class="meeta-sponsor-active">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="meeta-sponsor-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="meeta-sponsor-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="meeta-sponsor-logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="meeta-sponsor-logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sponsor Active End -->

            </div>
        </div>
        <!-- Event Sponsors End -->


    </div>

    <!-- Footer Start -->
    <div class="meeta-footer-section meeta-footer-2" style="background-image: url(assets/images/bg/footer-bg-2.jpg);">

        <!-- Footer Widget Start -->
        <div class="footer-widget">
            <div class="container">

                <div class="footer-wrap">
                    <div class="row">

                        <div class="col-lg-3">
                            <!-- Footer Logo Start -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ asset('assets/images/janealler.png') }}" style="max-width: 81px" alt="Logo"></a>
                            </div>
                            <!-- Footer Logo End -->
                        </div>

                        <div class="col-lg-9">
                           
                            <!-- Footer Newsletter End -->

                            <div class="footer-bottom-wrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <!-- Footer Info Start -->
                                        <div class="footer-info">
                                            <h3 class="title">{{ $upcoming_event->name }} Details</h3>
                                            <span class="date">{{ \Carbon\Carbon::parse($upcoming_event->start_date)->format('d M, Y')}} </span>
                                            <p>{{ $upcoming_event->venue }}.</p>
                                            <div class="footer-widget-social">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                                <a href="#"><i class="fab fa-behance"></i></a>
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </div>
                                            <!-- Footer Info End -->
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <!-- Footer widget Map Start -->
                                        <div class="footer-widget-map">
                                            <iframe src="https://maps.google.com/maps?q=New%20York%20University%20&t=m&z=10&output=embed&iwloc=near" title="New York University" aria-label="New York University"></iframe>
                                        </div>
                                        <!-- Footer widget Map End -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="footer-copyright text-center">
                    <p>2024 Janealler Music</p>
                </div>

            </div>
        </div>
        <!-- Footer Widget End -->

    </div>
    <!-- Footer End -->
        {{-- modal to buy ticket --}}
        @if($upcoming_event)
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog flipInX  animated modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                             <img src="{{ asset('assets/images/janealler.png') }}" alt="" style="max-width:81px;"> 
                             Buy - {{ $upcoming_event->name }} Ticket</h5>
                        <button type="button" class="btn btn-xs btn-light" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('payments.stkpush', $upcoming_event->id, 'pay') }}" class="needs-validation" id="submit-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control input-air-primary" placeholder="Enter your name"
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control input-air-primary" placeholder="Enter your email"
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="ticket-type">Ticket Type</label>
                                <select class="form-select input-air-primary" name="ticket_type" id="ticket-type">
                                    <option value="" selected disabled>Select ticket type </option>
                                    @if($upcoming_event->eventPrice->regular_advance_price !== null && $upcoming_event->eventPrice->regular_advance_price >= 0)
                                        <option value="regular">Regular</option>
                                    @endif
                                    @if($upcoming_event->eventPrice->vip_advance_price)
                                        <option value="vip">VIP</option>
                                    @endif
                                    @if($upcoming_event->eventPrice->vvip_advance_price)
                                        <option value="vvip">VVIP</option>
                                    @endif
                                    @if($upcoming_event->eventPrice->kids_advance_price !== null && $upcoming_event->eventPrice->kids_advance_price >= 0)
                                        <option value="kids">Kids <em>(Between 3 and 12 Years)</em></option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity"
                                    class="form-control input-air-primary touchspin" placeholder="Enter quantity" value="1"
                                    aria-describedby="helpId">
                                    <span class="text-muted"> Total amount is : <strong class="text-success" id="totalAmount"></strong></span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number <em>07xxxxxxxx</em></label>
                                <input type="number" name="phone" id="phone"
                                    class="form-control input-air-primary" placeholder="Enter phone number" maxlength="10"
                                    aria-describedby="helpId" oninput="limitNumberLength(this, 10)">
                            </div>
                            <div class="form-group">
                                <button type="button" id="buy-ticket-btn" class="btn btn-primary">Buy</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->




    <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>


    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/back-to-top.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
   
    <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
{{-- 
    <script src="{{ asset('assets/js/modal-animated.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script> --}}
    
    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>


    @if($upcoming_event)
    <script>
        // "use strict";
        // // Countdown js
        // const second = 1000,
        //     minute = second * 60,
        //     hour = minute * 60,
        //     day = hour * 24;
        //     var countDown = new Date('{{ $upcoming_event->start_date }} {{ $upcoming_event->start_time }}').getTime(),
        //     x = setInterval(function() {

        //         var now = new Date().getTime(),
        //             distance = countDown - now;
        //         document.getElementById('days').innerText = Math.floor(distance / (day)),
        //             document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        //             document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        //             document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
        //     }, second);

        // // landing-header bg-trasparent on init remove bg-trasparent on scroll
        // $(window).on('scroll', function() {
        //     if ($(this).scrollTop() > 100) {
        //         $('.landing-header').removeClass('bg-transparent');
        //     } else {
        //         $('.landing-header').addClass('bg-transparent');
        //     }
        // });
    </script>
    <script>
         var msg = '{{Session::get('message')}}';
            var alert = '{{Session::get('alert-class')}}';
            var exist = '{{Session::has('message')}}';
            console.log(msg);
            if(exist){
                swal({
                    title: "Success",
                    text: msg,
                    icon: "success",
                    button: "Ok",
                });
            } 
            function limitNumberLength(input, maxLength) {
                if (input.value.length > maxLength) {
                    input.value = input.value.slice(0, maxLength); // Truncate input to the maximum length.
                }
            }  
    </script>
    <script>
        $('#ticket-type').on('change', function() {
            var ticketType = $(this).val();
            var quantity = $('#quantity').val();
            var totalAmount = 0;
            if(ticketType == 'regular') {
                totalAmount = {{ $upcoming_event->eventPrice->regular_advance_price }} * quantity;
            } else if(ticketType == 'vip') {
                totalAmount = {{ $upcoming_event->eventPrice->vip_advance_price ?  $upcoming_event->eventPrice->vip_advance_price:0}} * quantity;
            } else if(ticketType == 'vvip') {
                totalAmount = {{ $upcoming_event->eventPrice->vvip_advance_price ? $upcoming_event->eventPrice->vvip_advance_price:0 }} * quantity;
            }  else if(ticketType == 'kids') {
                totalAmount = {{ $upcoming_event->eventPrice->kids_advance_price ? $upcoming_event->eventPrice->kids_advance_price:0 }} * quantity;
            }
            $('#totalAmount').text(totalAmount);
        });
        $('#quantity').on('change', function() {
            var ticketType = $('#ticket-type').val();
            var quantity = $(this).val();
            var totalAmount = 0;
            if(ticketType == 'regular') {
                totalAmount = {{ $upcoming_event->eventPrice->regular_advance_price }} * quantity;
            } else if(ticketType == 'vip') {
                totalAmount = {{ $upcoming_event->eventPrice->vip_advance_price ?  $upcoming_event->eventPrice->vip_advance_price:0}} * quantity;
            } else if(ticketType == 'vvip') {
                totalAmount = {{ $upcoming_event->eventPrice->vvip_advance_price ? $upcoming_event->eventPrice->vvip_advance_price:0 }} * quantity;
            } else if( ticketType == 'kids') {
                totalAmount = {{ $upcoming_event->eventPrice->kids_advance_price ? $upcoming_event->eventPrice->kids_advance_price:0 }} * quantity;
            }
            $('#totalAmount').text(totalAmount);
        });
    </script>
    <script>
        //submit route('payments.stkpush',$upcoming_event->id,'pay')  using ajax

        $(document).ready(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            $('#buy-ticket-btn').on('click', function(e) {
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var quantity = $('#quantity').val();
                var phone = $('#phone').val();
                var ticket_type = $('#ticket-type').val();
                console.log($('#ticket-type').val())
                var _token = $("input[name=_token]").val();
                var merchantRequestID =0;
                var missingFields = [];

                if ($('#name').val() == '') {
                    missingFields.push('Name');
                }

                if ($('#email').val() == '') {
                    missingFields.push('Email');
                }

                if ($('#quantity').val() == '') {
                    missingFields.push('Quantity');
                }

                if ($('#phone').val() == '') {
                    missingFields.push('Phone');
                }

                if ($('#ticket-type').val() == '' || $('#ticket-type').val() == null) {
                    missingFields.push('Ticket Type');
                }

                if (missingFields.length > 0) {
                    var missingFieldsMessage = 'The following fields are required: ' + missingFields.join(', ');
                    swal("Error", missingFieldsMessage, "error");
                    $('#submit-form-btn').after('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + missingFieldsMessage + ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }else{
                  $('#buy-ticket-btn').attr('disabled', true);
                  $('#buy-ticket-btn').html('');
                  $('#buy-ticket-btn').append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> please wait....');
                  $.ajax({
                      url: "{{ route('payments.stkpush', $upcoming_event->id, 'pay') }}",
                      type: "POST",
                      data: {
                            name: name,
                            email: email,
                            quantity: quantity,
                            phone: phone,
                            ticket_type: ticket_type,
                            _token: _token
                      },
                      success: function(response) {
                          if (response.ResponseCode == 0) {
                           
                                merchantRequestID = response.MerchantRequestID; 
                              $('#exampleModal').modal('hide');
                              swal({
                                  title: "Check Your phone and Enter Mpesa Pin",
                                  text: "Initiating Payment, Please dont close this window",
                                  icon: "https://media.giphy.com/media/swhRkVYLJDrCE/giphy.gif",
                                  buttons: false,
                                  closeOnClickOutside: false,
                                  closeOnEsc: false,
                                  onOpen: () => {
                                      swal.showLoading();
                                  }
                              });

                              var checkPaymentStatus = setInterval(function() {
                                    console.log(merchantRequestID);

                                    $.ajax({
                                        url: "{{ route('payments.check','') }}"+"/"+merchantRequestID,
                                        type: "POST",
                                        data: {
                                            _token: _token
                                        },
                                        success: function(response) {
                                            console.log(response)
                                            if (response == 'success') {
                                                swal({
                                                    title: "Thank You",
                                                    text: "Payment Successful. Check your email for the ticket",
                                                    // check email

                                                    icon: "success",
                                                    button: "Ok",
                                                    closeOnClickOutside: true,
                                                    closeOnEsc: true,
                                                    backdrop: false,
                                                }).then(function() {
                                                    location.reload();
                                                });
                                                clearInterval(checkPaymentStatus);

                                            } 
                                        }
                                    });
                                }, 5000);
                          } else {
                              swal("Error", "There was an error getting the ticket", "error");
                              $('#buy-ticket-btn').attr('disabled', false);
                            $('#buy-ticket-btn').html('');
                            $('#buy-ticket-btn').append('Buy Ticket');
                          }
                      },
                    error: function(error) {
                        console.log(error);
                        swal("Error", "There was an error getting the ticket", "error");
                        // button remove disabled
                        $('#buy-ticket-btn').attr('disabled', false);
                        $('#buy-ticket-btn').html('');
                        $('#buy-ticket-btn').append('Buy Ticket');
                    }
                  });
              }
            });
        });
    </script>
    @endif
    <!-- Theme js-->
    {{-- <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>
