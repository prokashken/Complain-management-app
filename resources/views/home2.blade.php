<!doctype html>
@php
use App\Models\RegistrationForm;

    $registration_form =  RegistrationForm::find(1);
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CSIR-NATIONAL</title>
  </head>
  <body>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if (session('status'))
<div class="alert alert-primary" role="alert">
  </button>
  <strong class="d-block d-sm-inline-block-force">Well Done!</strong> {{ session('status') }}.
</div>
@endif
    <div class="container" style="background-color: #d1d1a7;">
        <div class="row p-5" >
          <div class="col">
            <img src="{{asset('public/storage/image/img1.jpg')}}" style="width: 100px; height:100px" class="rounded float-start" alt="...">
          </div>
          <div class="col-8">
            <h3 class="text-center text-white">CSIR-NATIONAL AEROSPACE LABORATORY</h3>
          </div>
          <div class="col">
            <img src="{{asset('public/storage/image/img2.jpg')}}" style="width: 100px; height:100px" class="rounded float-end" alt="...">
          </div>
        </div>
        <div class="row p-5">
            <div class="d-grid gap-2 col-2 mx-auto">
                @if (Route::has('login'))
                    @auth
                      @if (Auth::user()->is_admin == 2)
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                      @else
                        <a href="{{ url('/adhome') }}" class="btn btn-primary">Dashboard</a>
                      @endif
                    @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Sign In</button>
                        @if (Route::has('register') && $id == 2)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Sign Up</button>
                        @endif
                        @if (Route::has('register') && $id == 1)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal101">Sign Up</button>
                    @endif
                    @endauth
                @endif

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">Contact Us</button>
              </div>
          <div class="col">
            <h3 class="p-5 text-center text-white">WELCOME TO ICTD <br> COMPLAIN MANAGEMENT SYSTEM</h3>
          </div>
        </div>
        <div class="row p-5" >
            <div class="col-12 text-center text-white">
              <h3>Design & Developed By @INFORMATION COMMUNICATION & TECHNOLOGY DIVISION CSIR-NAL, BANGALORE</h3>
            </div>
          </div>
      </div>
<!--LogIn Modal -->


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Registered Email ID" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- form-group -->
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> --}}
            </div><!-- form-group -->
            <br>
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
    </div>
  </div>
</div>

{{-- user registration --}}
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          @if ($registration_form->name_show == 'show')
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Enter your name" @if ($registration_form->name_required == 'required') required @endif >
              @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div><!-- form-group -->
          @endif
          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Enter your email" required>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->
          @if ($registration_form->emp_id_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employ ID:</label>
              <input type="text" id="emp_id" name="emp_id" class="form-control @error('emp_id') is-invalid @enderror"  value="{{ old('emp_id') }}" placeholder="Enter employ id" @if ($registration_form->emp_id_required == 'required') required @endif >
              @error('emp_id')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->department_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Department:</label>
            <input type="text" id="department" name="department" class="form-control @error('department') is-invalid @enderror"  value="{{ old('department') }}" placeholder="Enter your department" @if ($registration_form->department_required == 'required') required @endif >
            @error('department')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->designation_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Designation:</label>
            <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror"  value="{{ old('designation') }}" placeholder="Enter your designation" @if ($registration_form->designation_required == 'required') required @endif >
            @error('designation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->phone_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Enter your phone number" @if ($registration_form->phone_required == 'required') required @endif >
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->internal_no_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Internal No:</label>
            <input type="number" id="internal_no" name="internal_no" class="form-control @error('internal_no') is-invalid @enderror"  value="{{ old('internal_no') }}" placeholder="Enter your internal number" @if ($registration_form->internal_no_required == 'required') required @endif >
            @error('internal_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->building_location_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Building Location:</label>
            <input type="text" id="building_location" name="building_location" class="form-control @error('building_location') is-invalid @enderror"  value="{{ old('building_loction') }}" placeholder="Enter your Building Location" @if ($registration_form->building_loction_required == 'required') required @endif >
            @error('building_location')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->floor_no_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Floor No:</label>
            <input type="text" id="floor_no" name="floor_no" class="form-control @error('floor_no') is-invalid @enderror"  value="{{ old('floor_no') }}" placeholder="Enter your Floor No" @if ($registration_form->floor_no_required == 'required') required @endif >
            @error('floor_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          @if ($registration_form->room_no_show == 'show')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Room No:</label>
            <input type="text" id="room_no" name="room_no" class="form-control @error('room_no') is-invalid @enderror"  value="{{ old('room_no') }}" placeholder="Enter your Room No" @if ($registration_form->room_no_required == 'required') required @endif >
            @error('room_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          @endif
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required>
            <p style="color:green;">Must be 10 digit & contain one uppercase letter one lowercase letter at least one digit & a special character from [@$!%*#&] </p>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <br>
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>   
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        </form>  
      </div>
    </div>
  </div>
</div>
{{-- subadmin registration --}}
<div class="modal fade" id="exampleModal101" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Enter your name" required>
            <input type="text" id="subadmin" name="subadmin" class="form-control" hidden  value="from subadmin">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Enter your email" required>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Employ ID:</label>
              <input type="text" id="emp_id" name="emp_id" class="form-control @error('emp_id') is-invalid @enderror"  value="{{ old('emp_id') }}" placeholder="Enter employ id" required>
              @error('emp_id')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Designation:</label>
            <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror"  value="{{ old('designation') }}" placeholder="Enter your designation" required>
            @error('designation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Enter your phone number" required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <br>
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>   
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        </form>  
      </div>
    </div>
  </div>
</div>

{{-- @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif --}}
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact US</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <h6 style="text-emphasis-color: black; ">If you have any query please contact with the Admin</h6><br>
            <address>
              Office: 6706 / 6578 <br>
              HOD ICTD : 6520
            </address>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Modal End -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    @if(count($errors) > 0)

      @if ($errors->first('email') == 'These credentials do not match our records.')
        <script type="text/javascript">
          $(document).ready(function() {
              $('#exampleModal1').modal('show');
          });
        </script>
      @else
        <script type="text/javascript">
          $(document).ready(function() {
              $('#exampleModal2').modal('show');
          });
        </script>
      @endif
  @endif
  </body>
</html>