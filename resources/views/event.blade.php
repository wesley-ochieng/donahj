<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Praise Atmosphere">
    <meta name="keywords" content="Praise Atmosphere Get Tickets">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/cropped-Praise.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/cropped-Praise.png')}}" type="image/x-icon">
    <title>Praise Atmosphere Tickets</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
   <!-- Font Awesome-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
   <!-- ico-font-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">
   <!-- Themify icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify.css') }}">
   <!-- Flag icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">
   <!-- Feather icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather-icon.css') }}">
   <!-- Plugins css start-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
   <!-- Plugins css Ends-->
   <!-- Bootstrap css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
   <!-- App css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
   <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
   <!-- Responsive css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
  </head>
  <body class="landing-wrraper">
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
        <header class="landing-header bg-transparent" >
            <div class="custom-container">
              <div class="row">
                <div class="col-12">
                  <nav class="navbar navbar-light p-0" id="navbar-example2"><a class="navbar-brand" href="javascript:void(0)"> <img class="img-fluid img-40" src="{{asset('assets/images/cropped-Praise.png')}}"  alt=""></a>
                    <ul class="landing-menu nav nav-pills">
                     
                    </ul>
                    <div class="buy-block"><a class="btn-landing" href="https://praiseatmosphere.com/" target="_blank">Home</a>
                      <div class="toggle-menu"><i class="fa fa-bars"></i></div>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </header>
      <!-- Page Body Start-->
      <div class="container-fluid p-0 m-0">
        <div class="comingsoon comingsoon-bgimg" style="background-image: url('{{asset('storage/'.$upcoming_event->poster_image)}}');background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
          <div class="comingsoon-inner text-center"><a href="#"><img src="{{asset('assets/images/cropped-Praise.png')}}" alt=""></a>
            <h5 class="text-dark text-capitalize"style="background-color: rgba(255, 255, 255, 0.5); padding: 20px;border-radius:10px">
                {{ $upcoming_event->name }}
            </h5>
            {{-- button to open modal and buy ticket --}}
            <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Buy Ticket
            </button>
            
            <div class="countdown" id="clockdiv">
              <ul>
                <li><span class="time digits" id="days"></span><span class="title">days</span></li>
                <li><span class="time digits" id="hours"></span><span class="title">Hours</span></li>
                <li><span class="time digits" id="minutes"></span><span class="title">Minutes</span></li>
                <li><span class="time digits" id="seconds"></span><span class="title">Seconds</span></li>
              </ul>
            </div>
            <a href="#about" class="btn btn-secondary btn-sm">
                About this Event
            </a>
          </div>
        </div>
      </div>
      <div class="container">
        <section id="about">
            <div class="title">
                <h2 class="mt-3">About this event</h2>
              </div>
            <hr>
            <div class="card card-absolute my-3 shadow">
                <div class="card-header bg-primary">
                  <h5 class="text-white">{{ $upcoming_event->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{asset('storage/'.$upcoming_event->poster_image)}}" alt="" class="img-fluid">
                        </div>
                        <div class="col sm-6">
                            <p>{!! $upcoming_event->description !!}.</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="badge badge-success badge-pill"><strong>Start Date:</strong> {{ $upcoming_event->start_date }}  @ {{ $upcoming_event->start_time }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="badge badge-warning badge-pill"><strong>End Date:</strong> {{ $upcoming_event->end_date }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
              </div>
            
        </section>
        <section class="demo-section section-py-space" id="Applications">
            <div class="title">
              <h2>Other Events</h2>
            </div>
            <div class="custom-container">
              <div class="row demo-block">
                @foreach($events as $event)

                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeIn">
                  <div class="demo-box"><a href="{{ route('home-event',$event->id) }}" target="_blank">
                      <div class="img-wrraper"><img class="img-fluid" src="{{ asset('storage/'.$event->poster_image) }}" alt=""></div>
                      <div class="demo-detail">                       
                        <div class="demo-title">
                          <h3>{{ $event->name }}</h3>
                        </div>
                      </div></a></div>
                </div>
                @endforeach
              </div>
            </div>
          </section>
        
      </div>
    </div>
    {{-- modal to buy ticket --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog flipInX  animated" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buy Ticket for - {{ $upcoming_event->name }}</h5>
              <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('payments.stkpush',$upcoming_event->id,'pay') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control input-air-primary" placeholder="Enter your name" aria-describedby="helpId">
                    </div>
                    {{-- email --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control input-air-primary" placeholder="Enter your email" aria-describedby="helpId">
                    </div>
                    {{-- quantity --}}
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control input-air-primary touchspin" placeholder="Enter quantity" aria-describedby="helpId">
                    </div>
                    {{-- phone number for payment --}}
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control input-air-primary" placeholder="Enter phone number" aria-describedby="helpId">
                    </div>
                    {{-- buy button or close modal --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Buy</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modal-animated.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
    <script>
        "use strict";
        // Countdown js
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        var countDown = new Date('{{$event->start_date}} {{$event->start_time}}').getTime(),
            x = setInterval(function() {

            var now = new Date().getTime(),
                distance = countDown - now;
                document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
            }, second);

            // landing-header bg-trasparent on init remove bg-trasparent on scroll
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 100) {
                    $('.landing-header').removeClass('bg-transparent');
                } else {
                    $('.landing-header').addClass('bg-transparent');
                }
            });
    </script>
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>