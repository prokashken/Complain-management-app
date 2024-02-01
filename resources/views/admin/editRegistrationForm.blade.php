@php
    use App\Models\User;
    use App\Models\Error;
@endphp

@extends('layouts.app')
@section('content')
<div class="pd-y-30 tx-center bg-dark">
<h6 style="color: white;">Edit User Registration Form</h6>
</div>
@if (session('status'))
<div class="alert alert-info" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <strong class="d-block d-sm-inline-block-force">Well Done!</strong> {{ session('status') }}.
</div>
@endif
<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <form action="{{url('/update-RegiForm')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input type="checkbox" id="vehicle1" @if ($registration_form->name_show == 'show') checked @endif name="name_show" value="show">
                    <label for="vehicle1">Show Name Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($registration_form->name_required == 'required') checked @endif name="name_required" value="required">
                    <label for="vehicle2">Name Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->emp_id_show == 'show') checked @endif name="emp_id_show" value="show">
                    <label for="vehicle3"> Show Emp_ID Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->emp_id_required == 'required') checked @endif name="emp_id_required" value="required">
                    <label for="vehicle3">Emp_ID Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->department_show == 'show') checked @endif name="department_show" value="show">
                    <label for="vehicle3"> Show Department Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->department_required == 'required') checked @endif name="department_required" value="required">
                    <label for="vehicle3">Department Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->designation_show == 'show') checked @endif name="designation_show" value="show">
                    <label for="vehicle3">Show Designation Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->designation_required == 'required') checked @endif name="designation_required" value="required">
                    <label for="vehicle3">Designation Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->phone_show == 'show') checked @endif name="phone_show" value="show">
                    <label for="vehicle3">Show Phone Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->phone_required == 'required') checked @endif name="phone_required" value="required">
                    <label for="vehicle3">Phone Field Required</label><br>
                </div>
                <div class="col-6">
                    <input type="checkbox" id="vehicle3" @if ($registration_form->internal_no_show == 'show') checked @endif name="internal_no_show" value="show">
                    <label for="vehicle3">Show Internal_No Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->internal_no_required == 'required') checked @endif name="internal_no_required" value="required">
                    <label for="vehicle3">Internal_No Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->building_location_show == 'show') checked @endif name="building_location_show" value="show">
                    <label for="vehicle3">Show Building_Location Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->building_location_required == 'required') checked @endif name="building_location_required" value="required">
                    <label for="vehicle3">Building_Location Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->floor_no_show == 'show') checked @endif name="floor_no_show" value="show">
                    <label for="vehicle3">Show Floor_No Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->floor_no_required == 'required') checked @endif name="floor_no_required" value="required">
                    <label for="vehicle3">Floor_No Field Required</label><br>
            
                    <input type="checkbox" id="vehicle3" @if ($registration_form->room_no_show == 'show') checked @endif name="room_no_show" value="show">
                    <label for="vehicle3">Show Room_No Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($registration_form->room_no_required == 'required') checked @endif name="room_no_required" value="required">
                    <label for="vehicle3">Room_No Field Required</label><br>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-block">Submit</button>   
        </form>
    </div>
</div>

<div class="pd-y-30 tx-center bg-dark">
    <h6 style="color: white;">Edit Add Item Form</h6>
</div>

<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <form action="{{url('/update-ItemForm')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">

                    <input type="checkbox" id="vehicle1" @if ($item_form->emp_name_show == 'show') checked @endif name="emp_name_show" value="show">
                    <label for="vehicle1">Show Emp_name Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->emp_id_show == 'show') checked @endif name="emp_id_show" value="show">
                    <label for="vehicle1">Show Emp_id Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->designation_show == 'show') checked @endif name="designation_show" value="show">
                    <label for="vehicle1">Show Designation Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->email_show == 'show') checked @endif name="email_show" value="show">
                    <label for="vehicle1">Show Email Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->phone_show == 'show') checked @endif name="phone_show" value="show">
                    <label for="vehicle1">Show Phone Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->building_location_show == 'show') checked @endif name="building_location_show" value="show">
                    <label for="vehicle1">Show Building_location Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->floor_no_show == 'show') checked @endif name="floor_no_show" value="show">
                    <label for="vehicle1">Show Floor_no Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->room_no_show == 'show') checked @endif name="room_no_show" value="show">
                    <label for="vehicle1">Show Room_no Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->product_name_show == 'show') checked @endif name="product_name_show" value="show">
                    <label for="vehicle1">Show Product_name Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->product_name_required == 'required') checked @endif name="product_name_required" value="required">
                    <label for="vehicle3">Product_name Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->qty_show == 'show') checked @endif name="qty_show" value="show">
                    <label for="vehicle1">Show QTY Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->qty_required == 'required') checked @endif name="qty_required" value="required">
                    <label for="vehicle3">QTY Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->delivery_date_show == 'show') checked @endif name="delivery_date_show" value="show">
                    <label for="vehicle1">Show Delivery_date Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->delivery_date_required == 'required') checked @endif name="delivery_date_required" value="required">
                    <label for="vehicle3">Delivery_date Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->device_name_show == 'show') checked @endif name="device_name_show" value="show">
                    <label for="vehicle1">Show Device_name Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->device_name_required == 'required') checked @endif name="device_name_required" value="required">
                    <label for="vehicle3">Device_name Field Required</label><br>  
                    
                    <input type="checkbox" id="vehicle1" @if ($item_form->pir_no_show == 'show') checked @endif name="pir_no_show" value="show">
                    <label for="vehicle1">Show Pir_no Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->pir_no_required == 'required') checked @endif name="pir_no_required" value="required">
                    <label for="vehicle3">Pir_no Field Required</label><br>
                </div>
                <div class="col-6">
                    <input type="checkbox" id="vehicle1" @if ($item_form->po_no_show == 'show') checked @endif name="po_no_show" value="show">
                    <label for="vehicle1">Show Po_no Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->po_no_required == 'required') checked @endif name="po_no_required" value="required">
                    <label for="vehicle3">Po_no Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->po_amount_show == 'show') checked @endif name="po_amount_show" value="show">
                    <label for="vehicle1">Show Po_amount Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->po_amount_required == 'required') checked @endif name="po_amount_required" value="required">
                    <label for="vehicle3">Po_amount Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->po_date_show == 'show') checked @endif name="po_date_show" value="show">
                    <label for="vehicle1">Show Po_date Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->po_date_required == 'required') checked @endif name="po_date_required" value="required">
                    <label for="vehicle3">Po_date Field Required</label><br>


                    <input type="checkbox" id="vehicle1" @if ($item_form->mac_show == 'show') checked @endif name="mac_show" value="show">
                    <label for="vehicle1">Show MAC Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->mac_required == 'required') checked @endif name="mac_required" value="required">
                    <label for="vehicle3">MAC Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->amc_no_show == 'show') checked @endif name="amc_no_show" value="show">
                    <label for="vehicle1">Show AMC_No Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->amc_no_required == 'required') checked @endif name="amc_no_required" value="required">
                    <label for="vehicle3">AMC_No Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->amc_start_show == 'show') checked @endif name="amc_start_show" value="show">
                    <label for="vehicle1">Show AMC_start Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->amc_start_required == 'required') checked @endif name="amc_start_required" value="required">
                    <label for="vehicle3">AMC_start Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->amc_end_show == 'show') checked @endif name="amc_end_show" value="show">
                    <label for="vehicle1">Show AMC_end Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->amc_end_required == 'required') checked @endif name="amc_end_required" value="required">
                    <label for="vehicle3">AMC_end Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->want_amc_show == 'show') checked @endif name="want_amc_show" value="show">
                    <label for="vehicle1">Show Want_amc Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->want_amc_required == 'required') checked @endif name="want_amc_required" value="required">
                    <label for="vehicle3">Want_amc Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($item_form->warranty_years_show == 'show') checked @endif name="warranty_years_show" value="show">
                    <label for="vehicle1">Show Warranty_years Field</label><br>
                    <input type="checkbox" id="vehicle3" @if ($item_form->warranty_years_required == 'required') checked @endif name="warranty_years_required" value="required">
                    <label for="vehicle3">Warranty_years Field Required</label><br> 
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-block">Submit</button>   
        </form>
    </div>
</div>

<div class="pd-y-30 tx-center bg-dark">
    <h6 style="color: white;">Edit Create Ticket Form</h6>
</div>

<div class="card shadow-base bd-0 mg-0">
    <div class="card-body pd-25">
        <form action="{{url('/update-TicketForm')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input type="checkbox" id="vehicle1" @if ($ticket_form->emp_name_show == 'show') checked @endif name="emp_name_show" value="show">
                    <label for="vehicle1">Show Emp Name Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->emp_name_required == 'required') checked @endif name="emp_name_required" value="required">
                    <label for="vehicle2">Emp Name Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->emp_id_show == 'show') checked @endif name="emp_id_show" value="show">
                    <label for="vehicle1">Show Emp ID Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->emp_id_required == 'required') checked @endif name="emp_id_required" value="required">
                    <label for="vehicle2">Emp ID Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->designation_show == 'show') checked @endif name="designation_show" value="show">
                    <label for="vehicle1">Show Designation Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->designation_required == 'required') checked @endif name="designation_required" value="required">
                    <label for="vehicle2">Designation Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->email_show == 'show') checked @endif name="email_show" value="show">
                    <label for="vehicle1">Show Email Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->email_required == 'required') checked @endif name="email_required" value="required">
                    <label for="vehicle2">Email Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->phone_show == 'show') checked @endif name="phone_show" value="show">
                    <label for="vehicle1">Show Phone Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->phone_required == 'required') checked @endif name="phone_required" value="required">
                    <label for="vehicle2">Phone Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->building_location_show == 'show') checked @endif name="building_location_show" value="show">
                    <label for="vehicle1">Show Building_location Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->building_location_required == 'required') checked @endif name="building_location_required" value="required">
                    <label for="vehicle2">Building_location Field Required</label><br>  

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->floor_no_show == 'show') checked @endif name="floor_no_show" value="show">
                    <label for="vehicle1">Show Floor_no Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->floor_no_required == 'required') checked @endif name="floor_no_required" value="required">
                    <label for="vehicle2">Floor_no Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->room_no_show == 'show') checked @endif name="room_no_show" value="show">
                    <label for="vehicle1">Show Room_no Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->room_no_required == 'required') checked @endif name="room_no_required" value="required">
                    <label for="vehicle2">Room_no Field Required</label><br>                        
                </div>
                <div class="col-6">
                    <input type="checkbox" id="vehicle1" @if ($ticket_form->internal_no_show == 'show') checked @endif name="internal_no_show" value="show">
                    <label for="vehicle1">Show Internal_no Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->internal_no_required == 'required') checked @endif name="internal_no_required" value="required">
                    <label for="vehicle2">Internal_no Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->under_warranty_show == 'show') checked @endif name="under_warranty_show" value="show">
                    <label for="vehicle1">Show Under_warranty Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->under_warranty_required == 'required') checked @endif name="under_warranty_required" value="required">
                    <label for="vehicle2">Under_warranty Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->message_show == 'show') checked @endif name="message_show" value="show">
                    <label for="vehicle1">Show Error Msg Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->message_required == 'required') checked @endif name="message_required" value="required">
                    <label for="vehicle2">Error Msg Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->pir_no_show == 'show') checked @endif name="pir_no_show" value="show">
                    <label for="vehicle1">Show Pir_no Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->pir_no_required == 'required') checked @endif name="pir_no_required" value="required">
                    <label for="vehicle2">Pir_no Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->device_name_show == 'show') checked @endif name="device_name_show" value="show">
                    <label for="vehicle1">Show Device_name Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->device_name_required == 'required') checked @endif name="device_name_required" value="required">
                    <label for="vehicle2">Device_name Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->mac_show == 'show') checked @endif name="mac_show" value="show">
                    <label for="vehicle1">Show Mac Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->mac_required == 'required') checked @endif name="mac_required" value="required">
                    <label for="vehicle2">Mac Field Required</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->under_amc_show == 'show') checked @endif name="under_amc_show" value="show">
                    <label for="vehicle1">Show Under_amc Field</label><br>

                    <input type="checkbox" id="vehicle1" @if ($ticket_form->amc_no_show == 'show') checked @endif name="amc_no_show" value="show">
                    <label for="vehicle1">Show AMC_No Field</label><br>
                    <input type="checkbox" id="vehicle2" @if ($ticket_form->amc_no_required == 'required') checked @endif name="amc_no_required" value="required">
                    <label for="vehicle2">Name AMC_No Required</label><br>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-block">Submit</button>   
        </form>
    </div>
</div>

@endsection
@push('css')
    <link href="{{asset('public/storage/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('public/storage/lib/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{asset('public/storage/lib/select2/js/select2.min.js')}}"></script>
@endpush
