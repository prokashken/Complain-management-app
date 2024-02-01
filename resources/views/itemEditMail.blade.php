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
    <p><span style="font-weight: bold;">Item ID : </span>{{ $data['item_id'] }}</p>
    <p><span style="font-weight: bold;">Edit Reason : </span>{{ $data['edit_reason'] }}</p>

    <br>
    <p>Thank You!</p>

</body>
</html>
