@php
    use App\Models\User;
    use App\Models\Error;
    use App\Models\Item;
    use App\Models\ForwardTicket;
    use Carbon\Carbon;

@endphp

@extends('layouts.app')
@section('content')
<div class="pd-y-30 tx-center bg-dark">
    @if (Auth::user()->is_admin == 0)
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo3">Add new subadmin</a>
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo4">view subadmin list</a>
        {{-- <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload();" data-toggle="modal" data-target="#modaldemo">Refresh</a> --}}   
    @endif
        <a href="{{url('bar-chart')}}" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">report generation</a>
        {{-- location.reload() --}}

    <button class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload()">Refresh</button>
</div>


<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-15p">Ticket No.</th>
                    <th class="wd-10p">Assigned Person</th>
                    {{-- <th class="wd-15p">Error Type</th> --}}
                    <th class="wd-15p">Action Taken</th>
                    <th class="wd-25p">Status</th>
                    <th class="wd-25p">Reason Of Not Closed Yet</th>
                    <th class="wd-25p">Emp_ID</th>
                    <th class="wd-25p">Emp_Name</th>
                    <th class="wd-25p">Emp_phone</th>
                    {{-- <th class="wd-25p">Department</th> --}}
                    <th class="wd-25p">Designation</th>
                    <th class="wd-25p">Internal No</th>
                    <th class="wd-25p">Location</th>
                    <th class="wd-25p">Floor No</th>
                    <th class="wd-25p">Room No</th>
                    <th class="wd-25p">Equip Name</th>
                    <th class="wd-25p">PIR No</th>
                    <th class="wd-25p">Under Warranty</th>
                    <th class="wd-25p">AMC No</th>
                    <th class="wd-25p">Ticket Type</th>
                    <th class="wd-25p">Error Msg</th> 
                    <th class="wd-25p">Screenshot</th>                     
                    <th class="wd-20p">Created At</th>
                    <th class="wd-20p">Updated At</th>
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
                                @if ($ticket->assigned_person == null)
                                    <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                        @csrf 
                                        <input type="text" hidden name="id" value="{{Auth::user()->id}}">
                                        <textarea name="mechanic" id="" rows="3" placeholder="Enter the name of the Mechanic and click Accept"></textarea><br>
                                        <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Accept</button> 
                                    </form> 
                                @else
                                    {{$personName == null ? '': $personName}} <br>
                                    {{$ticket->mechanic == null ? '': "Mechanic: ".$ticket->mechanic}} <br><br>
                                     <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo11">Forward</a>
                                     @if($ticket->forwarded == true)
                                        <br><span style="color:green;">Forwarded to you</span>
                                     @endif
                                    <div id="modaldemo11" class="modal fade">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-header pd-x-20">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Forward Ticket</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body pd-20">
                                                    <form action="{{route('ticket.forward')}}" method="POST">
                                                        @csrf
                                                         <div class="row">
                                                                <label class="col-sm-4 form-control-label">Accepted By: <span class="tx-danger">*</span></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input type="text" class="form-control" name="accepted_by" placeholder="Enter name" value="{{Auth::user()->name}}" required>
                                                                    <input type="text" name="ticket_id" value="{{$ticket->id}}" hidden>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row mg-t-20">
                                                                <label class="col-sm-4 form-control-label">Ticket Type: <span class="tx-danger">*</span></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select class="form-control select2" id="forwarded_ticket_type" name="forwarded_ticket_type" data-placeholder="Choose Browser" required>
                                                                        <option selected="" disabled="">--Choose One--</option>
                                                                        <option value="1">LAPTOP</option>
                                                                        <option value="2">PC</option>
                                                                        <option value="3">WORKSTATION</option>
                                                                        <option value="4">IPAD</option>
                                                                        <option value="5">SERVER</option>
                                                                        <option value="6">PRINTER</option>
                                                                        <option value="7">OTHERS</option>
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mg-t-20">
                                                                <label class="col-sm-4 form-control-label">Forward To: <span class="tx-danger">*</span></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select class="form-control select2" id="forwarded_to" name="forwarded_to" data-placeholder="Choose Browser" required>
                                                                        <option selected="" disabled="">--Choose One--</option>
                                                                          {{-- @foreach (Item::items() as $item)
                                                                            <option value="{{$item->category}}">{{$item->cat->category_name}}</option>
                                                                          @endforeach --}}
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mg-t-20">
                                                                <label class="col-sm-4 form-control-label">Reason: <span class="tx-danger">*</span></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <textarea rows="2" cols="3" name="reason" class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="row mg-t-20">
                                                                <label class="col-sm-4 form-control-label">Forward Date: <span class="tx-danger">*</span></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input type="datetime-local" class="form-control" name="forwarded_date" placeholder="Enter name" value="" required>
                                                                </div>
                                                            </div> --}}
                                                        </div><!-- modal-body -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
                                                            <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </form>  
                                            </div>
                                        </div><!-- modal-dialog -->
                                    </div><!-- modal -->    
                                @endif
                            </td>
                            {{-- <td>
                                <select class="form-control select2" name="error_type" data-placeholder="Choose one option" disabled>
                                    @foreach (Error::List() as $error)
                                      <option value="{{$error->id}}" @if ($error->id == $ticket->error_type) selected @endif>{{$error->error_name}}</option>
                                    @endforeach
                                  </select>
                            </td> --}}
                            <td>
                                {{-- @if ($ticket->action_taken != null)
                                    <textarea disabled>{{$ticket->action_taken}}</textarea>
                                @else
                                    @if ($ticket->status == 3 || $ticket->assigned_person == null)
                                        <textarea disabled>{{$ticket->action_taken}}</textarea>
                                    @else --}}
                                    <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                        @csrf
                                            <textarea rows="2" class="form-control" name="action_taken" placeholder="Start ...">{{$ticket->action_taken}}</textarea>
                                            @if ($ticket->assigned_person != null)
                                                <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Submit</button>
                                            @endif
                                    </form>
                                    {{-- @endif
                                @endif --}}
                            </td>
                            <td>
                                @if ($ticket->status == 3 || $ticket->assigned_person == null)
                                {{App\Enums\TicketStatus::getKey($ticket->status)}}
                            @else
                            <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                @csrf
                                <select class="form-control select2" name="status" data-placeholder="Choose Browser">
                                    <option value="0" @if ($ticket->status == 0) selected @endif>NOT DONE</option>
                                    <option value="1" @if ($ticket->status == 1) selected @endif>PARTIALY DONE</option>
                                    <option value="2" @if ($ticket->status == 2) selected @endif>DONE</option>
                                </select>
                                <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Submit</button>
                            </form> 
                            <span style="color: #F5F5F5;">{{App\Enums\TicketStatus::getKey($ticket->status)}}</span>  
                            @endif
                            </td>
                            <td>
                                <form action='{{url("/ticket/$ticket->id")}}' method="POST">
                                    @csrf
                                    {{-- <textarea name="not_closed_reason" id="" rows="2">{{$ticket->not_closed_reason}}</textarea> --}}
                                    <textarea rows="2" class="form-control" name="not_closed_reason" @if ($ticket->status ==2) disabled @endif placeholder="Start ...">{{$ticket->not_closed_reason}}</textarea>
                                    @if ($ticket->assigned_person != null && $ticket->status !=2)
                                        <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Submit</button>
                                    @endif
                                </form>                                
                            </td>
                            <td>{{$ticket->emp_id}}</td>
                            <td>{{$ticket->emp_name}}</td>
                            <td>{{$ticket->phone == null ? '': $ticket->phone}}</td>
                            {{-- <td>{{$ticket->department}}</td> --}}
                            <td>{{$ticket->designation}}</td>
                            <td>{{$ticket->internal_no}}</td>
                            <td>{{$ticket->building_location}}</td>
                            <td>{{$ticket->floor_no}}</td>
                            <td>{{$ticket->room_no}}</td>
                            @php
                                $ite = Item::ListById2($ticket->choose_equip);
                            @endphp
                            <td>{{$ite->cat->category_name}}</td>
                            <td>{{$ite->pir_no}}</td>
                            <td>{{$ticket->under_warranty}}</td>
                            <td>{{$ite->amc_no}}</td>
                            <td>{{App\Enums\TicketType::getKey($ticket->ticket_type)}}</td>
                            <td>{{$ticket->message}}</td>
                            <td>
                                @if ($ticket->screenshot != null)
                                  <img class="rounded-10 mg-t-10 mg-l-auto mg-r-auto" style="height: 100px; width:100px; border-redius:5px;" src='{{asset("public/screenshots/$ticket->screenshot")}}'>
                                @endif
                            </td>
                            <td>{{$ticket->created_at}}</td>
                            <td>{{$ticket->updated_at}}</td>
                        </tr> 
                    @endforeach      
                </tbody>
            </table>
            {{-- {{ $ticketList->links() }} --}}
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
  language: {
    searchPlaceholder: 'Search...',
    sSearch: '',
    lengthMenu: '_MENU_ items/page',
  }
});

$('select[name="forwarded_ticket_type"]').on('change', function(){
      var ticket_type = $(this).val();
      if(ticket_type){
        $.ajax({
          url: "{{url('/get/subadminInfo/')}}/"+ticket_type,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#forwarded_to").empty();
            $("#forwarded_to").append('<option selected="" disabled="">--Choose One--</option>');
            // <option selected="" disabled="">--Choose One--</option>
            $.each(data,function(key,value){
              $("#forwarded_to").append('<option value="'+value.id+'">'+value.name+'</option>');
            });
            
          },
        });
      }else {
        alert('danger');
      }
    });
    </script>
@endpush
