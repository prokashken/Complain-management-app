<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">


    {{-- <!-- Twitter -->
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
    <meta name="author" content="ThemePixels"> --}}

    <title>CSIR-NAL</title>

    <!-- vendor css -->
    <link href="{{asset('public/storage/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/storage/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet"> --}}

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('public/storage/css/bracket.css')}}">
    
    @stack('css')
  </head>

  <body>
    @include('layouts.sidebar')

    @include('layouts.header')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="index.html">Bracket</a>
            <span class="breadcrumb-item active">Blank Page</span>
          </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
          <div>
            <h4>Welcome <span style="color:#19a6b0">{{Auth::user()->name}}</span></h4>
          </div>
        </div><!-- d-flex -->
  
        <div class="br-pagebody">
  
          @yield('content')
  
        </div><!-- br-pagebody -->
  
      </div><!-- br-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->

      <script src="{{asset('public/storage/lib/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('public/storage/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
      <script src="{{asset('public/storage/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('public/storage/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
      <script src="{{asset('public/storage/lib/moment/min/moment.min.js')}}"></script>
      <script src="{{asset('public/storage/lib/peity/jquery.peity.min.js')}}"></script>
  
      <script src="{{asset('public/storage/js/bracket.js')}}"></script>
    @stack('scripts')
  </body>
</html>
