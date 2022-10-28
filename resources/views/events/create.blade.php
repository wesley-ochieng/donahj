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
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                <label for="event-name" >Event Name:</label>
                                <input type="text" class="form-control" id="event-name" name="name" placeholder="Event Name">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="mb-3">
                                <label>Starting date</label>
                                <input class="datepicker-here form-control digits" type="text" name="start_date" autocomplete="off" data-language="en">
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
                                    <input type="time" class="form-control" id="event-time" name="start_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="event-amount">Event Amount:</label>
                                <input type="number" class="form-control" id="event-amount" name="amount" placeholder="Enter Amount to charge for a ticket">
                            </div>
                            <div class="col-sm-4">
                                <label for="event-capacity">Event Capacity:</label>
                                <input type="number" class="form-control" id="event-capacity" name="capacity" placeholder="Enter Capacity">
                            </div>
                            <div class="col-sm-4">
                                <label for="event-location">Event Location:</label>
                                <input type="text" class="form-control" id="event-location" name="venue">
                                <input type="hidden" name="venue_longtitude">
                                <input type="hidden" name="venue_latitude">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="my-3">
                                <label>Enter Event Description</label>
                                <textarea id="editor1" class="form-control" name="description" cols="30" rows="10">
                                </textarea>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                <label>Upload Poster Image</label>
                                <input class="form-control" type="file" name="poster_image">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="text-end">
                                <button class="btn btn-secondary me-3" type="submit">Add</button>
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
@endsection