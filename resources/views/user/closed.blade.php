@php
    use App\Models\User;
    use App\Models\Error;
@endphp
@extends('layouts.app')
@section('content')
  <div class="pd-y-30 tx-center bg-dark">
  </div>

  <div class="card shadow-base bd-0 mg-0">
      <div class="card-body pd-25">
          <div class="table-wrapper">
              <table id="datatable2" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Ticket No.</th>
                    <th class="wd-10p">Assigned Person</th>
                    <th class="wd-15p">Ticket Type</th>
                    <th class="wd-15p">Action Taken</th>
                    <th class="wd-25p">Status</th>
                    <th class="wd-20p">Created At</th>
                    <th class="wd-20p">Closed At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ticketList as $ticket)
                  <tr>
                    <td>{{$ticket->id}}</td>
                    <td>
                      @php
                          $personName = null;
                          if (($ticket->assigned_person != null) && (User::where('id', $ticket->assigned_person)->exists())) {
                              $person = User::find($ticket->assigned_person);
                              $personName = $person->name;
                          }
                      @endphp
                      {{$personName == null ? '': $personName}}
                    </td>
                    <td>
                      {{App\Enums\TicketType::getKey($ticket->ticket_type)}}
                    </td>
                    <td> <textarea disabled>{{$ticket->action_taken == null ? '':$ticket->action_taken}}</textarea></td>
                    <td>
                      @if ($ticket->status == 2)
                        {{App\Enums\TicketStatus::getKey($ticket->status)}}
                        <br><br>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo1">Confirm</a>
                        <!-- BASIC MODAL -->
                        <div id="modaldemo1" class="modal fade">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bd-0 tx-14">
                                <div class="modal-header pd-y-20 pd-x-25">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Do you really want to close the ticket</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                    @csrf
                                    <div class="modal-body pd-25">
                                        <select class="form-control select2" name="status" data-placeholder="Choose Browser">
                                            <option value="3">Closed</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Submit</button>
                                        <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div><!-- modal-dialog -->
                        </div><!-- modal -->
                      @else
                          {{App\Enums\TicketStatus::getKey($ticket->status)}}
                      @endif
                    </td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->updated_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $ticketList->links() }}
            </div><!-- table-wrapper -->
      </div>
      <!-- card-body -->
  </div>
@endsection
@push('css')
    <link href="{{asset('public/storage/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
@endpush
@push('scripts')
    <script src="{{asset('public/storage/lib/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/select2/js/select2.min.js')}}"></script>
    {{-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
<script>
  $(document).ready(function () {
    $("#diva").hide();
    $("#divr").hide();
    $("#amc").click(function(){
      $("#diva").show();
      $("#divr").hide();
    });
    $("#rmc").click(function(){
      $("#diva").hide();
      $("#divr").show();
    });
  });

  $('#datatable2').DataTable({
  responsive: true,
  bPaginate : false,
  bInfo : false,
  language: {
    searchPlaceholder: 'Search...',
    sSearch: '',
    lengthMenu: '_MENU_ items/page',
  }
});

    </script>
@endpush
