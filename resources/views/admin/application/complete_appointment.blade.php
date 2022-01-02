@extends('admin.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h5>{{ $page_name }} </h5>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Doctor Name</th>
                        <th>Doctor Phone</th>
                        <th>Amount</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointment as $i=>$appointments)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="text-capitalize">{{ $appointments->consultantName }}</td>
                            <td class="text-capitalize">{{ $appointments->consultantPhone }}</td>
                            <td class="text-capitalize">{{ number_format($appointments->Amount,'2') }} T.K</td>
                            <td>{{ date('d-M-Y',strtotime($appointments->bookDate))}}</td>
                            <td>
                                @if($appointments->bookingStatus == '1')
                                    <label class="text-danger">Pending</label>
                                @elseif($appointments->bookingStatus == '2')
                                    <label class="text-primary">Received</label>
                                @elseif($appointments->bookingStatus == '3')
                                    <label class="text-success">Complete</label>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
