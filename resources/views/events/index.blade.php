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
                      <div class="project-box shadow-sm"><span class="badge badge-success">{{ $event->status }}</span>
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
                        </div>
                        <div class="project-status mt-4">
                            <div class="media mb-0">
                              <p>{{$event->ticketsSold()}} / {{ $event->capacity }} - <small class="text-info">{{($event->ticketsSold() * 100)/$event->capacity}}%</small></p>
                              <div class="media-body text-end"><span>Sold</span></div>
                            </div>
                            <div class="progress" style="height: 5px">
                              <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width:{{($event->ticketsSold() * 100)/$event->capacity}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- button to show tickets --}}
                            <a href="{{ route('tickets.list', $event->id,'tickets') }}" class="btn btn-primary mt-3">Show Tickets</a>
                            {{-- button to show payments --}}
                            <a href="{{ route('payments.event', $event->id,'payments') }}" class="btn btn-secondary mt-3">Show Payments</a>
                            {{-- button to show payments --}}
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
@endsection