@php
    use App\Models\User;
    use App\Models\Error;
@endphp

@extends('layouts.app')
@section('content')
<h6 class="br-section-label">Edit SubAdmin</h6>
<form action='{{url("subadmin/$user->id")}}' method="POST">
    @csrf
    <div class="form-layout form-layout-4">
        <div class="row">
          <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter firstname">
          </div>
        </div><!-- row -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Emp_ID: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="emp_id" value="{{$user->emp_id}}" placeholder="Enter lastname">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Designation: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="designation" value="{{$user->designation}}" placeholder="Enter email address">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Mobile No: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="number" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Enter your address">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter your address">
          </div>
        </div>
         <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Assign Role: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <select class="form-control select2" name="role" data-placeholder="Choose Browser">
                    <option selected="" disabled="">--Choose One--</option>
                    <option @if ($user->role == 1) selected @endif value="1">HARDWARE</option>
                    <option @if ($user->role == 2) selected @endif value="2">SOFTWARE</option>
                    <option @if ($user->role == 3) selected @endif value="3">NETWORK</option>
                    <option @if ($user->role == 4) selected @endif value="4">PRINTER</option>
                    <option @if ($user->role == 5) selected @endif value="5">SERVER</option>
                 </select>
            </div>
        </div>
         <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="password" class="form-control" name="password"  placeholder="Enter new password"  value="">
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
