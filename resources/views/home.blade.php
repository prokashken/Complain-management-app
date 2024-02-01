<!doctype html>
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
    <div class="container" style="background-color: #d1d1a7;">
      <div class="row p-5" >
        <div class="col">
          <img src="{{asset('public/storage/image/img1.jpg')}}" style="width: 100px; height:100px" class="rounded float-start" alt="...">
        </div>
        <div class="col-8">
          <h3 class="text-center text-white">CSIR-NATIONAL AEROSPACE LABORATORY BANGALORE - 560017</h3>
        </div>
        <div class="col">
          <img src="{{asset('public/storage/image/img2.jpg')}}" style="width: 100px; height:100px" class="rounded float-end" alt="...">
        </div>
      </div>
      <div class="row p-5">
          <div class="d-grid gap-2 col-2 mx-auto">
              <a type="button" href="{{url('/home2/0')}}" class="btn btn-primary" >Admin</a>
              <a type="button" href="{{url('/home2/1')}}" class="btn btn-primary" >Sub Admin</a>
              <a type="button" href="{{url('/home2/2')}}" class="btn btn-primary" >User</a>
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

      {{-- Model --}}
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>