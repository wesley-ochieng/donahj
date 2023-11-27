@extends('layouts.app')
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>Events list</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">dashboard</li>
              <li class="breadcrumb-item active">Events list</li>
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
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-warning">
              <h5>Total Events</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-warning">{{ count($events) }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-success">
              <h5>Total Amount Collected</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-success">KSH {{ $total_payments }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-info">
              <h5>Total Tickets</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-info">{{ $total_tickets_sold }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-primary">
              <h5>Total Transactions</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-primary">{{ $total_transactions }}</p>
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
                <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{ route('events.create') }}"> <i data-feather="plus-square"> </i>Create New Event</a>
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
                    @foreach($events as $event)
                    <div class="col-xxl-4 col-lg-6">
                      <div class="project-box shadow-sm">
                        <span class="badge badge-success">{{ $event->status }}</span>
                        {{-- dropdown ewith elipsis --}}
                        <div class="dropdown custom-dropdown mb-0 float-end">
                          <div class="btn sharp tp-btn" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="more-horizontal"></i></div>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item thirdparty-btn" href="#" data-bs-toggle="modal" data-bs-target="#thirdparty-tickets" id="{{ $event->id }}"><i class="fa fa-ticket" aria-hidden="true"></i> Third Party Tickets</a>
                          </div>
                        </div>

                        <h6>{{$event->name}}</h6>
                        <div class="media"><img class="img-40 me-2 rounded-circle" src="{{ asset('storage/'.$event->poster_image) }}" alt="" data-original-title="" title="">
                            <div class="media-body">
                                <p>{{ $event->venue }}</p>
                            </div>
                        </div>
                        <div  class="text-truncate" style="max-height: 99px">
                          <p>{!! $event->description !!}</p>
                        </div>
                        
                        <div class="row details">
                            <div class="col-6"><span>Start Date </span></div>
                            <div class="col-6 font-success">{{ Carbon::parse($event->start_date)->format('d-M-Y') }} </div>
                            <div class="col-6"> <span>Start Time</span></div>
                            <div class="col-6 font-success">{{ $event->start_time }}</div>
                            <div class="col-6"> <span>Capacity</span></div>
                            <div class="col-6 font-success">{{$event->capacity }}</div>
                            <div class="col-6"> <span>Regular Capacity</span></div>
                            <div class="col-6 font-success">{{$event->eventPrice->regular_quantity }}</div>
                            <div class="col-6"> <span>VIP Capacity</span></div>
                            <div class="col-6 font-success">{{$event->eventPrice->vip_quantity }}</div>
                            <div class="col-6"> <span>Kids Capacity</span></div>
                            <div class="col-6 font-success">{{$event->eventPrice->kids_quantity }}</div>

                        </div>
                        <div class="project-status mt-4">
                            <div class="media mb-0">
                              <p>{{$event->ticketsSold()}} / {{ $event->capacity }} 
                                - {{ empty($event->ticketsSold()) ? 0 : round($event->ticketsSold() / $event->capacity * 100) }}% Sold</p>
                              <div class="media-body text-end"><span>Sold</span></div>
                            </div>
                            <div class="progress" style="height: 5px">
                              <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" 
                              style="width:{{ empty($event->ticketsSold()) ? 0 : round($event->ticketsSold() / $event->capacity * 100) }}%" 
                              aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- button to show tickets --}}
                            <a href="{{ route('tickets.list', $event->id,'tickets') }}" class="btn btn-primary mt-3">Show Tickets</a>
                            {{-- button to show payments --}}
                            <a href="{{ route('payments.event', $event->id,'payments') }}" class="btn btn-secondary mt-3">Show Payments</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-info mt-3"> <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#complimentary-tickets" id="{{ $event->id }}" class="btn btn-warning mt-3 create-complimentary-btn"> Create Complimentary</a>
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
  {{-- modal complimentary-tickets --}}
  <div class="modal fade" id="complimentary-tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Complimentary Tickets</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('tickets.complimentary') }}" method="POST" id="complimentary-ticket-form">
            @csrf
            <input type="hidden" name="event_id" id="event_id" value="">
            <div class="form-group">
              <label for="name">Organization Name</label>
              <input type="text" name="organization_name" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
          
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="complimentary-ticket-form" class="btn btn-primary float-start">Create</button>
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="thirdparty-tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Thirdparty Tickets</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('tickets.thirdparty') }}" method="POST" id="thirdparty-ticket-form">
            @csrf
            <input type="hidden" name="event_id" class="thirdparty-event-id" id="event_id" value="">
            <div class="form-group">
              <label for="name">Organization Name</label>
              <input type="text" name="organization_name" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
          
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="thirdparty-ticket-form" class="btn btn-primary float-start">Create</button>
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $('.create-complimentary-btn').click(function(){
      let eventId = $(this).attr('id');
      console.log(eventId);
      $('#event_id').val(eventId);
    });
    $('.thirdparty-btn').click(function(){
      let eventId = $(this).attr('id');
      console.log(eventId);
      $('.thirdparty-event-id').val(eventId);
    });
  });
</script>
@endsection