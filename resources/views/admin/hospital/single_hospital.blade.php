<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/13/2021
 * Time: 4:54 PM
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


    <div class="card mb-5">
        <div class="card-header">
            <h3>{{$page_name}} <a href="{{ route('admin.hospital.hospital_list') }}" class="btn btn-info float-right"><i class="fa fa-backward"></i> Back</a></h3>
        </div>
        <div class="card-body">
            <div class="col-md-6 col-sm-12 float-left">
                <?php
                     echo $hospital->map_link
                ?>
            </div>
            <div class="col-md-6 col-sm-12 float-left">
                <div class="form-group">
                    <label><span class="font-weight-bold">Hospital Name : </span> {{ $hospital->hospital_name }}</label><br/>
                    <label><span class="font-weight-bold">Hospital Phone : </span>{{ $hospital->phone }}</label><br/>
                    <label><span class="font-weight-bold">Hospital Address : </span>{{ $hospital->address }}</label><br/>
                </div>
                <div class="form-group">
                    <label><span class="font-weight-bold">Available Vaccine Dose: </span></label><br/>
                    <ul>
                        @foreach($data as $datas)
                           <li>{{$datas->vaccine_name}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label><span class="font-weight-bold">About Hospital : </span></label><br/>
                    <p class="text-justify"><?php echo $hospital->description ?></p>
                </div>
            </div>
        </div>
    </div>
@endsection
