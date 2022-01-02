@extends('user.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="col-md-10 mx-auto">
        <div class="card mb-5" id="mainFrame">
            <div class="card-header bg-info text-white">
                <h5 class="text-center">{{ $page_name }} </h5>
            </div>
            @foreach($dtls as $details)
                <div class="card-body">
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Registration Number : </label>
                        <input value="0000000{{ $details->id }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Registration Date : </label>
                        <input value="{{ date('Y-m-d', strtotime($details->created_at)) }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">Full Name : </label>
                        <input value="{{ $details->fullName }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Date Of Birth : </label>
                        <input value="{{ date('M-d-Y', strtotime($details->bod)) }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Age : </label>
                        <input value="<?php
                        $birth_date = (date('Y-m-d', strtotime($details->bod)));

                        $birthDate   = new DateTime($birth_date);
                        $currentDate = new DateTime('today');

                        $year = $birthDate->diff($currentDate)->y;

                        echo $year.' '.'Years'

                        ?>" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Email : </label>
                        <input value="{{ $details->email }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Phone : </label>
                        <input value="{{ $details->phone }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">NID Number : </label>
                        <input value="{{ $details->nid }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">Address : </label>
                        <input value="{{ $details->address }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <h3 class="text-center">Vaccine Information</h3>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">Vaccine : </label>
                        <input value="{{ $details->vaccine_name }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Number Of Dose : </label>
                        <input value="{{ $details->number_of_dose }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Taken Place : </label>
                        <input value="{{ $details->hospital }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-12 float-left">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th>Number of Dose</th>
                                        <th>Dose Taken</th>
                                        <th>Taken Date</th>
                                        <th>Next Dose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $details->number_of_dose }}</td>
                                        <td class="text-center">
                                            @if($details->dosetaken == $details->number_of_dose)
                                                @for($i = 1; $i<=$details->dosetaken; $i++ )
                                                    <label ><i class="fa fa-check-circle text-success"></i></label>
                                                @endfor
                                            @else
                                                <?php $dose =  $details->number_of_dose - $details->dosetaken;?>
                                                @for($i = 1; $i<=$details->dosetaken; $i++ )
                                                    <label ><i class="fa fa-check-circle text-success"></i></label>
                                                @endfor
                                                @for($i = 1; $i<=$dose; $i++ )
                                                    <label ><i class="fa fa-check-circle text-danger"></i></label>
                                                @endfor
                                            @endif
                                        </td>
                                        <td>
                                            @if($details->takenDate == '')
                                                <span class="text-danger">Not Fixed yet</span>
                                                @else
                                                {{ date('M-d-Y', strtotime($details->takenDate)) }}
                                            @endif
                                        </td>
                                        <td>

                                            @if($details->takenDate == '')
                                                <span class="text-danger">Not Fixed yet</span>
                                            @else
                                                @if($details->dosetaken == $details->number_of_dose)
                                                    <span class="text-success">All Dose Taken</span>
                                                @else
                                                    <?php
                                                        $take_date = (date('Y-m-d', strtotime($details->takenDate)));
                                                        $break = $details->break;
                                                        $date = new DateTime($take_date);
                                                        $date->modify('+'.$break.' month');
                                                        $date = $date->format('M-d-Y');
                                                        echo $date;
                                                    ?>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-md-right">
                        <button class="btn btn-primary btn-icon icon-left" type="pss" id="prntPSS"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
