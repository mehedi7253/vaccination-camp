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
                        <th>Child Name</th>
                        <th>Vaccine Name</th>
                        <th>Number Of Dose</th>
                        <th>Take Date</th>
                        <th>More</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service as $i=>$services)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="text-capitalize">{{ $services->childFirstName }} {{ $services->childLastName }}</td>
                            <td style="width: 30%">{{ $services->vaccine_name }}</td>
                            <td>{{ $services->dose_number }}</td>
                            <td>{{ $services->takenDate }}</td>
                            <td>
                                <a href="{{ route('admin.service.service_details', $services->Invoice_id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
