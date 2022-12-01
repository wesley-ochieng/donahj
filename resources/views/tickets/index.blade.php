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
            <h3>View Tickets for All Events</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('events.list') }}">Home</a></li>
              <li class="breadcrumb-item" ><a href="{{ route('events.list') }}">Events</a></li>
              <li class="breadcrumb-item active">All Events</li></li>
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
              <h5>Total Paid Tickets</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-success">{{ $total_paid_tickets }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-danger">
              <h5>Total Unpaid</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-danger">{{ $total_unpaid_tickets }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-info">
              <h5>Total Active Tickets</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-info">{{ $total_active_tickets }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-header b-l-secondary">
              <h5>Total Used</h5>
            </div>
            <div class="card-body py-3">
              <p class="lead fs-3 fw-bold text-secondary">{{ $total_used_tickets }}</p>
            </div>
          </div>
        </div>
      </div>
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
                                <th scope="col">Name</th>
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
  {{-- showTicketModal --}}
  <div class="modal fade" id="showTicketModal" tabindex="-1" role="dialog" aria-labelledby="showTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showTicketModalLabel">Ticket Details</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <p class="lead">Name: <span id="name"></span></p>
              <p class="lead">Ticket Number: <span id="ticket_number"></span></p>
              <p class="lead">Status: <span id="status"></span></p>
              <p class="lead">Qr: <span id="qr"></span></p>
              <p class="lead">Payment Status: <span id="payment_status"></span></p>
              <p class="lead">Transaction Id: <span id="transaction_id"></span></p>
              <p class="lead">Payment Time: <span id="payment_time"></span></p>
            </div>
            <div class="col-md-6">
              <img src="" alt="" id="qr_image" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tickets-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('all.tickets.table') }}',
            columns: [
                { data:'event',name:'event' },
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
                    searchable: true,
                    orderable: false, 
                },
                {
                    targets: [3],
                    visible: true,
                    searchable: false,
                    orderable: false, 
                },
                {
                    targets: [4],
                    visible: true,
                    searchable: false,
                    orderable: false, 
                },
            ]
        });
    } );
</script>
<script>
    $(document).on('click','.ticket-show',function(){
        let id = $(this).data('id');
        $.ajax({
            url: "{{ route('ticket.show','') }}"+"/"+id,
            type: 'GET',
            data: {id:id},
            success: function(data){
              console.log(show-ticket)
                $('#name').text(data.name);
                $('#ticket_number').text(data.ticket_number);
                $('#status').text(data.status);
                $('#qr').text(data.qr_code);
                $('#payment_status').text(data.payment_status);
                $('#transaction_id').text(data.transaction_id);
                $('#payment_time').text(data.payment_time);
                $('#qr_image').attr('src',data.qr_image);
                $('#showTicketModal').modal('show');
            }
        });
    });
    
  // function showTicket(id){
  //   $.ajax({
  //     url: "{{ route('ticket.show','') }}"+"/"+id,
  //     type: "GET",
  //     success: function(response){
  //       if(response.status == 200){
  //         console.log(response);
  //         $('#name').text(response.ticket.name);
  //         $('#ticket_number').text(response.ticket.ticket_number);
  //         $('#status').text(response.ticket.status);
  //         $('#qr').text(response.ticket.qr_code);
  //         $('#payment_status').text(response.ticket.payment_status);
  //         $('#transaction_id').text(response.ticket.transaction_id);
  //         $('#payment_time').text(response.ticket.payment_time);
  //         $('#qr_image').attr('src', response.ticket.qr_code);
  //         $('#showTicketModal').modal('show');
  //       }
  //     }
  //   });
  // }
</script>
@endsection