@php
    use App\Models\User;
    use App\Models\Item;
    use App\Models\Error;
    use App\Models\ItemForm;
    use App\Models\TicketForm;

    $item_form =  ItemForm::find(1);
    $ticket_form =  TicketForm::find(1);

@endphp
@extends('layouts.app')
@section('content')
  <div class="pd-y-30 tx-center bg-dark">
    <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo4">Add Item</a>
    @if(Item::where('user_id',Auth::user()->id)->exists())
      <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo3">Create New Ticket</a>
    @endif
    {{-- <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo4">Resister Equipement List Page</a> --}}
    <button class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="location.reload()">Refresh</button>
  </div>

 <!-- LARGE MODAL For Add PIR -->
 <div id="modaldemopir" class="modal fade">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add PIR No</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form action="{{route('add.pir')}}" method="POST">
          @csrf
          <div class="col-sm-4 mg-t-10 mg-sm-t-0" id="item_id">
            <input type="text" class="form-control" name="pir_no" placeholder="Enter PIR No" required>
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
 

 <!-- LARGE MODAL For Create Ticket -->
  <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Ticket</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-20">
          <form action="{{route('ticket.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($ticket_form->emp_name_show == 'show')
              <div class="row">
                <label class="col-sm-4 form-control-label">Emp_Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="emp_name" placeholder="Enter Name" @if ($ticket_form->emp_name_required == 'required') required @endif value="{{Auth::user()->name}}">
                </div>
              </div><!-- row -->
              @endif
              @if ($ticket_form->emp_id_show == 'show')
              <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Emp_ID: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="emp_id" placeholder="Enter Employ ID" @if ($ticket_form->emp_id_required == 'required') required @endif value="{{Auth::user()->emp_id}}">
                  </div>
              </div>
              @endif
              @if ($ticket_form->designation_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Designation: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="designation" @if ($ticket_form->designation_required == 'required') required @endif placeholder="Enter Designation" value="{{Auth::user()->designation}}">
                </div>
              </div>
              @endif
              @if ($ticket_form->email_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="email" @if ($ticket_form->email_required == 'required') required @endif placeholder="Enter Email" value="{{Auth::user()->email}}" required>
                </div>
              </div>
              @endif
              @if ($ticket_form->phone_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="phone" @if ($ticket_form->phone_required == 'required') required @endif value="{{Auth::user()->phone}}" placeholder="Enter phone number" required>
                </div>
              </div> 
              @endif
              @if ($ticket_form->building_location_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Item location: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="building_location" @if ($ticket_form->building_location_required == 'required') required @endif name="building_location" placeholder="Enter building_location" value="" required>
                  <p style="color:green;">If item is in same location as registered  then click in the below box, else give details</p>
                  <input type="checkbox" name="check1" id="check1">
                </div>
              </div>
              @endif
              @if ($ticket_form->floor_no_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Floor No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="floor_no" @if ($ticket_form->floor_no_required == 'required') required @endif name="floor_no" placeholder="Enter Floor No" value="" required>
                    <p style="color:green;">If item is in same location as registered  then click in the below box, else give details</p>
                  <input type="checkbox" name="check2" id="check2">
                </div>
              </div>
              @endif
              @if ($ticket_form->room_no_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Room No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="room_no" @if ($ticket_form->room_no_required == 'required') required @endif name="room_no" placeholder="Enter Room No" value="" required>
                  <p style="color:green;">If item is in same location as registered  then click in the below box, else give details</p>
                  <input type="checkbox" name="check3" id="check3">
                </div>
              </div>
              @endif
              @if ($ticket_form->internal_no_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Internal No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="number" class="form-control" name="internal_no" @if ($ticket_form->internal_no_required == 'required') required @endif value="{{Auth::user()->internal_no}}" placeholder="Enter internal no" required>
                </div>
              </div>
              @endif
              <div class="row mg-t-20" data-select2-id="9">
                  <label class="col-sm-4 form-control-label">Item Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <select class="form-control select2" id="choose_equip" name="choose_equip" data-placeholder="Choose one option" required>
                        <option selected="" disabled="">--Choose One--</option>
                        @foreach (Item::ListById(Auth::user()->id) as $item)
                          <option value="{{$item->category}}">{{$item->cat->category_name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Product Name: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2" id="product_name" name="product_name" data-placeholder="Choose one option" required>
                    <option selected="" disabled="">--Choose One--</option>
                  </select>
                </div>
              </div> 
              {{-- <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Model No: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2" id="model_no" name="model_no" data-placeholder="Choose one option" required>
                    <option selected="" disabled="">--Choose One--</option>
                  </select>
                </div>
              </div> --}}
              {{-- <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Same As Resister: <span class="tx-danger">*</span></label>
                <input type="checkbox" name="check" id="check">
              </div> --}}
              @if ($ticket_form->pir_no_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PIR No: <span class="tx-danger"></span></label>
                <div class="col-sm-4 mg-t-10 mg-sm-t-0" id="pir_no">
                  {{-- <input type="text" class="form-control" name="pir" value="{{$item->pir_no}}" placeholder="Enter PIR No"> --}}
                </div>
                <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                  {{-- <button class="btn btn-success">Add PIR</button> --}}
                  <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-dismiss="modal" data-target="#modaldemopir">Add PIR</a>
                </div>
              </div>
              @endif
              @if ($ticket_form->device_name_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Device Name: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0" id="device_name1">
                  {{-- <input type="text" class="form-control" name="pir" value="{{$item->pir_no}}" placeholder="Enter device name"> --}}
                </div>
              </div>
              @endif
              @if ($ticket_form->mac_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Mac Address: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0" id="mac1">
                  {{-- <input type="text" class="form-control" name="pir" value="{{$item->pir_no}}" placeholder="Enter mac address"> --}}
                </div>
              </div>
              @endif
              @if ($ticket_form->under_warranty_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Under Warranty: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <select class="form-control select2" name="under_warranty" @if ($ticket_form->under_warranty_required == 'required') required @endif id="under_warranty" data-placeholder="Choose one option" required>
                      <!-- <option value="YES">YES</option>
                      <option value="NO">NO</option> -->
                   </select>
                </div>
              </div>
              @endif
              @if ($ticket_form->under_amc_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Under AMC: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2" id="under_amc" name="under_amc" data-placeholder="Choose one option" required>
                    <option selected="" disabled="">--Choose One--</option>
                  </select>
                </div>
              </div> 
              @endif
              @if ($ticket_form->amc_no_show == 'show')
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">AMC No: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0" id="amc_no">
                  {{-- <input type="text" class="form-control" name="amc" value="{{$item->amc_no}}" placeholder="Enter AMC No"> --}}
                </div>
              </div>
              @endif
    
              <div class="row mg-t-20" data-select2-id="9">
                  <label class="col-sm-4 form-control-label">Ticket Type: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <select class="form-control select2" name="ticket_type" data-placeholder="Choose one option" required>
                          <option value="1">Hardware</option>
                          <option value="2">Software</option>
                          <option value="3">Network</option>
                          <option value="4">Printer</option>
                          <option value="5">Server</option>
                      </select>
                  </div>
              </div>
              {{-- <div class="row mg-t-20" data-select2-id="9">
                  <label class="col-sm-4 form-control-label">Error Type: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <select class="form-control select2" name="error_type" data-placeholder="Choose one option" required>
                        @foreach (Error::List() as $error)
                          <option value="{{$error->id}}">{{$error->error_name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div> --}}
              @if ($ticket_form->message_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Do you want to give details about Error: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" name="message" placeholder="Enter your message" @if ($ticket_form->message_required == 'required') required @endif></textarea>
                </div>
              </div>
              @endif

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Upload Screenshot : </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="file" id="file" name="screenshot">
                    <p style="color:green;">Attach file should be in .jpeg or .jpg. File size should be less than 5 MB.</p>
                </div>
              </div>
   {{--           <div class="row mg-t-10">
                  <label class="col-sm-4 form-control-label">Under AMC: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <div class="row">
                          <div class="col-lg-3">
                              <label class="rdiobox">
                                  <input name="rdio" id="amc" type="radio">
                                  <span>Yes</span>
                              </label>
                              </div><!-- col-3 -->
                              <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                              <label class="rdiobox">
                                  <input name="rdio" id="pir" type="radio">
                                  <span>No</span>
                              </label>
                              </div><!-- col-3 -->
                      </div>
                  </div>
                </div> --}}
                
                {{-- <div class="row mg-t-20" id="diva">
                  <label class="col-sm-4 form-control-label">AMC No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="amc" placeholder="Enter AMC No">
                  </div>
                </div>
                <div class="row mg-t-20" id="divr">
                  <label class="col-sm-4 form-control-label">PIR No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="pir" placeholder="Enter PIR No">
                  </div>
                </div>
            --}}
              </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </form>  
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->


 <!-- LARGE MODAL for Add Items-->
  <div id="modaldemo4" class="modal fade">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Item</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-20">
          <form action="{{route('item.create')}}" method="POST">
            @csrf
            @if ($item_form->emp_name_show == 'show')
              <div class="row">
                  <label class="col-sm-4 form-control-label">Emp Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="emp_name" placeholder="Enter Name" value="{{Auth::user()->name}}" required>
                  </div>
                </div><!-- row -->
              @endif
              @if ($item_form->emp_id_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Emp ID: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="emp_id" placeholder="Enter Emp ID"value="{{Auth::user()->emp_id}}" required>
                  </div>
                </div>
              @endif
              @if ($item_form->designation_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Designation: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="{{Auth::user()->designation}}" required>
                  </div>
                </div>
              @endif
              @if ($item_form->email_show == 'show')
                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="{{Auth::user()->email}}" required>
                    </div>
                </div>
              @endif
              @if ($item_form->phone_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Mobile No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="number" class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Mobile No" required>
                  </div>
                </div>
              @endif
              @if ($item_form->building_location_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Building Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="building_location" placeholder="Enter Building Name" value="{{Auth::user()->building_location}}" required>
                  </div>
                </div>
              @endif
              @if ($item_form->floor_no_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Floor No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="floor_no" placeholder="Enter Floor No" value="{{Auth::user()->floor_no}}" required>
                  </div>
                </div>
              @endif
              @if ($item_form->room_no_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Room No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="room_no" placeholder="Enter Room No" value="{{Auth::user()->room_no}}" required>
                  </div>
                </div>
              @endif
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Item Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  {{-- <input type="text" class="form-control" name="name" value="" placeholder="Enter item name" required> --}}
                  <select class="form-control select2" id="name" name="name" data-placeholder="Choose one option" required>
                    <option value="" selected disabled>--Select One Option--</option>
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
                @if ($item_form->product_name_show == 'show')
                  <label class="col-sm-4 form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="product_name" @if ($item_form->product_name_required == 'required') required @endif placeholder="Enter Product Name">
                  </div>
                @endif
                @if ($item_form->qty_show == 'show')
                  <label class="col-sm-2 form-control-label">QTY: <span class="tx-danger">*</span></label>
                  <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                    {{-- <input type="type" id="idname" oninput="fun()" value=""> --}}
                    <input type="number" oninput="fun()" id="qty" class="form-control" @if ($item_form->qty_required == 'required') required @endif name="qty" placeholder="Enter QTY">
                  <div id="form">

                  </div>
                  </div>
                @endif
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Have you purchased the item on/after 01/01/2024: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2" id="item_purched" name="item_purched" data-placeholder="Choose one option">
                    <option selected disabled>--Select One Option--</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
              </div>
              <div class="row mg-t-20">
                @if ($item_form->pir_no_show == 'show')
                  <label class="col-sm-4 form-control-label">PIR No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control @error('pir_no') is-invalid @enderror" @if ($item_form->pir_no_required == 'required') required @endif name="pir_no" placeholder="Enter PIR No">
                    @error('pir_no')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                @endif
                @if ($item_form->delivery_date_show == 'show')
                  <label class="col-sm-2 form-control-label">Delivery Date: <span class="tx-danger">*</span></label>
                  <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                    <input type="date" id="delivery_date" class="form-control" name="delivery_date" @if ($item_form->delivery_date_required == 'required') required @endif placeholder="Enter Delivery Date"value="{{Auth::user()->room_no}}">
                  </div>
                @endif
              </div>
              <div class="row mg-t-20">
                <label id="device_name_yes_label" class="col-sm-4 form-control-label">Do you have device name?: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2" id="device_name_yes" name="device_name_yes" data-placeholder="Choose one option">
                    <option selected disabled>--Select One Option--</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                  <input type="text" class="form-control" id="device_name" name="device_name" value="" placeholder="Enter your device name">
                  <p id="device_name_instruction">Right Click on My Computer/This PC->Properties</p>
                </div>
              </div>
              <div class="row mg-t-20">
                <label id="have_mac_label" class="col-sm-4 form-control-label">Do you have MAC address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <select class="form-control select2" id="have_mac" name="have_mac" data-placeholder="Choose one option">
                  <option selected disabled>--Select One Option--</option>
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
                </select>
                </div>
              </div>
              @if ($item_form->mac_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">MAC Address: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control @error('mac') is-invalid @enderror" id="mac" name="mac" @if ($item_form->mac_required == 'required') required @endif value="" placeholder="Enter mac address">
                    <p id="mac_instruction">Press WIN and R together in keyboard-> in command box type cmd->press enter->type getmac->enter</p>
                    @error('mac')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              @endif            

              {{-- @if ($item_form->model_no_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Model No: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" name="model_no" @if ($item_form->model_no_required == 'required') required @endif value="" placeholder="Enter model no">
                  </div>
                </div>
              @endif --}}
              @if ($item_form->warranty_years_show == 'show')
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">No of years Warranty: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <select class="form-control select2" id="warranty_years" @if ($item_form->warranty_years_required == 'required') required @endif name="warranty_years" data-placeholder="Choose one option">
                          <option selected disabled>--Select One Option--</option>
                          <option value="1">1 year</option>
                          <option value="2">2 year</option>
                          <option value="3">3 year</option>
                          <option value="4">4 year</option>
                          <option value="5">5 year</option>
                          <option value="6">6 year</option>
                          <option value="7">7 year</option>
                          <option value="8">8 year</option>
                          <option value="9">9 year</option>
                          <option value="10">10 year</option>
                    </select>

                    {{-- <a class="btn btn-success" style="color:white;" onclick="calculation()">Check</a>
                    <span style="color:green">You have to check</span> --}}
                    <p id="show-check" style="color:red; font-size: 20px;"></p>
                </div>
              </div>
              @endif
               {{-- <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PIR No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" id="pir_no" name="pir_no" value="" placeholder="Enter pir no" required>
                </div>
              </div> --}}
              <div class="row mg-t-20">
                <label id="item_in_amc_label" class="col-sm-4 form-control-label">Is the item in amc?: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2" id="item_in_amc" name="item_in_amc" data-placeholder="Choose one option">
                    <option selected disabled>--Select One Option--</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                  {{-- <input type="text" class="form-control" id="device_name" name="device_name" value="" placeholder="Enter your device name"> --}}
                </div>
              </div>
              @if ($item_form->want_amc_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label" id="amc4_label">Do you want AMC: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2" id="amc4" @if ($item_form->want_amc_required == 'required') required @endif name="want_amc" data-placeholder="Choose one option">
                      <option selected disabled>--Select One Option--</option>
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                      <p id="item_in_amc_instruction">please contact to ictd Office: 6706 / 6578 HOD ICTD : 6520</p>
                  </div>
                </div> 
              @endif
              @if ($item_form->po_no_show == 'show')
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">PO No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control @error('po_no') is-invalid @enderror" id="po_no" @if ($item_form->po_no_required == 'required') required @endif name="po_no" value="" placeholder="Enter po no">
                    @error('po_no')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               </div>
              @endif
              @if ($item_form->po_amount_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">PO Amount: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="number" step="any" class="form-control" id="po_amount" @if ($item_form->po_amount_required == 'required') required @endif name="po_amount" value="" placeholder="Enter po amount in RS." >
                  </div>
                </div>
              @endif
              @if ($item_form->po_date_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">PO Date: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="date" class="form-control" id="po_date"  @if ($item_form->po_date_required == 'required') required @endif name="po_date" value="">
                    <input type="number" class="form-control" id="remain_days" name="days_left_warranty" value="" hidden>
                  </div>
                </div>
              @endif
              @if ($item_form->amc_no_show == 'show')
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">AMC No: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control @error('amc_no') is-invalid @enderror" id="amc1" name="amc_no" value="" @if ($item_form->amc_no_required == 'required') required @endif placeholder="Enter amc no" disabled>
                  @error('amc_no')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              @endif
              @if ($item_form->amc_start_show == 'show')
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">AMC start date: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="date" class="form-control" id="amc2" name="amc_start" value="" @if ($item_form->amc_start_required == 'required') required @endif placeholder="Enter amc start date" disabled>
                  </div>
                </div>
              @endif
              @if ($item_form->amc_end_show == 'show')
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">AMC end date: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="date" class="form-control" id="amc3" name="amc_end" @if ($item_form->amc_end_required == 'required') required @endif value="" placeholder="Enter end date" disabled>
                </div>
              </div> 
              @endif  
              </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary tx-size-xs">Submit</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
            </div>
          </form>  
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->


  <div class="card shadow-base bd-0 mg-0">
      <div class="card-body pd-25">
          <div class="table-wrapper">
              <table id="datatable2" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Ticket No.</th>
                    <th class="wd-10p">Ticket Handled By</th>
                    <th class="wd-15p">Ticket Type</th>
                    <th class="wd-15p">Reason Of Not Closed Yet</th>
                    {{-- <th class="wd-15p">Error Type</th> --}}
                    <th class="wd-15p">Action Taken</th>
                    <th class="wd-25p">Status</th>
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
                      {{$personName == null ? '': $personName}}
                    </td>
                    <td>{{App\Enums\TicketType::getKey($ticket->ticket_type)}}</td>
                    {{-- <td>
                      <select class="form-control select2" name="error_type" data-placeholder="Choose one option" disabled>
                        @foreach (Error::List() as $error)
                          <option value="{{$error->id}}" @if ($error->id == $ticket->error_type) selected @endif>{{$error->error_name}}</option>
                        @endforeach
                      </select>
                    </td> --}}
                    <td><textarea disabled>{{$ticket->not_closed_reason == null ? '':$ticket->not_closed_reason}}</textarea></td>
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
            </div><!-- table-wrapper -->
      </div>
      <!-- card-body -->
  </div>
  {{-- @if(count($errors) > 0)
  <script>
    var galleryModal = new bootstrap.Modal(document.getElementById('modaldemo4'), {
     keyboard: false
   });
   
   galleryModal.show();
   </script>
@endif --}}
@endsection
@push('css')
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
  $(document).ready(function () {

    $("#mac_instruction").hide();
    $("#device_name").hide();
    $("#device_name_instruction").hide();
    $("#have_mac").hide();
    $("#have_mac_label").hide();
    // $("#device_name_yes").hide();
    // $("#device_name_yes_label").hide();

    $("#item_in_amc").hide();
    $("#item_in_amc_instruction").hide();
    $("#item_in_amc_label").hide();
    $("#amc4").hide();
    $("#amc4_label").hide();

    document.getElementById("amc4").disabled = true;
    document.getElementById("po_no").disabled = true;
    document.getElementById("po_date").disabled = true;
    document.getElementById("po_amount").disabled = true;

    document.getElementById("mac").disabled = true;
    // document.getElementById("device_name_yes").disabled = true;

    $('select[name="choose_equip"]').on('change', function(){
      var equip_id = $(this).val();
      if(equip_id){
        $.ajax({
          url: "{{url('/get/equip_info/')}}/"+equip_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#product_name").empty();
            $("#product_name").append('<option selected="" disabled="">--Choose One--</option>');
            // <option selected="" disabled="">--Choose One--</option>
            $.each(data,function(key,value){
              $("#product_name").append('<option value="'+value.id+'">'+value.product_name+'</option>');
            });
            
          },
        });
      }else {
        alert('danger');
      }
    });

  });

  $('select[name="product_name"]').on('change', function(){
      var equip_id = $(this).val();
      if(equip_id){
        $.ajax({
          url: "{{url('/get/equip_info2/')}}/"+equip_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#pir_no").empty();
            $("#amc_no").empty();
            $("#under_warranty").empty();
            $("#under_amc").empty();
            $.each(data,function(key,value){
              $("#pir_no").append('<input type="text" class="form-control" name="pir_no" value="'+value.pir_no+'">');
              $("#amc_no").append('<input type="text" class="form-control" name="amc_no" value="'+value.amc_no+'">');
              $("#device_name1").append('<input type="text" class="form-control" name="pir_no" value="'+value.device_name+'">');
              $("#mac1").append('<input type="text" class="form-control" name="amc_no" value="'+value.mac+'">');
              $("#item_id").append('<input type="text" class="form-control" name="item_id" hidden value="'+value.id+'">');
              if(value.amc_no == null)
              {
                $("#under_amc").append('<option>'+'NO'+'</option>');
              }else{
                $("#under_amc").append('<option>'+'YES'+'</option>');
              }
              var pi = new Date(value.delivery_date);
              var year = pi.getFullYear();
              var month = pi.getMonth();
              var day = pi.getDate();
              var ci = new Date(year + value.warranty_years , month, day);
              console.log(ci);

              var date3 = new Date();
              var date4 = new Date(ci);
              var diffDay = parseInt((date4 - date3) / (1000 * 60 * 60 * 24), 10);
              
              if(diffDay <= 0){
                // <option value="NO">NO</option>
                $("#under_warranty").append('<option value="NO">'+'NO'+'</option>');                 
              }else{
                $("#under_warranty").append('<option value="YES">'+'YES'+'</option>');
              }
            });
            
          },
        });
      }else {
        alert('danger');
      }
    });


  $('#datatable2').DataTable({
  responsive: true,
  language: {
    searchPlaceholder: 'Search...',
    sSearch: '',
    lengthMenu: '_MENU_ items/page',
  }
});

    var delivery_date;
    var warranty_years;
    $('select[name="warranty_years"]').on('change', function(){
    // function calculation() { 
      delivery_date = document.getElementById('delivery_date').value;
        warranty_years = document.getElementById('warranty_years').value;

        var d = new Date(delivery_date);
        var year = d.getFullYear();
        var month = d.getMonth();
        var day = d.getDate();
        var c = new Date(year + parseInt(warranty_years) , month, day);
        console.log(c);

        var date1 = new Date();
        var date2 = new Date(c);
        var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24), 10);

        if (diffDays <= 0) {
          console.log('here');
          // document.getElementById("amc1").disabled = false;
          // document.getElementById("amc2").disabled = false;
          // document.getElementById("amc3").disabled = false;

          // document.getElementById("amc1").required = true;
          // document.getElementById("amc2").required = true;
          // document.getElementById("amc3").required = true;
          // document.getElementById("amc4").disabled = true;
          document.getElementById("show-check").innerHTML = "Warranty has been expired";
          document.getElementById("remain_days").value = diffDays;
          
          $("#item_in_amc").show();
          // $("#item_in_amc_instruction").show();
          $("#item_in_amc_label").show();
          document.getElementById("item_in_amc").disabled = false;
          document.getElementById("amc4").disabled = false;
        
        }
        else{
          document.getElementById("amc1").disabled = true;
          document.getElementById("amc2").disabled = true;
          document.getElementById("amc3").disabled = true;
          document.getElementById("amc4").disabled = false;
          document.getElementById("amc1").required = false;
          document.getElementById("amc2").required = false;
          document.getElementById("amc3").required = false;
          document.getElementById("item_in_amc").disabled = true;
          // document.getElementById("amc4").disabled = true;
          $("#item_in_amc").hide();
          $("#amc4").show();
          $("#amc4_label").show();
          // $("#item_in_amc_instruction").hide();
          $("#item_in_amc_label").hide();
          document.getElementById("show-check").innerHTML = diffDays+" more days of Warranty";
          document.getElementById("remain_days").value = diffDays;
        }

    // }
  });

  $('select[name="want_amc"]').on('change', function(){

    if ($(this).val() == '1') {
      $("#item_in_amc_instruction").show();
    }
  });

  $('select[name="item_in_amc"]').on('change', function(){
    if ($(this).val() !== 'YES') {
      $("#item_in_amc_instruction").hide();
      $("#amc4").show();
      $("#amc4_label").show();
      document.getElementById("amc4").disabled = false;
      document.getElementById("amc4").required = true;

          document.getElementById("amc1").disabled = true;
          document.getElementById("amc2").disabled = true;
          document.getElementById("amc3").disabled = true;

          document.getElementById("amc1").required = false;
          document.getElementById("amc2").required = false;
          document.getElementById("amc3").required = false;
    }else{
      // $("#item_in_amc_instruction").show();
      $("#amc4").hide();
      $("#amc4_label").hide();
      document.getElementById("amc4").disabled = true;
      document.getElementById("amc4").required = false;

          document.getElementById("amc1").disabled = false;
          document.getElementById("amc2").disabled = false;
          document.getElementById("amc3").disabled = false;

          document.getElementById("amc1").required = true;
          document.getElementById("amc2").required = true;
          document.getElementById("amc3").required = true;
    }
  });
  $('select[name="name"]').on('change', function(){
    if ($(this).val() !== '7') {
      document.getElementById("mac").disabled = false;
      document.getElementById("mac").required = true;
      document.getElementById("qty").disabled = true;
      $("#mac_instruction").show();
      $("#have_mac").hide();
      $("#have_mac_label").hide();
      // $("#device_name_yes_label").hide();
      // $("#device_name_yes").hide();
      // $("#device_name").hide();
      // $("#device_name_instruction").hide();
    } else {
      document.getElementById("mac").disabled = true;
      document.getElementById("qty").disabled = false;
      $("#mac_instruction").hide();
      $("#have_mac").show();
      $("#have_mac_label").show();
    } 
  });

  $('select[name="have_mac"]').on('change', function(){
    if ($(this).val() === 'YES') {
      document.getElementById("mac").disabled = false;
      document.getElementById("mac").required = true;
      $("#mac_instruction").show();
      // $("#device_name_yes").hide();
      // $("#device_name_yes_label").hide();
    }else{
      document.getElementById("mac").disabled = true;
      $("#mac_instruction").hide();
      // $("#device_name_yes").show();
      // $("#device_name_yes_label").show();
    }
  });

  $('select[name="device_name_yes"]').on('change', function(){
    if ($(this).val() !== 'NO') {
      $("#device_name").show();
      $("#device_name_instruction").show();
      document.getElementById("device_name").required = true;
    } else {
      $("#device_name").hide();
      $("#device_name_instruction").hide();
      $("#have_mac").show();
      $("#have_mac_label").show();
    } 
  });
  
  $('select[name="item_purched"]').on('change', function(){
    if ($(this).val() !== 'NO') {
      document.getElementById("po_no").disabled = false;
      document.getElementById("po_date").disabled = false;
      document.getElementById("po_amount").disabled = false;
      document.getElementById("po_no").required = true;
      document.getElementById("po_date").required = true;
      document.getElementById("po_amount").required = true;
    } else {
      document.getElementById("po_no").disabled = true;
      document.getElementById("po_date").disabled = true;
      document.getElementById("po_amount").disabled = true;
      
    } 
  });

  $('#check1').on('change', function(){ // on change of state
   if(this.checked) // if changed state is "CHECKED"
    {
      var user_id = {!! json_encode(Auth::user()->id) !!};
      $.ajax({
          url: "{{url('/get/user_info/')}}/"+user_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#building_location").empty();
            $.each(data,function(key,value){
              document.getElementById("building_location").value = value.building_location;
            });
          },
        });
    }
  });
  $('#check2').on('change', function(){ // on change of state
   if(this.checked) // if changed state is "CHECKED"
    {
      var user_id = {!! json_encode(Auth::user()->id) !!};
      $.ajax({
          url: "{{url('/get/user_info/')}}/"+user_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#floor_no").empty();
            $.each(data,function(key,value){
              document.getElementById("floor_no").value = value.floor_no;
            });
          },
        });
    }
  });
  $('#check3').on('change', function(){ // on change of state
   if(this.checked) // if changed state is "CHECKED"
    {
      var user_id = {!! json_encode(Auth::user()->id) !!};
      $.ajax({
          url: "{{url('/get/user_info/')}}/"+user_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#room_no").empty();
            $.each(data,function(key,value){
              document.getElementById("room_no").value = value.room_no;
            });
          },
        });
    }
  });

  function fun() {
    /*Getting the number of text fields*/
    var parent = document.getElementById("form");
    cleanDiv(parent);
    var no = document.getElementById("qty").value;
    /*Generating text fields dynamically in the same form itself*/
    for(var i=0;i<no;i++) {
        var textfield = document.createElement("input");
        textfield.type = "text";
        textfield.name = "serial[]";
        textfield.placeholder = "Enter the serial number "+(i+1);
        textfield.value = "";
        document.getElementById('form').appendChild(textfield);
    }
}

function cleanDiv(div){
  div.innerHTML = '';
}

var error = {!! json_encode(count($errors))!!};
console.log(error)
    if(error){
      var galleryModal = new bootstrap.Modal(document.getElementById('modaldemo4'), {
        keyboard: false
      });
      galleryModal.show();
    }
  </script>
@endpush
