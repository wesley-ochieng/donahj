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
            <h3>Donations</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">dashboard</li>
              <li class="breadcrumb-item active">Donations list</li>
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
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card-header b-l-warning">
              <h5>Total Donations</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-warning">{{ count($foundations) }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card-header b-l-success">
              <h5>Total Amount Collected</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-success">KSH 100</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card-header b-l-primary">
              <h5>Total Transactions</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-primary">2</p>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row project-cards">
        <div class="col-md-12 project-list">
          <div class="card">
            <div class="row">
              <div class="col-md-6 p-0">
                <input type="text" name="search" id="" class="form-control" placeholder="search ">

              </div>
              <div class="col-md-6 p-0">                    
                <div class="form-group mb-0 me-0"></div><a class="btn btn-primary create-foundation" href="#"  data-bs-toggle="modal" data-bs-target="#create-foundation"> <i data-feather="plus-square"> </i>Create New Drive</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card shadow">
            <div class="card-body">
              <div class="tab-content" id="top-tabContent">
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                  <div class="row">
                    @foreach($foundations as $foundation)
                    <div class="col-xxl-4 col-lg-6">
                      <div class="project-box shadow-sm"><span class="badge badge-success">{{ $foundation->status }}</span>
                        <h6>{{$foundation->name}}</h6>
                        <div class="media">
                          <img class="img-100 me-2 shadow" src="{{ asset('storage/'.$foundation->header_image) }}" alt="" data-original-title="" title="">
                          <img class="img-70 me-2 shadow" src="{{ asset('storage/qr_codes/'.$foundation->id.'.png') }}" alt="" data-original-title="" title="">
                          
                            <div class="media-body">
                                <p class="lead text-success">Target: {{ $foundation->target }}</p>
                            </div>
                        </div>
                        <div  class="text-truncate" style="max-height: 99px">
                          <p>{!! $foundation->description !!}</p>
                        </div>
                        
                        <div class="row details">
                            <div class="col-6"><span>Start Date </span></div>
                            <div class="col-6 font-success">{{ Carbon::parse($foundation->start_date)->format('d-M-Y') }} </div>
                            <div class="col-6"> <span>End Date</span></div>
                            <div class="col-6 font-success">{{ Carbon::parse($foundation->end_date)->format('d-M-Y') }}</div>

                        </div>
                        <div class="project-status mt-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#create-foundation" id="{{ $foundation->id }}" class="btn btn-warning mt-3 edit-foundation"> Edit Details</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  {{-- modal create-foundation --}}
  <div class="modal fade" id="create-foundation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Foundation Drive</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('create-foundation') }}" method="POST" enctype="multipart/form-data" id="foundation-form" >
            @csrf
            <div class="form-group">
              <label for="name"> Name/Title</label>
              <input type="text" name="name" id="name" class="form-control input-air-success">
            </div>
            <div class="form-group">
              <label for="target">Target</label>
              <input type="number" name="target" id="target" class="form-control input-air-success">
            </div>
            <div class="form-group">
                <label>Start date</label>
                <input class="datepicker-here form-control digits input-air-success" type="text" name="start_date" autocomplete="off" data-language="en" required>
            </div>
            <div class="form-group">
                <label>End date</label>
                <input class="datepicker-here form-control input-air-success" name="end_date" type="end_date" autocomplete="off" data-language="en">
            </div>
            <div class="form-group">
                <label>Upload Header Image</label>
                <input class="form-control" type="file" name="header_image" required>
            </div>
            <div class="form-group">
                <label>Enter Donation Description</label>
                <textarea id="editor1" class="form-control input-air-success" name="description" cols="30" rows="10" required>
                </textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="foundation-form" class="btn btn-primary float-start">Create</button>
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')

<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/styles.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script>
//edit-foundation button when clicked openthe modal used to create foundation i.e create-foundation and change the attribute to accomodate the update route and get values from the edit url
$('.edit-foundation').click(function(){
  var id = $(this).attr('id');
  var url = "{{ route('update-foundation', ':id') }}";
  url = url.replace(':id', id);
  $('#foundation-form').attr('action', url);
  $('#foundation-form').append('<input type="hidden" name="_method" value="PUT">');
  var geturl = "{{ route('edit-foundation', ':id') }}";
  geturl = geturl.replace(':id', id);
  $.ajax({
    url: geturl,
    type: "GET",
    success: function(data){
      $('#name').val(data.name);
      $('#target').val(data.target);
      $('#start_date').val(data.start_date);
      $('#end_date').val(data.end_date);
      $('#editor1').val(data.description);
    }
  });
});

//create-foundation button when clicked open the modal used to create foundation i.e create-foundation and change the attribute to accomodate the create route
$('.create-foundation').click(function(){
  $('#foundation-form').attr('action', "{{ route('create-foundation') }}");
  $('#foundation-form').find('input[name="_method"]').remove();

  $('#name').val('');
  $('#target').val('');
  $('#start_date').val('');
  $('#end_date').val('');
  $('#editor1').val('');
});
</script>
@endsection