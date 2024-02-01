<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
  <div style="margin-left: 20%; margin-top: 5%;">
    <div class="row">
      <div class="col">
        <a class="btn btn-primary" href="{{url('/adhome')}}">Back</a>

      </div>
      <div class="col">
        <form action="{{ url('/makepdf') }}" method="get">
    
          <input type="date" name="from" value="{{$from}}" hidden>
          <input type="date" name="to" value="{{$to}}" hidden>
          <input type="text" name="notDone" value="{{$notDone}}" hidden>
          <input type="text" name="partialyDone" value="{{$partialyDone}}" hidden>
          <input type="text" name="done" value="{{$done}}" hidden>
          <input type="text" name="closed" value="{{$closed}}" hidden>
          <button type="submit" class="btn btn-primary" style="margin:0;paddin:0;">GO TO PDF ViEW</button>
        </form>
      </div>
  </div>


    <form action="{{url('bar-chart/data')}}" method="POST">
      @csrf
        <div class="row" style="margin: 20px;">
          <div class="col-md-3" style="padding: 10px">
            <label for="From">From</label>
            <input type="date" id="from" name="from" class="form-control" />
        </div>
        <div class="col-md-3" style="padding: 10px">
            <label for="To">To</label>
            <input type="date" id="to" name="to" class="form-control" />
        </div>
        <div class="col-md-3" style="margin-top: 32px;">
            <button type="submit" class="btn btn-success" value="Filter">Filter</button>
        </div>
        </div>
    </form>
  
  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>  
<h6><span style="color:red;">Warning: </span> Don't try to generate pdf of more than 500 tickets in one time.</h6>
  </div>

<script>
  var notDone = {!! json_encode($notDone) !!};
  var partialyDone = {!! json_encode($partialyDone) !!};
  var done = {!! json_encode($done) !!};
  var clo = {!! json_encode($closed) !!};

var xValues = ["Not Done - "+notDone,"Partialy Done - "+partialyDone, "Done - "+done, "Closed - "+clo];
var yValues = [notDone, partialyDone, done, clo];
var barColors = ["red", "green","blue","orange"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Ticket Status Statistic"
    }
  }
});
</script>

</body>
</html>
