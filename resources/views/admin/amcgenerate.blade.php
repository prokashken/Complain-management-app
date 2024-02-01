@php
    use App\Models\User;
    use App\Models\Error;
    use App\Models\Item;
@endphp

@extends('layouts.app')
@section('content')
<h6 class="br-section-label">AMC Generate</h6>
<form action='{{url("amcrgenerate/$item->id")}}' method="POST">
    @csrf
    <div class="form-layout form-layout-4">
        <div class="row">
          <label class="col-sm-4 form-control-label">Emp_ID: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="emp_id" value="{{$item->user->emp_id}}" placeholder="Enter firstname">
          </div>
        </div><!-- row -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Emp_Name: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="emp_name" value="{{$item->user->name}}" placeholder="Enter email address">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Equip Name: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="name" value="{{$item->name}}" placeholder="Enter email address">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">PIR No: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" selected name="pir_no" value="{{$item->pir_no}}">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">PO Date: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="date" class="form-control" selected name="po_date" value="{{$item->po_date}}">
          </div>
        </div>
         <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">AMC No: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control @error('amc_no') is-invalid @enderror" selected name="amc_no" value="{{$item->amc_no}}">
          @error('amc_no')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>
        </div>
         <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">AMC Start: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="date" class="form-control" selected name="amc_start" value="{{$item->amc_start}}">
          </div>
        </div>
         <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">AMC End: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="date" class="form-control" selected name="amc_end" value="{{$item->amc_end}}">
          </div>
        </div>

        <div class="form-layout-footer mg-t-30">
          <button class="btn btn-info">Submit Form</button>
        </div><!-- form-layout-footer -->
    </div>
    
</form>

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
