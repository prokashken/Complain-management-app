<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$data['title']}}</title>
</head>
<body>

    <p><span style="font-weight: bold;">Equipment Name : </span>{{ $data['name'] }}</p>
    <p><span style="font-weight: bold;">Product Name : </span>{{ $data['product_name'] }}</p>
    <p><span style="font-weight: bold;">Model No : </span>{{ $data['model_no'] }}</p>
    <p><span style="font-weight: bold;">PIR NO : </span>{{ $data['pir_no'] }}</p>
    <p><span style="font-weight: bold;">PO NO : </span>{{ $data['po_no'] }}</p>
    <p><span style="font-weight: bold;">PO Date : </span>{{ $data['po_date'] }}</p>
    <p><span style="font-weight: bold;">Warranty(Years) : </span>{{ $data['warranty_years'] }}</p>
    <p><span style="font-weight: bold;">Employ ID : </span>{{ $data['emp_id'] }}</p>
    <p><span style="font-weight: bold;">Employ Email : </span>{{ $data['email'] }}</p>
    {{-- <p><span style="font-weight: bold;">Employ department : </span>{{ $data['department'] }}</p> --}}
    <p><span style="font-weight: bold;">Employ Phone : </span> {{ $data['phone'] }}</p>
    <p><span style="font-weight: bold;">Employ Desk No : </span>{{ $data['desk_no'] }}</p>
    <br>
    <p>Thank You!</p>

</body>
</html>
