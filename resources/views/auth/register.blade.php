<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-200v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40">The Admin Template For Perfectionist</div>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Enter your name" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="form-group">
              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Enter your email" required>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->
          <div class="form-group">
              <input type="text" id="emp_id" name="emp_id" class="form-control @error('emp_id') is-invalid @enderror"  value="{{ old('emp_id') }}" placeholder="Enter employ id" required>
              @error('emp_id')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->
          <div class="form-group">
              <input type="text" id="division" name="division" class="form-control @error('division') is-invalid @enderror"  value="{{ old('division') }}" placeholder="Enter your division" required>
              @error('division')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div><!-- form-group -->
          <div class="form-group">
            <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror"  value="{{ old('designation') }}" placeholder="Enter your designation" required>
            @error('designation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="form-group">
            <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Enter your phone number" required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="form-group">
            <input type="text" id="desk_no" name="desk_no" class="form-control @error('desk_no') is-invalid @enderror"  value="{{ old('desk_no') }}" placeholder="Enter your desk no" required>
            @error('desk_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->

          <div class="form-group">
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div><!-- form-group -->

          <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>

          <div class="mg-t-40 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
        </form>  
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/select2/js/select2.min.js')}}"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
