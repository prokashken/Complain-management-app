@php
    use App\Models\User;
    use App\Models\Error;
@endphp

@extends('layouts.app')
@section('content')
<div class="pd-y-30 tx-center bg-dark">
    @if (Auth::user()->is_admin == 0)
        <div class="button-style">
            <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo4">view subadmin list</a>
        </div>
        {{-- <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload();" data-toggle="modal" data-target="#modaldemo">Refresh</a> --}}
        
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
        
    {{-- @if (Auth::user()->is_admin == 1)
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo10">add error</a>
        <div id="modaldemo10" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Enter New Error Type</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <form action="{{route('subadmin.errorCreate')}}" method="POST">
                            @csrf
                            <div class="row">
                                    <label class="col-sm-4 form-control-label">Error Type Name: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="error_name" placeholder="Enter name" value="" required>
                                    </div>
                                </div><!-- row -->
                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
                                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                            </div>
                        </form>  
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->     
    @endif --}}
    <button class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload()">Refresh</button>
</div>


<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th>EMP_ID</th>
                    <th>Name</th>
                    <th>Product Name</th>
                    <th>PIR NO</th>
                    <th>AMC No</th>
                    <th>AMC Start</th>
                    <th>AMC End</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody> 
                     @foreach ($amcList as $amc)
                        <tr>
                            <td>{{$amc->user->emp_id}}</td>
                            <td>{{$amc->user->name}}</td>
                            <td>{{$amc->product_name == null ? '' : $amc->product_name}}</td>
                            <td>{{$amc->pir_no}}</td>
                            <td>{{$amc->amc_no}}</td>
                            <td>{{$amc->amc_start}}</td>
                            <td>{{$amc->amc_end}}</td>
                            <td>
                                <a href='{{url("amcrenew/$amc->id")}}' class="btn btn-success">Renew</a>
                            </td>
                        </tr> 
                    @endforeach 
                </tbody>
            </table>
            {{-- {{ $amcList->links() }} --}}
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
    <link href="{{asset('public/storage/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
@endpush
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

//     $(function(){
//     'use strict';
//     $('#datatable1').DataTable({
//       responsive: true,
//       language: {
//         searchPlaceholder: 'Search...',
//         sSearch: '',
//         lengthMenu: '_MENU_ items/page',
//       },
//       processing: true,
//       serverSide: false,
//       ajax: {
//         "url": "/emplist",
//         "type": "GET",
//         "dataType": "json",
//       },
//       columns: [                
//           {
//               data: 'id'
//           },
//           {
//               data: 'name'
//           },
//           {
//               data: 'emp_id',
//               searchable: true
//           },
//           {
//               data: 'department'
//           },
//           {
//               data: 'designation',
//               searchable: true
//           },
//           {
//               data: 'phone'
//           }
//         ]
//       });
//       $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
// });


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
