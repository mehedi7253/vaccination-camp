<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/25/2021
 * Time: 12:56 PM
 */
?>

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
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Dose</th>
                        <th>Dose Taken</th>
                        <th>Next Dose</th>
                        <th>Update</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reg_vaccine as $i=>$reg)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $reg->vaccineName }}</td>
                            <td>{{ $reg->vaccineDose }}</td>
                            <td>
                                @if($reg->doseTake == $reg->vaccineDose)
                                    @for($i = 1; $i<=$reg->doseTake; $i++ )
                                        <label ><i class="fa fa-check-circle text-success"></i></label>
                                    @endfor
                                @else
                                    <?php $dose =  $reg->vaccineDose - $reg->doseTake;?>
                                    @for($i = 1; $i<=$reg->doseTake; $i++ )
                                        <label ><i class="fa fa-check-circle text-success"></i></label>
                                    @endfor
                                    @for($i = 1; $i<=$dose; $i++ )
                                        <label ><i class="fa fa-check-circle text-danger"></i></label>
                                    @endfor
                                @endif
                            </td>
                            <td>
                                @if($reg->doseTake == $reg->vaccineDose)
                                    <span class="text-success">All Dose Taken</span>
                                @else
                                    <?php
                                    if ($reg->takeDate == ''){
                                        $birth_date = (date('Y-m-d', strtotime($reg->birthDay)));
                                        $break = $reg->Break;
                                        $date = new DateTime($birth_date);
                                        $date->modify('+'.$break.' month');
                                        $date = $date->format('M-d-Y');
                                        echo $date;
                                    }else{
                                        $birth_date = (date('Y-m-d', strtotime($reg->takeDate)));
                                        $break = $reg->Break;
                                        $date = new DateTime($birth_date);
                                        $date->modify('+'.$break.' month');
                                        $date = $date->format('M-d-Y');
                                        echo $date;
                                    }
                                    ?>
                                @endif

                            </td>

                            <td>
                                @if($reg->doseTake == $reg->vaccineDose)
                                    <span class="text-success">All Dose Taken</span>
                                @else
                                    <form action="{{ route('admin.vaccine_take.update', $reg->regID) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group input-group">
                                            <select name="dose_taken" class="form-control">
                                                <option>--Select One--</option>
                                                @for($i=1; $i<=$reg->vaccineDose; $i++)
                                                    <option value="{{ $i }}"> {{ $i }} Dose</option>
                                                @endfor
                                            </select>
                                            <input type="submit" name="btn" class="btn btn-info" value="Update">
                                        </div>
                                    </form>
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

