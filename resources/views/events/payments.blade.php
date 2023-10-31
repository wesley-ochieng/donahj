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
            <h3>View Payments for All {{ $event->name }}</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('events.list') }}">Home</a></li>
              <li class="breadcrumb-item" ><a href="{{ route('events.list') }}">Events</a></li>
              <li class="breadcrumb-item active">{{ $event->name }}</li></li>
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
            <div class="card-header b-l-success">
              <h5>Total Payments</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead mb-0 fs-3 fw-bold text-success"> KES {{ $total_payment }}</p>
              <small >(including attempted)</small>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-danger">
              <h5>Total Transactions</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-danger">{{ $total_transactions }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-info">
              <h5>Successful Transactions</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-info">{{ $total_successful_transactions }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-warning">
              <h5>Failed Transactions</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-warning">{{ $total_failed_transactions }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row project-cards">
        <div class="col-sm-12">
          <div class="card shadow">
            <div class="card-header">
              <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#bulk-upload">Bulk Upload</button>
            </div>
            <div class="card-body">
              <div class="tab-content" id="top-tabContent">
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                  <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tickets-table">
                            <thead>
                            <tr>
                                <th scope="col">Event Name</th>
                                <th scope="col">Ticket Number</th>
                                <th scope="col">Transaction ID </th>
                                <th scope="col">Transaction Time </th>
                                <th scope="col">Transaction Amount </th>
                                <th scope="col">Phone Number </th>
                                <th scope="col">Quantity </th>
                                <th scope="col">Status</th>
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

      <div class="modal fade" id="bulk-upload" tabindex="-1" role="dialog" aria-labelledby="bulk-upload" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" id="bulkUpload" action="{{route('payments.bulk', $event->id)}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="file" id="file" name="file" class="form-control">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="bulkUpload">Save changes</button>
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
            ajax: '{{ route('payments.event.table',$event->id,'payments-table') }}',
            columns: [
                { data: 'event_name', name: 'event_name' },
                { data: 'ticket_number', name: 'ticket_number' },
                { data: 'TransID', name: 'TransID' },
                { data: 'TransTime', name: 'TransTime' },
                { data: 'TransAmount', name: 'TransAmount' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'quantity', name: 'quantity' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ],
            
            columnDefs:[
                {
                    targets: [0,1,2,3,4,5,6,7],
                    searchable:true,
                    orderable:true
                },
                {
                    targets: [8],
                    searchable:false,
                    orderable:false
                }
            ]
            
        });
    } );
</script>
@endsection