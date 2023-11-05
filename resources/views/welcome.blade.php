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
    <link rel="icon" href="{{ asset('assets/images/cropped-Praise.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/cropped-Praise.png') }}" type="image/x-icon">
    <title>Praise Atmosphere Tickets</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
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
    <style>
        .time {
            border-radius: 6px
        }
        .comingsoon-bg-img{
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* media query for mobile size comingsoonbg-img */
        @media only screen and (max-width: 767px) {
            .media-body{
                font-size: 9px;
            }
        }
    </style>

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
        {{-- promotion banner --}}
        <div class="promotion-banner fixed-top" style="background-color: #f5d500">
            <div class="container">
                <div class="row">
                    <div class="col py-2">
                        <div class="media">
                            <div class="media-body">
                                <span class="mb-0">Countdown to event: </span>
                                <span class="time digits bg-dark p-1" id="days"></span><span class="title"> Days</span>
                                <span class="time digits bg-dark p-1" id="hours"></span><span class="title"> Hours</span>
                                <span class="time digits bg-dark p-1" id="minutes"></span><span class="title"> Minutes</span>
                                <span class="time digits bg-dark p-1" id="seconds"></span><span class="title"> Seconds</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="landing-header bg-transparent" style="top:21px">
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
        @if($upcoming_event)
        <div class="container-fluid p-0 m-0">
         
            <div class="comingsoon comingsoon-bgimg"
                style="background-image: url('{{ asset('storage/' . $upcoming_event->poster_image) }}'); background-attachment: fixed;">
                <div class="comingsoon-inner text-center" style="position: absolute; top:63vh">
                    
                    {{-- button to open modal and buy ticket --}}
                    <button type="button" class="btn buy-ticket-btn btn-lg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Buy Ticket
                    </button>
                
                </div>
            </div>
            <h5 class="text-dark text-capitalize text-center event-title" style=" background-color: rgba(255, 255, 255, 0.4);">
                <a href="#about" class="btn btn-secondary btn-sm">
                    About this Event
                </a>
            </h5>
           
        </div>
        <div class="container">
            <section id="about" class="pt-5">
                <div class="title">
                    <h2 class="mt-5">About this event</h2>
                </div>
                <hr>
                <div class="card card-absolute my-3 shadow">
                    <div class="card-header bg-primary">
                        <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Buy Ticket
                    </button>
                       
                    </div>

                    <button type="button" class="btn btn-light btn-lg float-end" >
                        {{ $upcoming_event->name }}
                    </button>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('storage/' . $upcoming_event->poster_image) }}" alt=""
                                    class="img-fluid">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>How to buy a ticket</h5> 
                                        </div>
                                        <div class="card-body">
                                            <ol>
                                                <li>Tap on <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><u> <em>buy ticket</em> </u> </a> </li>
                                                <li>Enter your name and Email address that will be used to receive the ticket</li>
                                                <li>Select Ticket Type</li>
                                                <li>Select the quantity of tickets you want</li>
                                                <li>Enter the phone number that you will use to make the payment</li>
                                                <li>Tap on Buy, and you will receive a prompt message that asks if you can proceed with the PIN transaction</li>
                                                <li>Complete the transaction using your MPESA PIN</li>
                                                <li>You will receive an SMS confirmation that funds have been sent from your MPESA account to Praise Atmosphere Events</li>
                                                <li>An Email with the QR code will be sent to your email. This ticket will be used at the gate as your ticket</li>
                                            </ol>
                                        </div>
                                    </div>
                            </div>

                            <div class="col sm-6">
                                <p>{!! $upcoming_event->description !!}.</p>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span class="badge badge-success badge-pill"><strong>Start Date:</strong>
                                            {{ \Carbon\Carbon::parse($upcoming_event->start_date)->format('d-M-Y')}}@
                                            {{ $upcoming_event->start_time }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="badge badge-warning badge-pill"><strong>End Date:</strong>
                                            {{ \Carbon\Carbon::parse($upcoming_event->end_date)->format('d-M-Y')}}</span>
                                    </div>
                                    <div class="col-12">
                                        {{-- disclaimer --}}
                                        <p style="font-size: 13px; margin-bottom: 0px; margin-top: 3px; color: #ff6762;">Once the ticket is bought, it is non refundable but can be donated to someone else.</p>
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
        @endif
    </div>
    <div class="sub-footer light-bg">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-6 col-sm-2">
                    <div class="footer-contain"><img class="img-fluid img-40"
                            src="{{ asset('assets/images/cropped-Praise.png') }}" alt=""></div>
                </div>
                <div class="col-md-6 col-sm-10">
                    <div class="footer-contain">
                        <p class="mb-0">Copyright 2023-24 © Praise Atmosphere All rights reserved. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal to buy ticket --}}
    @if($upcoming_event)
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog flipInX  animated modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                         <img src="{{ asset('assets/images/cropped-Praise.png') }}" alt="" style="max-width:81px;"> 
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
    @if($upcoming_event)
    <script>
        "use strict";
        // Countdown js
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;
            var countDown = new Date('{{ $upcoming_event->start_date }} {{ $upcoming_event->start_time }}').getTime(),
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
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>
