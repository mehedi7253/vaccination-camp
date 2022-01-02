
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
            <h3>{{$page_name}}</h3>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Child Name</th>
                    <th>Vaccine</th>
                    <th>Missing Dose</th>
                    <th>Hospital</th>
                    <th>Take Date</th>
                    <th>More</th>
                </tr>
                </thead>
                <tbody>
                @foreach($application as $i=>$applications)
                    @if($applications->takenDate !=='')
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td class="text-capitalize">{{ $applications->childFirstName }} {{ $applications->childLastName }}</td>
                        <td>{{ $applications->vaccine_name }}</td>
                        <td>{{ $applications->missing_dose }}</td>
                        <td>{{ $applications->hospital_name }}</td>
                        <td>
                            @if($applications->takenDate == '')

                            @else
                                {{ $applications->takenDate }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.missing_vaccine.details', $applications->Invoice_id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

