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
    <title>Foundation</title>
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
        <div class="container-fluid p-0 m-0">
         
            <div class="comingsoon comingsoon-bgimg"
                style="background-image: url('{{ asset('storage/' . $foundation->header_image) }}'); background-attachment: fixed;">
                <div class="comingsoon-inner text-center" style="position: absolute; top:63vh">
                </div>
            </div>
        </div>
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
                        <p class="mb-0">Copyright 23 © Foundation All rights reserved. </p>
                    </div>
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

    $(document).ready(function() {
        //open sweet alert with an input for typing the amount they wish to pay
        swal({
            title: "Enter Amount",
            text: "Enter the amount you wish to pay",
            content: "input",
            closeOnClickOutside: false,
            closeOnEsc: false,
            button: {
                text: "Pay",
                closeModal: false,
            },
        })

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
