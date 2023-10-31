<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Praise Atmosphere">
    <meta name="keywords" content="Praise Atmosphere Get Tickets">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
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
                    <nav class="navbar navbar-light p-0" id="navbar-example2"><a class="navbar-brand"
                        href="javascript:void(0)"> <img class="img-fluid img-40"
                            src="{{ asset('assets/images/cropped-Praise.png') }}" alt=""></a>
                    <ul class="landing-menu nav nav-pills">
                      <li class="nav-item menu-back">back<i class="fa fa-angle-right"></i></li>
                    </ul>
                    <div class="buy-block">
                      <a class="btn-landing" href="https://praiseatmosphere.com/"
                            target="_blank">Home</a>
                            <a class="btn btn-secondary" href="{{ url('/') }}" style="border-radius: 20px">Events</a>
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
          <div class="comingsoon-inner text-center">
            <h5 class="text-dark text-capitalize text-center event-title">
                {{ $upcoming_event->name }}
            </h5>
            {{-- button to open modal and buy ticket --}}
            <button type="button" class="btn btn-lg buy-ticket-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Buy Ticket
                </button>
                  
              </div>
                <button type="button" class="btn btn-light btn-lg float-end" >
                    {{ $upcoming_event->name }}
                </button>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{asset('storage/'.$upcoming_event->poster_image)}}" alt="" class="img-fluid">
                        </div>
                        <div class="col sm-6">
                            <p>{!! $upcoming_event->description !!}.</p>
                            <p class="text-primary"> 
                              <span class="text-muted" >Regular-price: </span>
                              <strong>
                              {{ $upcoming_event->eventPrice->regular_advance_price  }}  KSH 
                              </strong>
                              <small class="text-muted"><em>(advanced)</em></small>
                              {{ $upcoming_event->eventPrice->regular_gate_price  }}  KSH
                              <small class="text-muted"><em>(at the gate)</em></small>
                          </p>
                          @if($upcoming_event->eventPrice->vip_advance_price )
                          <p class="text-success"> 
                              <span class="text-muted" >Vip-price: </span>
                              <strong>
                              {{ $upcoming_event->eventPrice->vip_advance_price  }}  KSH 
                              </strong>
                              <small class="text-muted"><em>(advanced)</em></small>
                              {{ $upcoming_event->eventPrice->vip_gate_price  }}  KSH
                              <small class="text-muted"><em>(at the gate)</em></small>
                          </p>
                          @endif
                          @if($upcoming_event->eventPrice->vvip_advance_price )
                          <p class="text-warning"> 
                              <span class="text-muted" >VVip-price: </span>
                              <strong>
                              {{ $upcoming_event->eventPrice->vvip_advance_price  }}  KSH 
                              </strong>
                              <small class="text-muted"><em>(advanced)</em></small>
                              {{ $upcoming_event->eventPrice->vvip_gate_price  }}  KSH
                              <small class="text-muted"><em>(at the gate)</em></small>
                          </p>
                          @endif
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
                @forelse($events as $event)

                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeIn">
                  <div class="demo-box"><a href="{{ route('home-event',$event->id) }}" target="_blank">
                      <div class="img-wrraper"><img class="img-fluid" src="{{ asset('storage/'.$event->poster_image) }}" alt=""></div>
                      <div class="demo-detail">                       
                        <div class="demo-title">
                          <h3>{{ $event->name }}</h3>
                        </div>
                      </div></a></div>
                </div>
                @empty
                <div class="col-sm-12">
                    <div class="alert alert-info">
                        <h5>Stay Tuned for more upcoming events</h5>
                    </div>
                </div>
                @endforelse
              </div>
            </div>
          </section>
        
      </div>
    </div>
    <div class="sub-footer light-bg">
        <div class="custom-container">
          <div class="row">
            <div class="col-md-6 col-sm-2">
              <div class="footer-contain"><img class="img-fluid img-40" src="{{ asset('assets/images/cropped-Praise.png') }}"  alt=""></div>
            </div>
            <div class="col-md-6 col-sm-10">
              <div class="footer-contain">
                <p class="mb-0">Copyright 2022-23 © Praise Atmosphere All rights reserved. </p>
              </div>
            </div>
          </div>
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
                <form action="{{ route('payments.stkpush',$upcoming_event->id,'pay') }}" class="needs-validation" id="submit-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control input-air-primary" placeholder="Enter your name" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control input-air-primary" placeholder="Enter your email" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="ticket-type">Ticket Type</label>
                      <select class="form-select input-air-primary" name="ticket_type" id="ticket-type">
                        <option value="" selected disabled>Select ticket type</option>
                        @if($upcoming_event->eventPrice->regular_advance_price)
                        <option value="regular">Regular</option>
                        @endif
                        @if($upcoming_event->eventPrice->vip_advance_price)
                        <option value="vip">VIP</option>
                        @endif
                        @if($upcoming_event->eventPrice->vvip_advance_price)
                        <option value="vvip">VVIP</option>
                        @endif
                        @if($upcoming_event->eventPrice->kids_advance_price)
                        <option value="kids">Kids <em>(12 years and below)</em></option>
                        @endif
                    </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control input-air-primary touchspin" value="1" placeholder="Enter quantity" aria-describedby="helpId">
                        <span class="text-muted"> Total amount is : <strong class="text-success" id="totalAmount">{{ $upcoming_event->amount }}</strong></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control input-air-primary" placeholder="Enter phone number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button type="button" id="buy-ticket-btn" class="btn btn-primary" id="submit-form-btn">Buy</button>
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
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script>
        "use strict";
        // Countdown js
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        var countDown = new Date('{{$upcoming_event->start_date}} {{$upcoming_event->start_time}}').getTime(),
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
            } else if(ticketType ==  'kids'){
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
            } esle if(ticketType == 'kids' ){
                totalAmount = {{ $upcoming_event->eventPrice->kids_advance_price ? $upcoming_event->eventPrice->kids_advance_price:0 }} * quantity;
            }
            $('#totalAmount').text(totalAmount);
        });
        </script>
        <script>
            //submit route('payments.stkpush',$upcoming_event->id,'pay')  using ajax
      
            $(document).ready(function(){
              var token = $('meta[name="csrf-token"]').attr('content');
              $('#buy-ticket-btn').on('click',function(e){
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var quantity = $('#quantity').val();
                var phone = $('#phone').val();
                var ticket_type = $('#ticket-type').val();
                var merchantRequestID =0;
                var _token = $("input[name=_token]").val();
                if($('#name').val() == '' || $('#email').val() == '' || $('#quantity').val() == '' || $('#phone').val() == ''|| $('#ticket-type').val() == ''){
                  swal("Error", "All fields are required", "error");
                  $('#submit-form-btn').after('<div class="alert alert-danger alert-dismissible fade show" role="alert">All fields are required <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }else{
                    $('#buy-ticket-btn').attr('disabled', true);
                    $('#buy-ticket-btn').html('');
                    $('#buy-ticket-btn').append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> please wait....');
                    $.ajax({
                    url: "{{ route('payments.stkpush',$upcoming_event->id,'pay') }}",
                    type:"POST",
                    data:{
                        name:name,
                        email:email,
                        quantity:quantity,
                        phone:phone,
                        ticket_type:ticket_type,
                        _token:_token
                    },
                    success:function(response){
                        if(response.ResponseCode == 0){
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
                                                    title: "Success",
                                                    text: "Payment Successful",
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
                        }else{
                        swal("Error", "Ticket not bought", "error");
                        }
                    },
                    });
                }
              });
            });
          </script>
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>