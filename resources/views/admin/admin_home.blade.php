@php
    use App\Models\User;
    use App\Models\Error;
    use App\Models\Item;
@endphp

@extends('layouts.app')
@section('content')

<div class="pd-y-30 tx-center bg-dark">
    @if (Auth::user()->is_admin == 0)
        <div class="button-style">
            {{-- <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo3">Add new subadmin</a> --}}
            <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo4">view subadmin list</a>
        </div>
        
        <!-- LARGE MODAL add Subadmin -->
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
                        <form onsubmit ="return validateForm()" action="{{route('subadmin.create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Emp_ID: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control @error('emp_id') is-invalid @enderror" name="emp_id" placeholder="Enter employ ID" value="" required>
                                    @error('emp_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Enter designation" required>
                                    @error('designation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Mobile No: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter mobile number" value="" required>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <span id = "message1" style="color:red"> </span> <br><br>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Enter email address" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Assign Role: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                     <select class="form-control select2 @error('role') is-invalid @enderror" name="role" data-placeholder="Choose Browser">
                                        <option selected="" disabled="">--Choose One--</option>
                                        <option value="1">HARDWARE</option>
                                        <option value="2">SOFTWARE</option>
                                        <option value="3">NETWORK</option>
                                        <option value="4">PRINTER</option>
                                        <option value="5">SERVER</option>
                                     </select>
                                    @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control @error('email') is-invalid @enderror" id="pswd1" name="password"  placeholder="Enter new password" value="" required>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control" id="pswd2" name="password_confirmation"  placeholder="Enter new password" value="" required>
                                </div>
                                <span id = "message2" style="color:red"> </span> <br><br> 
                            </div>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
                        <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                    </div>
                        </form>  
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->

   --}}
        <!-- LARGE MODAL subadminList -->
        <div id="modaldemo4" class="modal fade">
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
                                    <th>Employ_ID</th>
                                    <th>Designation</th>
                                    <th>Mobile No</th>
                                    <th>Email ID</th>
                                    <th>Role Assigned</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($subAdminList as $subAdmin)
                                            <tr>
                                                <th><input type="checkbox" name="checkbox[]" value="{{$subAdmin->id}}"></th>
                                                <th scope="row">{{$subAdmin->id}}</th>
                                                <td>{{$subAdmin->name}}</td>
                                                <td>{{$subAdmin->emp_id}}</td>
                                                <td>{{$subAdmin->designation}}</td>
                                                <td>{{$subAdmin->phone}}</td>
                                                <td>{{$subAdmin->email}}</td>
                                                <td>{{$subAdmin->role == null ? '' : App\Enums\TicketType::getKey($subAdmin->role)}}</td>
                                                <td>
                                                    <a href='{{url("subadmin/edit/$subAdmin->id")}}' class="btn btn-success">Edit</a>
                                                </td>
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
        </div>
            <!-- modal -->    
   
    @endif
        <a href="{{url('bar-chart')}}" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">report generation</a> 
    <button class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload()">Refresh</button>
</div>
<div class="row mg-b-10">
    <div class="col-sm-2 mg-t-10 mg-sm-t-0">
        <select id="status"  name="select_status">
          <option selected="" disabled="">Status</option>
          <option value="0">NOT DONE</option>
          <option value="1">PARTIALY DONE</option>
          <option value="2">DONE</option>
          {{-- <option value="3">CLOSED</option> --}}
        </select>
    </div>
    <div class="col-sm-2 mg-t-10 mg-sm-t-0">
        {{-- <select class="form-control select2" id="choose_equip" name="choose_equip" data-placeholder="Choose one option" required>
          <option selected="" disabled="">--Year--</option>
        </select> --}}
        <label class="form-control-label">Year:</label>
        <select id="year" name="year"></select>
    </div>
    <div class="col-sm-3 mg-t-10 mg-sm-t-0">
        {{-- <select class="form-control select2" id="choose_equip" name="choose_equip" data-placeholder="Choose one option" required>
          <option selected="" disabled="">--Month--</option>
        </select> --}}
        <label class="form-control-label">Month:</label>
        <select id="month" name="month"></select>
    </div>
    <div class="col-sm-2 mg-t-10 mg-sm-t-0">
        {{-- <select class="form-control select2" id="choose_equip" name="choose_equip" data-placeholder="Choose one option" required>
          <option selected="" disabled="">--From Day--</option>
        </select> --}}
        <label class="form-control-label">From Day:</label>
        <select id="day" name="day1"></select>
    </div>
    <div class="col-sm-2 mg-t-10 mg-sm-t-0">
        {{-- <select class="form-control select2" id="choose_equip" name="choose_equip" data-placeholder="Choose one option" required>
          <option selected="" disabled="">--To Day--</option>
        </select> --}}
        <label class="form-control-label">To Day:</label>
        <select id="day2" name="day2"></select>
    </div>
    <div class="col-sm-1 mg-t-10 mg-sm-t-0">
        <input type="button" value="Search" name="filter" class="filter" id="filter">
    </div>  
</div>

<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-15p">Ticket No.</th>
                    <th class="wd-25p">Emp_ID</th>
                    <th class="wd-25p">Emp_Name</th>
                    <th class="wd-25p">Emp_phone</th>
                    <th class="wd-25p">Designation</th>
                    <th class="wd-25p">Email</th>
                    <th class="wd-25p">Internal No</th>
                    <th class="wd-25p">Location</th>
                    <th class="wd-25p">Floor No</th>
                    <th class="wd-25p">Room No</th>
                    <th class="wd-25p">Equip Name</th>
                    <th class="wd-25p">PIR No</th>
                    <th class="wd-25p">Under Warranty</th>
                    <th class="wd-25p">AMC No</th>
                    <th class="wd-25p">Error Msg</th>
                    <th class="wd-20p">Created At</th>
                    <th class="wd-10p">Assigned Person</th>
                    <th class="wd-15p">Ticket Type</th>
                    <th class="wd-15p">Action Taken</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-15p">Screeshot</th>
                    <th class="wd-20p">Updated At</th>
                </tr>
                </thead>
                <tbody> 
                    {{-- @foreach ($ticketList as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>

                            <td>{{$ticket->emp_id}}</td>
                            <td>{{$ticket->emp_name}}</td>
                            <td>{{$ticket->phone == null ? '': $ticket->phone}}</td>
                            <td>{{$ticket->department}}</td>
                            <td>{{$ticket->designation}}</td>
                            <td>{{$ticket->internal_no}}</td>
                            <td>{{$ticket->building_location}}</td>
                            @php
                                $ite = Item::ListById2($ticket->choose_equip);
                            @endphp
                            <td>{{$ite->cat->category_name}}</td>
                            <td>{{$ite->pir_no}}</td>
                            <td>{{$ticket->under_warranty}}</td>
                            <td>{{$ite->amc_no}}</td>
                            <td>{{$ticket->message}}</td>
                            <td>{{$ticket->created_at}}</td>
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
                            <td>
                                <textarea disabled>{{$ticket->action_taken == null ? '': $ticket->action_taken}}</textarea>
                            </td>
                            <td>
                                {{App\Enums\TicketStatus::getKey($ticket->status)}}
                            </td>
                            <td>{{$ticket->updated_at}}</td>
                        </tr> 
                    @endforeach       --}}
                </tbody>
            </table>
            {{-- {{ $ticketList->links() }} --}}
        </div><!-- table-wrapper -->
    </div>
    <!-- card-body -->
</div>
@endsection
@push('css')
<style>
    .button-style{
        width: 100%;
        box-sizing: border-box;
        margin: 5px;
        display: flex;
        flex-flow: wrap row;
        justify-content:center;
        align-items: center;
    }

    .button-style > a {
        margin: 5px;
    }
</style>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link href="{{asset('public/storage/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <style>
        a{
            text-decoration: none
        }
    </style>
@endpush
@push('scripts')


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    

    <script src="{{asset('public/storage/lib/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/select2/js/select2.min.js')}}"></script>
    {{-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
<script>

(() => {
    let year_satart = 1940;
    let year_end = (new Date).getFullYear(); // current year
    let year_selected = 'year';

    let option = '';
    option = '<option value="">Year</option>'; // first option

    for (let i = year_satart; i <= year_end; i++) {
        let selected = (i === year_selected ? ' selected' : '');
        option += '<option value="' + i + '"' + selected + '>' + i + '</option>';
    }

    document.getElementById("year").innerHTML = option;
})();

(() => {
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let month_selected = 'month'; // current month
    let option = '';
    let month_value = '';
    option = '<option value="">Month</option>'; // first option

    for (let i = 0; i < months.length; i++) {
        let month_number = (i + 1);

        // 1, set option value month number adding 0. [01 02 03 04..]
        month_value = (month_number <= 9) ? '0' + month_number : month_number;

        // 2 , or set option value month number. [1 2 3 4..]
        // month_value = month_number;

        // 3, or set option value month names. [January February]
        // month_value = months[i];

        let selected = (i === month_selected ? ' selected' : '');
        option += '<option value="' + month_value + '"' + selected + '>('+month_number+') '+months[i] + '</option>';
    }
    document.getElementById("month").innerHTML = option;
})();

(() => {
    let day_selected = 'Day'; // current day
    let option = '';
    let day = '';
    option = '<option value="">Day</option>'; // first option

    for (let i = 1; i < 32; i++) {
        // value day number adding 0. 01 02 03 04..
        day = (i <= 9) ? '0' + i : i;

        // or value day number 1 2 3 4..
        // day = i;

        let selected = (i === day_selected ? ' selected' : '');
        option += '<option value="' + day + '"' + selected + '>' + day + '</option>';
    }
    document.getElementById("day").innerHTML = option;
})();

(() => {
    let day_selected = 'Day'; // current day
    let option = '';
    let day = '';
    option = '<option value="">Day</option>'; // first option

    for (let i = 1; i < 32; i++) {
        // value day number adding 0. 01 02 03 04..
        day = (i <= 9) ? '0' + i : i;

        // or value day number 1 2 3 4..
        // day = i;

        let selected = (i === day_selected ? ' selected' : '');
        option += '<option value="' + day + '"' + selected + '>' + day + '</option>';
    }
    document.getElementById("day2").innerHTML = option;
})();
//   $('#datatable1').DataTable({
//   responsive: true,
//   language: {
//     searchPlaceholder: 'Search...',
//     sSearch: '',
//     lengthMenu: '_MENU_ items/page',
//   }
// });
$(function () {
  
  var table = $('#datatable1').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route('ticket.list') }}",
          data:function (d) {
              d.status = $('#status').val();
              d.year = $('#year').val();
              d.month = $('#month').val();
              d.from_day = $('#day').val();
              d.to_day = $('#day2').val();
          }
      },
      columns: [
              {data: 'id',name: 'id'},
              {data: 'emp_id',name: 'emp_id'} ,
              {data: 'emp_name',name: 'emp_name'},
              {data: 'phone',name: 'phone'},
              {data: 'designation',name: 'designation'},
              {data: 'email',name: 'email'},
              {data: 'internal_no',name: 'internal_no'},
              {data: 'building_location',name: 'building_location'},
              {data: 'floor_no',name: 'floor_no'},
              {data: 'room_no',name: 'room_no'},
              {data: 'choose_equip',name: 'choose_equip'},
              {data: 'pir_no',name: 'pir_no'},
              {data: 'under_warranty',name: 'under_warranty'},
              {data: 'amc_no',name: 'amc_no'},
              {data: 'message',name: 'message'},
              {data: 'created_at',name: 'created_at'},
              {data: 'assigned_person',name: 'assigned_person'},
              {data: 'ticket_type',name: 'ticket_type'},
              {data: 'action_taken',name: 'action_taken'},
              {data: 'status',name: 'status'},
              {data: 'screenshot',name: 'screenshot'},
              {data: 'updated_at',name: 'updated_at'}
      ]
  });

  $(".filter").click(function(){
      table.draw();
  });
      
});



function validateForm() {  
    //collect form data in JavaScript variables  
    var pw1 = document.getElementById("pswd1").value;  
    var pw2 = document.getElementById("pswd2").value;
    var phone = document.getElementById("phone").value;  

    if(pw1 != pw2) {  
      document.getElementById("message2").innerHTML = "**Passwords are not same";  
      return false;  
    }

    if(phone.length < 10) {  
      document.getElementById("message2").innerHTML = "**Mobile Number must be 10 characters";  
      return false;  
    }

     if(phone.length > 10) {  
      document.getElementById("message1").innerHTML = "**Mobile Number must be 10 characters";  
      return false;  
    } 
    // else {  
    //   alert ("Your password created successfully");  
    //   document.write("JavaScript form has been submitted successfully");  
    // }  
 
}

    </script>

    @if(count($errors) > 0)
        <script type="text/javascript">
          $(document).ready(function() {
              $('#modaldemo3').modal('show');
          });
        </script>
    @endif
@endpush
