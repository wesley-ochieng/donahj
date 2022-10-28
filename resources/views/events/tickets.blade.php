@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>View Tickets for {{ $event->name }}</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('events.list') }}">Home</a></li>
              <li class="breadcrumb-item" ><a href="{{ route('events.list') }}">Events</a></li>
              <li class="breadcrumb-item active">{{ $event->id }}</li>
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
        <div class="col-sm-12">
          <div class="card shadow">
            <div class="card-body">
              <div class="tab-content" id="top-tabContent">
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                  <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tickets-table">
                            <thead>
                            <tr>
                                <th scope="col">Ticket Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Qr </th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

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
@section('scripts')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tickets-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('tickets.tables',$event->id,'tickets') }}',
            columns: [
                { data: 'ticket_number', name: 'ticket_number' },
                { data: 'status', name: 'status' },
                { data: 'qr_code', name: 'qr_code' },
                { data: 'action', name: 'action' },
            ],
            columnDefs:[
                {
                    targets: [0],
                    visible: true,
                    searchable: true,
                    orderable: true, 
                },
                {
                    targets: [1],
                    visible: true,
                    searchable: true,
                    orderable: true, 
                },
                {
                    targets: [2],
                    visible: true,
                    searchable: false,
                    orderable: false, 
                },
                {
                    targets: [3],
                    visible: true,
                    searchable: false,
                    orderable: false, 
                }
            ]
        });
    } );
</script>
@endsection