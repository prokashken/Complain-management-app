@php
    use App\Models\User;
    use App\Models\Error;
@endphp
@extends('layouts.app')
@section('content')
<div class="pd-y-30 tx-center bg-dark">
    @if (Auth::user()->is_admin == 0)
        {{-- <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo3">Add new subadmin</a>
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo4">view subadmin list</a> --}}
        {{-- <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload();" data-toggle="modal" data-target="#modaldemo">Refresh</a> --}}
        
        <!-- LARGE MODAL -->
        {{-- <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Register SubAdmin</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <form action="{{route('subadmin.create')}}" method="POST">
                            @csrf
                            <div class="row">
                                    <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="" required>
                                    </div>
                                </div><!-- row -->
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Department: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="department" placeholder="Enter department" required>
                                    </div>
                                </div>
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Emp_ID: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="emp_id" placeholder="Enter employ ID" value="" required>
                                    </div>
                                </div>
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="email" class="form-control" name="email" value="" placeholder="Enter email address" required>
                                    </div>
                                </div>
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="password" class="form-control" name="password"  placeholder="Enter new password" value="" required>
                                    </div>
                                </div>
                            
                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
                                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                            </div>
                        </form>  
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal --> --}}
            
        <!-- LARGE MODAL subadminList -->
        {{-- <div id="modaldemo4" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <form action="{{ route('subadmin.delete') }}" method="POST"
                        onsubmit="return confirm('Do you really want to delete the task?');">
                        @csrf
                        <div class="modal-header pd-x-20">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">SubAdmin List</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pd-20">
                            <div class="bd bd-gray-300 rounded table-responsive">
                                <table class="table mg-b-0">
                                <thead>
                                    <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Employ_ID</th>
                                    <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($subAdminList as $subAdmin)
                                            <tr>
                                                <th><input type="checkbox" name="checkbox[]" value="{{$subAdmin->id}}"></th>
                                                <th scope="row">{{$subAdmin->id}}</th>
                                                <td>{{$subAdmin->name}}</td>
                                                <td>{{$subAdmin->department}}</td>
                                                <td>{{$subAdmin->emp_id}}</td>
                                                <td>{{$subAdmin->email}}</td>
                                            </tr>
                                        @endforeach
                                </tbody>
                                </table>
                            </div><!-- bd -->                        
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-size-xs">Remove</button>
                            <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                        </div>
                </form>
                </div>
            </div><!-- modal-dialog -->
        </div> --}}
            <!-- modal -->    
    @endif
        <a href="{{url('bar-chart')}}" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">report generation</a>
        
    {{-- @if (Auth::user()->is_admin == 1)
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo">add error</a>
    @endif --}}

</div>


<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-15p">Ticket No.</th>
                    <th class="wd-10p">Assigned Person</th>
                    <th class="wd-15p">Ticket Type</th>
                    <th class="wd-15p">Action Taken</th>
                    <th class="wd-25p">Status</th>
                    <th class="wd-25p">Emp_ID</th>
                    <th class="wd-25p">Emp_Name</th>
                    <th class="wd-25p">Emp_phone</th>
                    {{-- <th class="wd-25p">Emp_division</th> --}}
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
                                {{-- @if ($ticket->assigned_person == null)
                                    <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                        @csrf 
                                        <input type="text" hidden name="id" value="{{Auth::user()->id}}">
                                        <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Accept</button> 
                                    </form> 
                                @else --}}
                                    {{$personName == null ? '': $personName}} <br>
                                    {{$ticket->mechanic == null ? '': "Mechanic: ".$ticket->mechanic}}
                                {{-- @endif --}}
                            </td>
                            <td>
                                {{App\Enums\TicketType::getKey($ticket->ticket_type)}}
                            </td>
                            <td>
                                @if ($ticket->action_taken != null)
                                    <textarea disabled>{{$ticket->action_taken}}</textarea>
                                @else
                                    @if ($ticket->status == 3 || $ticket->assigned_person == null)
                                        <textarea disabled>{{$ticket->action_taken}}</textarea>
                                    @else
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo1">Write</a>
                                            <!-- BASIC MODAL -->
                                        <div id="modaldemo1" class="modal fade">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content bd-0 tx-14">
                                                    <div class="modal-header pd-y-20 pd-x-25">
                                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Write down the taken action</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                                        @csrf
                                                        <div class="modal-body pd-25">
                                                            <textarea rows="3" class="form-control" name="action_taken" placeholder="Start ..."></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Submit</button>
                                                            <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- modal-dialog -->
                                        </div><!-- modal -->
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if ($ticket->status == 3 || $ticket->assigned_person == null)
                                    {{App\Enums\TicketStatus::getKey($ticket->status)}}
                                @else
                                    {{App\Enums\TicketStatus::getKey($ticket->status)}}
                                    <br><br>
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo1">Status</a>
                                    <!-- BASIC MODAL -->
                                    <div id="modaldemo1" class="modal fade">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bd-0 tx-14">
                                            <div class="modal-header pd-y-20 pd-x-25">
                                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Select New Status</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                                @csrf
                                                <div class="modal-body pd-25">
                                                    <select class="form-control select2" name="status" data-placeholder="Choose Browser">
                                                        <option value="0" @if ($ticket->status == 0) selected @endif>NOT DONE</option>
                                                        <option value="1" @if ($ticket->status == 1) selected @endif>PARTIALY DONE</option>
                                                        <option value="2" @if ($ticket->status == 2) selected @endif>DONE</option>
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
                                @endif
                            </td>
                            <td>{{$ticket->emp_id}}</td>
                            <td>{{$ticket->emp_name}}</td>
                            <td>{{$ticket->phone == null ? '': $ticket->phone}}</td>
                            {{-- <td>{{$ticket->division}}</td> --}}
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

  $('#datatable1').DataTable({
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
