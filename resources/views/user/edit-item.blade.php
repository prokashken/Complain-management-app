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
        <form action='{{url("/item-update/$item->id")}}' method="POST">
            @csrf
              <div class="row">
                <label class="col-sm-4 form-control-label">Device Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" id="device_name" name="device_name" value="{{$item->device_name}}" placeholder="Enter Device Name">
                </div>
              </div>
              {{-- <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Model No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="model_no" name="model_no" value="{{$item->model_no}}" placeholder="Enter Model No">
                </div>
              </div> --}}
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PIR No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="pir_no" name="pir_no" value="{{$item->pir_no}}" placeholder="Enter pir no" required>
                </div>
              </div>
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PO No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="po_no" name="po_no" value="{{$item->po_no}}" placeholder="Enter po no">
                </div>
              </div>
                <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PO Amount: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="number" step="any" class="form-control" id="po_amount" name="po_amount" value="{{$item->po_amount}}" placeholder="Enter po amount in RS." >
                </div>
              </div>
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PO Date: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="date" class="form-control" id="po_date" name="po_date" value="{{$item->po_date}}">
                  {{-- <input type="number" class="form-control" id="remain_days" name="days_left_warranty" value="" hidden> --}}
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">No of years Warranty: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <select class="form-control select2" id="warranty_years" name="warranty_years" data-placeholder="Choose one option" required>
                          <option selected disabled>--Select One Option--</option>
                          <option @if ($item->warranty_years == 1) selected @endif value="1">1 year</option>
                          <option @if ($item->warranty_years == 2) selected @endif value="2">2 year</option>
                          <option @if ($item->warranty_years == 3) selected @endif value="3">3 year</option>
                          <option @if ($item->warranty_years == 4) selected @endif value="4">4 year</option>
                          <option @if ($item->warranty_years == 5) selected @endif value="5">5 year</option>
                          <option @if ($item->warranty_years == 6) selected @endif value="6">6 year</option>
                          <option @if ($item->warranty_years == 7) selected @endif value="7">7 year</option>
                          <option @if ($item->warranty_years == 8) selected @endif value="8">8 year</option>
                          <option @if ($item->warranty_years == 9) selected @endif value="9">9 year</option>
                          <option @if ($item->warranty_years == 10) selected @endif value="10">10 year</option>
                    </select>

                    {{-- <a class="btn btn-success" style="color:white;" onclick="calculation()">Check</a>
                    <span style="color:green">You have to check</span> --}}
                    {{-- <p id="show-check" style="color:red; font-size: 20px;"></p> --}}
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">MAC Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="mac" name="mac" value="{{$item->mac}}" placeholder="Enter mack address">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Want AMC: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2" id="want_amc" name="want_amc" data-placeholder="Choose one option" required>
                        <option selected disabled>--Select One Option--</option>
                        <option @if ($item->want_amc == 1) selected @endif value="1">YES</option>
                        <option @if ($item->want_amc == 2) selected @endif value="2">NO</option>
                  </select>
                </div>
              </div> 
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">AMC No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="amc1" name="amc_no" value="{{$item->amc_no}}" placeholder="Enter amc no" >
                </div>
              </div>
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">AMC start date: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="date" class="form-control" id="amc2" name="amc_start" value="{{$item->amc_start}}" placeholder="Enter amc start" >
                </div>
              </div>
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">AMC end date: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="date" class="form-control" id="amc3" name="amc_end" value="{{$item->amc_end}}" placeholder="Enter amc end">
                </div>
              </div>   
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </form>  
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

@endpush
