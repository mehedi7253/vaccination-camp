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
            @foreach($reg_vaccine as $details)
                <div class="card-body">
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Registration Number : </label>
                        <input value="0000000{{ $details->regID }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Registration Date : </label>
                        <input value="{{ date('Y-m-d', strtotime($details->regDate)) }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">Child Full Name : </label>
                        <input value="{{ $details->childFirst_name }} {{ $details->childLastName }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Date Of Birth : </label>
                        <input value="{{ date('M-d-Y', strtotime($details->birthDay)) }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Age : </label>
                        <input value="<?php
                        $birth_date = (date('Y-m-d', strtotime($details->birthDay)));

                        $birthDate   = new DateTime($birth_date);
                        $currentDate = new DateTime('today');

                        $year = $birthDate->diff($currentDate)->y;

                        $year = $birthDate->diff($currentDate)->y;
                        $month = $birthDate->diff($currentDate)->m;
                        $day = $birthDate->diff($currentDate)->d;

                        echo $year.' '.'Years'.' '.$month.' '.'Months'.' '.$day.'Days'

                        ?>" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Email : </label>
                        <input value="{{ $details->userEmail }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Phone : </label>
                        <input value="{{ $details->userPhone }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">Address : </label>
                        <input value="{{ $details->userAddress }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <h3 class="text-center">Vaccine Information</h3>
                    <div class="form-group input-group col-md-12 float-left">
                        <label class="p-2">Vaccine : </label>
                        <input value="{{ $details->vaccineName }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Number Of Dose : </label>
                        <input value="{{ $details->vaccineDose }}" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
                    </div>
                    <div class="form-group input-group col-md-6 float-left">
                        <label class="p-2">Break Time : </label>
                        <input value="{{ $details->Break }} Month" class="form-control" style="border-bottom: dotted; border-top: 0; border-right: 0; border-left: 0;">
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
                                    <td>{{ $details->vaccineDose }}</td>
                                    <td class="text-center">
                                        @if($details->doseTake == $details->vaccineDose)
                                            @for($i = 1; $i<=$details->doseTake; $i++ )
                                                <label ><i class="fa fa-check-circle text-success"></i></label>
                                            @endfor
                                        @else
                                            <?php $dose =  $details->vaccineDose - $details->doseTake;?>
                                            @for($i = 1; $i<=$details->doseTake; $i++ )
                                                <label ><i class="fa fa-check-circle text-success"></i></label>
                                            @endfor
                                            @for($i = 1; $i<=$dose; $i++ )
                                                <label ><i class="fa fa-check-circle text-danger"></i></label>
                                            @endfor
                                        @endif
                                    </td>
                                    <td>
                                        <?php
                                        if ($details->takeDate == ''){
                                           echo '<span class="text-danger">Not Taken yet</span>';
                                        }else{
                                            echo date('M-d-Y', strtotime($details->takeDate));
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($details->takeDate == ''){
                                            $birth_date = (date('Y-m-d', strtotime($details->birthDay)));
                                            $break = $details->Break;
                                            $date = new DateTime($birth_date);
                                            $date->modify('+'.$break.' month');
                                            $date = $date->format('M-d-Y');
                                            echo $date;
                                        }else{
                                            $birth_date = (date('Y-m-d', strtotime($details->takeDate)));
                                            $break = $details->Break;
                                            $date = new DateTime($birth_date);
                                            $date->modify('+'.$break.' month');
                                            $date = $date->format('M-d-Y');
                                            echo $date;
                                        }
                                        ?>
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
