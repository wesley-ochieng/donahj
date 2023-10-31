@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>Create Event</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('events.list') }}">Events</a></li>
              <li class="breadcrumb-item active">project list</li>
            </ol>
          </div>
          <div class="col-sm-6">
            <!-- Bookmark Start-->
            <div class="bookmark">

            </div>
            <!-- Bookmark Ends-->
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="form theme-form">
                    <form action="{{ route('events.store') }}" class="needs-validation" method="POST" enctype="multipart/form-data" id="submit-form">
                        @csrf
                        <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                <label for="event-name" >Event Name:</label>
                                <input type="text" class="form-control" id="event-name" name="name" placeholder="Event Name" required>
                                <div class="invalid-feedback">Please provide a valid city.</div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="mb-3">
                                <label>Starting date</label>
                                <input class="datepicker-here form-control digits" type="text" name="start_date" autocomplete="off" data-language="en" required>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="mb-3">
                                <label>Ending date</label>
                                <input class="datepicker-here form-control" name="end_date" type="end_date" autocomplete="off" data-language="en">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="event-time" >Event Time:</label>
                                    <input type="time" class="form-control" id="event-time" name="start_time" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="event-location">Event Location:</label>
                                <input type="text" class="form-control" id="event-location" name="venue">
                                <input type="hidden" name="venue_longtitude">
                                <input type="hidden" name="venue_latitude">
                            </div>
                            <div class="col-sm-8">
                              <div class="mb-3">
                                <label>Upload Poster Image</label>
                                <input class="form-control" type="file" name="poster_image" required>
                            </div>
                            </div>
                        </div>
                        {{-- quantity and pricing for vip regular and vvip --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-quantity" >Regular Quantity:</label>
                                    <input type="number" class="form-control" id="event-quantity" name="regular_quantity" placeholder="Event Quantity" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="event-price" >Regular Advance Price:</label>
                                    <input type="number" class="form-control" id="event-price" name="regular_advance_price" placeholder="Advance Regular Price" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-gate-price" >Regular Gate Price:</label>
                                    <input type="number" class="form-control" id="event-gate-price" name="regular_gate_price" placeholder="Gate Ticket Price" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="regular-end-date" >Regular End Date:</label>
                                    <input type="text" class="form-control datepicker-here" id="regular-end-date" name="regular_end_date" autocomplete="off" data-language="en" placeholder="End Date For Advance" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-quantity" >VIP Quantity:</label>
                                    <input type="number" class="form-control" id="event-quantity" name="vip_quantity" placeholder="Event Quantity" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="event-price" >VIP Advance Price:</label>
                                    <input type="number" class="form-control" id="event-price" name="vip_advance_price" placeholder="Advance VIP Price" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-gate-price" >VIP Gate Price:</label>
                                    <input type="number" class="form-control" id="event-gate-price" name="vip_gate_price" placeholder="Gate Ticket Price" >
                                </div>
                            </div>
                            {{-- enddate for vip  --}}
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="vip-end-date" >VIP End Date:</label>
                                    <input type="text" class="form-control datepicker-here" id="vip-end-date" name="vip_end_date" placeholder="End Date For Advance" autocomplete="off" data-language="en" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-quantity" >VVIP Quantity:</label>
                                    <input type="number" class="form-control" id="event-quantity" name="vvip_quantity" placeholder="Event Quantity" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="event-price" >VVIP Advance Price:</label>
                                    <input type="number" class="form-control" id="event-price" name="vvip_advance_price" placeholder="Advance VVIP Price" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-gate-price" >VVIP Gate Price:</label>
                                    <input type="number" class="form-control" id="event-gate-price" name="vvip_gate_price" placeholder="Gate Ticket Price" >
                                </div>
                            </div>
                            {{-- enddate for vvip  --}}
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="vvip-end-date" >VVIP End Date:</label>
                                    <input type="text" class="form-control datepicker-here" id="vvip-end-date" name="vvip_end_date" placeholder="End Date For Advance" autocomplete="off" data-language="en" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-quantity" >Kids Quantity:</label>
                                    <input type="number" class="form-control" id="event-quantity" name="kids_quantity" placeholder="Event Quantity" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="event-price" >Kids Advance Price:</label>
                                    <input type="number" class="form-control" id="event-price" name="kids_advance_price" placeholder="Advance Kids Price" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="event-gate-price" >Kids Gate Price:</label>
                                    <input type="number" class="form-control" id="event-gate-price"  name="kids_gate_price" placeholder="Gate Ticket Price" >
                                </div>
                            </div>
                            {{-- enddate for kids  --}}
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label for="kids-end-date" >Kids End Date:</label>
                                    <input type="text" class="form-control datepicker-here" id="kids-end-date" name="kids_end_date" placeholder="End Date For Advance" autocomplete="off" data-language="en" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                            <div class="my-3">
                                <label>Enter Event Description</label>
                                <textarea id="editor1" class="form-control" name="description" cols="30" rows="10" required>
                                </textarea>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="text-end">
                                <button class="btn btn-secondary me-3" type="submit" id="submit-form-btn">Add</button>
                                <a class="btn btn-danger" href="{{ route('events.list') }}">Cancel</a></div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection
@section('scripts')
      <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script>
      $('#submit-form').on('submit', function(e){
        e.preventDefault();
        if($('#event-name').val() == '' || $('#event-amount').val() == '' || $('#event-capacity').val() == '' || $('#event-location').val() == ''){
          $('#submit-form-btn').after('<div class="alert alert-danger alert-dismissible fade show" role="alert">All fields are required <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }else{
        $('#submit-form-btn').attr('disabled', true);
        $('#submit-form-btn').html('');
        $('#submit-form-btn').append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Adding....');
        $(this).unbind('submit').submit();
        }
      });
    </script>
@endsection