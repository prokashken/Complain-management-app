@php
    use App\Models\User;
    use App\Models\Error;
@endphp
@extends('layouts.app')
@section('content')
  <div class="pd-y-30 tx-center bg-dark">
  </div>
 <!-- LARGE MODAL For Reason Msg -->
 <div id="modaldemomsg" class="modal fade">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Request Reason</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form action="{{route('edit.reason')}}" method="POST">
          @csrf
          <div class="col-sm-4 mg-t-10 mg-sm-t-0" id="item_id">
            <input type="text" class="form-control" id="my_element_id" name="item_id" hidden>
            <textarea name="edit_reason" cols="50" rows="5"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
        <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
 </div>

  <!-- LARGE MODAL For see the edti reason -->
  <div id="modaldemores" class="modal fade">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Request Reason</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-20">
          <form action="{{route('edit.permission')}}" method="POST">
            @csrf
            <div class="col-sm-4 mg-t-10 mg-sm-t-0" id="item_id2">
              <input type="text" name="item_id" id="my_element_id3" hidden>
              <textarea cols="50" rows="5" class="form-control" id="my_element_id2"></textarea>
              {{-- <textarea name="edit_reason" cols="50" rows="5"></textarea> --}}
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary tx-size-xs">Approve</button>
          <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="card shadow-base bd-0 mg-0">
      <div class="card-body pd-25">
          <div class="table-wrapper">
              <table id="datatable2" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Action</th>
                    <th class="wd-10p">Category</th>
                    <th class="wd-15p">device_name</th>
                    <th class="wd-25p">pir_no</th>
                    <th class="wd-20p">po_no</th>
                    <th class="wd-20p">po_amount</th>
                    <th class="wd-20p">po_date</th>
                    <th class="wd-20p">warranty_years</th>
                    <th class="wd-20p">days_left_warranty</th>
                    <th class="wd-20p">mac</th>
                    <th class="wd-20p">amc_no</th>
                    <th class="wd-20p">amc_start</th>
                    <th class="wd-20p">amc_end</th>
                    <th class="wd-20p">want_amc</th>
                    <th class="wd-20p">Created At</th>
                    <th class="wd-20p">Updated At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($itemList as $item)
                  <tr>
                    <td>
                      @if (Auth::user()->is_admin == 2)
                        @if (($item->edit_access == 1) && ($item->edited == 0))
                          <a href="{{ url("edititem/$item->id") }}" style="margin-bottom:10px;" class="btn btn-success">Edit</a>
                        @elseif(($item->edit_access == 0) && ($item->edited == 0) && ($item->edit_reason != null))
                          <a href="#" style="margin-bottom:10px;" class="btn btn-success">Wait For Aprroval</a>
                        @elseif(($item->edit_access == 1) && ($item->edited == 1) && ($item->edit_reason != null))
                          <a href="#" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Non-Editable</a>
                        @else
                          <a href="" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-dismiss="modal" data-id="{{$item->id}}" data-target="#modaldemomsg">Request to edit</a>
                        @endif

                      @elseif(Auth::user()->is_admin == 0)  
                        @if (($item->edit_access == 0) && ($item->edited == 0) && ($item->edit_reason != null))
                        <a href="" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-dismiss="modal"  data-idd="{{$item->id}}" data-reason="{{$item->edit_reason == null ? 'nothing': $item->edit_reason}}" data-target="#modaldemores">Waiting for edit permission</a>
                        @endif
                      @endif
                      <form action="{{ url("/delete-item/$item->id") }}" method="POST"
                          onsubmit="return confirm('Do you really want to delete the task?');">
                          @csrf
                          <input type="submit" name="" value="Delete" class="btn btn-danger btn-sm">
                      </form>
                    </td>
                    <td>
                        {{$item->cat->category_name}}
                    </td>
                    <td>
                        {{$item->device_name}}
                    </td>
                    <td>
                        {{$item->pir_no}}
                    </td>
                    <td>
                        {{$item->po_no}}
                    </td>
                    <td>
                        {{$item->po_amount}}
                    </td>
                    <td>
                        {{$item->po_date}}
                    </td>
                    <td>
                        {{$item->warranty_years}}
                    </td>
                    <td>
                        {{$item->days_left_warranty}}
                    </td>
                    <td>
                        {{$item->mac}}
                    </td>
                    <td>
                        {{$item->amc_no}}
                    </td>
                    <td>
                        {{$item->amc_start}}
                    </td>
                    <td>
                        {{$item->amc_end}}
                    </td>
                    <td>
                         {{$item->want_amc == 1 ? 'YES':'NO'}}
                    </td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $itemList->links() }}
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

$('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

var data_id = '';
var data_reason = '';
var data_idd = '';

if (typeof $(this).data('id') !== 'undefined') {

  data_id = $(this).data('id');
}

if (typeof $(this).data('reason') !== 'undefined') {

data_reason = $(this).data('reason');
}

if (typeof $(this).data('idd') !== 'undefined') {

  data_idd = $(this).data('idd');
}

$('#my_element_id').val(data_id);
$('#my_element_id2').val(data_reason);
$('#my_element_id3').val(data_idd);
});
    </script>
@endpush
