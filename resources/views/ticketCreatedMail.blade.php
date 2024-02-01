<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$data['title']}}</title>
</head>
<body>

    <p><span style="font-weight: bold;">Employee Name : </span>{{ $data['emp_name'] }}</p>
    <p><span style="font-weight: bold;">Employee ID : </span>{{ $data['emp_id'] }}</p>
    <p><span style="font-weight: bold;">Employee Email : </span>{{ $data['email'] }}</p>
    <p><span style="font-weight: bold;">Employee Phone : </span>{{ $data['phone'] }}</p>
    <p><span style="font-weight: bold;">Employee Internal No : </span>{{ $data['internal_no'] }}</p>
    <p><span style="font-weight: bold;">Building Location : </span>{{ $data['building_location'] }}</p>
    <p><span style="font-weight: bold;">Floor No : </span>{{ $data['floor_no'] }}</p>
    <p><span style="font-weight: bold;">Room No : </span>{{ $data['room_no'] }}</p>
    <p><span style="font-weight: bold;">Ticket Type : </span>{{  App\Enums\TicketType::getKey((int)$data['ticket_type']) }}</p>
    <br>
    <p>Thank You!</p>

</body>
</html>
