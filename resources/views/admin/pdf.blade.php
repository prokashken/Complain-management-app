@php
    use App\Models\User;
    use App\Models\Error;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="{{asset('public/storage/css/bootstrap.min.css')}}">
    <link href="{{asset('public/storage/css/bootstrap1.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>
<body>
    <div class="container mt-5">
        <img src="{{asset('public/storage/image/pic.jpg')}}" style="width: 600px; height:100px" class="rounded float-start" alt="...">

        <table class="table">
            <thead>
                {{-- <tr class="table-danger"> --}}
                    {{-- <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th> --}}
                </tr>
            </thead>
            <tbody>
                <td style="color: white"> <h6>something</h6></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tbody>
        </table> 
          {{-- <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <img src="{{asset('public/storage/image/img1.jpg')}}" style="width: 100px; height:100px" class="rounded float-start" alt="...">
            </div>
            <div class="p-2 bd-highlight">
                <img src="{{asset('public/storage/image/img2.jpg')}}" style="width: 100px; height:100px" class="rounded float-start" alt="...">
            </div>
          </div> --}}
        <div class="d-flex">
            {{-- <a class="btn btn-primary" href="{{url('/adhome')}}">Back</a> --}}
            @if(!isset($anyVariable))
                <button class="btn btn-primary" onclick="history.back()">Go Back</button>
            @endif
        </div>
        <div class="d-flex justify-content-end mb-4">
            @if(!isset($anyVariable))
                <form action="{{ url('/makepdf/pdf') }}" method="get">
                    <input type="text" name="from" value="{{$data->from}}" hidden>
                    <input type="text" name="to" value="{{$data->to}}" hidden>
                    <button type="submit" class="btn btn-primary">Export to PDF</button>
                </form>       
            @endif
        </div>
        {{-- <div class="row p-5">
            <div class="col">
                <h6><span>From          : </span>{{$data->from == null ? '': $data->from}}</h6>
                <h6><span>To            : </span>{{$data->to == null ? '': $data->to}}</h6>
                <hr>
            </div>
            <div class="col">
                    <h6><span>Not Done      : </span>{{$data->notDone}}</h6>
                    <h6><span>Partialy Done : </span>{{$data->partialyDone}}</h6>
                    <hr>
            </div>
            <div class="col">
                <h6><span>Done          : </span>{{$data->done}}</h6>
                <h6><span>Closed        : </span>{{$data->closed }}</h6>
                <hr>
            </div>
        </div> --}}
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Not Done</th>
                    <th scope="col">Partialy Done</th>
                    <th scope="col">Done</th>
                    <th scope="col">Clodes</th>
                </tr>
            </thead>
            <tbody>
                <td>{{$data->from == null ? '': $data->from}}</td>
                <td>{{$data->to == null ? '': $data->to}}</td>
                <td>{{$data->notDone}}</td>
                <td>{{$data->partialyDone}}</td>
                <td>{{$data->done}}</td>
                <td>{{$data->closed}}</td>
            </tbody>
        </table>    
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Ticket No</th>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Division</th> --}}
                    <th scope="col">Ticket Type</th>
                    <th scope="col">Action Taken</th>
                    <th scope="col">Assigned Person</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notDone as $item)
                    <tr>
                        <th scope="row">{{ $item->id}}</th>
                        <td>{{ $item->emp_name }}</td>
                        {{-- <td>{{ $item->division }}</td> --}}
                        <td>{{App\Enums\TicketType::getKey($item->ticket_type)}}</td>
                        <td>{{ $item->action_taken }}</td>
                        <td>{{ $item->assigned_person == null ? '' : User::List($item->assigned_person)->name}}</td>
                        <td>{{ App\Enums\TicketStatus::getKey($item->status) }}</td>
                    </tr>
                @empty
                    {{-- <p>Larage Data couldn't be processed</p> --}}
                @endforelse

                @forelse($partialyDone as $item)
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->emp_name }}</td>
                    {{-- <td>{{ $item->division }}</td> --}}
                    <td>{{App\Enums\TicketType::getKey($item->ticket_type)}}</td>
                    <td>{{ $item->action_taken }}</td>
                    <td>{{ $item->assigned_person == null ? '' : User::List($item->assigned_person)->name}}</td>
                    <td>{{ App\Enums\TicketStatus::getKey($item->status) }}</td>
                </tr>
                @empty
                    {{-- <p>Larage Data couldn't be processed</p> --}}
                @endforelse

                @forelse($done as $item)
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->emp_name }}</td>
                    {{-- <td>{{ $item->division }}</td> --}}
                    <td>{{App\Enums\TicketType::getKey($item->ticket_type)}}</td>
                    <td>{{ $item->action_taken }}</td>
                    <td>{{ $item->assigned_person == null ? '' : User::List($item->assigned_person)->name}}</td>
                    <td>{{ App\Enums\TicketStatus::getKey($item->status) }}</td>
                </tr>
                @empty
                    {{-- <p>Larage Data couldn't be processed</p> --}}
                @endforelse

                @forelse($closed as $item)
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->emp_name }}</td>
                    {{-- <td>{{ $item->division }}</td> --}}
                    <td>{{App\Enums\TicketType::getKey($item->ticket_type)}}</td>
                    <td>{{ $item->action_taken }}</td>
                    <td>{{ $item->assigned_person == null ? '' : User::List($item->assigned_person)->name}}</td>
                    <td>{{ App\Enums\TicketStatus::getKey($item->status) }}</td>
                </tr>
                @empty
                    {{-- <p>Larage Data couldn't be processed</p> --}}
                @endforelse
            </tbody>
        </table>
    </div>
<div style="text-align: center;">
    <h6>Design & Developed By @INFORMATION COMMUNICATION & TECHNOLOGY DIVISION CSIR-NAL, BANGALORE</h6>
</div>

    {{-- <script src="{{ asset('js/app.js') }}" type="text/js"></script> --}}
</body>
</html>