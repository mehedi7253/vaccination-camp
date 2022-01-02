@extends('user.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h5>{{ $page_name }} <a class="float-right btn btn-primary" href="{{ route('user.Reg_child.get_reg_child_form') }}"><i class="fa fa-plus"></i> New Registration</a></h5>
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
                            <th>Name</th>
                            <th>Birth Date</th>
                            <th>Age</th>
                            <th>Action</th>
                            <th>Add Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_dtls as $i=>$children)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class="text-capitalize">{{ $children->first_name }} {{ $children->last_name }}</td>
                                <td>{{ date('d-M-Y',strtotime($children->birth_date))}}</td>
                                <td>
                                    <?php
                                         $birth_date = (date('Y-m-d', strtotime($children->birth_date)));

                                        $birthDate   = new DateTime($birth_date);
                                        $currentDate = new DateTime('today');

                                        $year = $birthDate->diff($currentDate)->y;
                                        $month = $birthDate->diff($currentDate)->m;
                                       $day = $birthDate->diff($currentDate)->d;

                                       echo $year.' '.'Years'.' '.$month.' '.'Months'.' '.$day.'Days'

                                   ?>
                                </td>
                                <td>
                                    <form action="{{ route('user.Reg_child.deleteChildData', $children->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');" value="Delete">
                                    </form>
                                </td>
                                <td>{{ date('Y-m-d', strtotime($children->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
