<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/24/2021
 * Time: 2:35 PM
 */
?>

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
            <h3>{{$page_name}} </h3>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <h4 class="text-primary p-2">Click Submit Button To See Eligible Vaccine For Your Child</h4>
            <div class="form-group input-group col-5 float-left">
                <button class="btn-secondary" >Child Name</button>
                <input type="text" disabled value="{{$child->first_name}} {{$child->last_name}}" class="form-control">
            </div>
            <div class="form-group input-group col-5 float-left">
                <button class="btn-secondary" >Child Age</button>

                <input type="text" value=" <?php
                $birth_date = (date('Y-m-d', strtotime($child->birth_date)));

                $birthDate   = new DateTime($birth_date);
                $currentDate = new DateTime('today');

                $year = $birthDate->diff($currentDate)->y;
                $month = $birthDate->diff($currentDate)->m;
                $day = $birthDate->diff($currentDate)->d;

                echo $year.' '.'Years'.' '.$month.' '.'Months'.' '.$day.'Days'
                ?>" disabled class="form-control">
            </div>
            <div class="col-md-2 float-left form-group">
                <form action="{{ route('user.vaccine_details.get_child_dtls', $child->id )}}" method="get" role="search">
                    <div class="form-group input-group">
                        <input type="" name="search" value="<?php
                        $birth_date = (date('Y-m-d', strtotime($child->birth_date)));

                        $birthDate   = new DateTime($birth_date);
                        $currentDate = new DateTime('today');

                        $year = $birthDate->diff($currentDate)->y;

                        echo $year;
                        ?>"  hidden >
                        <button type="submit" id="search" class="btn btn-success"><i class="fa fa-arrow-down"></i> Submit</button>
                    </div>
                </form>
            </div>

            <div class="dtls">
                @if(isset($data) == true)
                    @if($data->count())
                        <h3 class="text-info font-weight-bold">Vaccine List</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Check Now</th>
                                        <th>Vaccine Name</th>
                                        <th>Age Limit</th>
                                        <th>Number Of Dose</th>
                                        <th>Break</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form action="{{ route('user.vaccine_details.reg_vaccine') }}" method="post">
                                    @csrf
                                    @foreach($data as $i=>$vaccine)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <input type="checkbox" name="vaccine_id[]" value="{{ $vaccine->id }}">
                                            </td>
                                            <td>{{ $vaccine->vaccine_name }}</td>
                                            <td>{{ $vaccine->age_limit }}</td>
                                            <td>{{ $vaccine->number_of_dose }}</td>
                                            <td>{{ $vaccine->break }} Month</td>
                                        </tr>
                                    @endforeach
                                    <td class="border-0">
                                        <input type="text" hidden name="child_id" value="{{ $child->id }}">
                                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="submit" name="btn" class="btn btn-success" value="Submit">
                                    </td>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    @else
                    <p>not found</p>
                    @endif
                @endif

            </div>

        </div>
    </div>

@endsection

