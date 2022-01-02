<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/21/2021
 * Time: 7:57 PM
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
            <h3><span class="text-info">{{$profile->name}}</span> Profile<a href="{{ route('admin.consultant.get_all_consultant') }}" class="btn btn-info float-right"><i class="fa fa-backward"></i> Back</a></h3>
        </div>
        <div class="card-body">
            <div class="col-md-4 col-sm-12 float-left">
                <img src="{{ asset('consultant/images/'.$profile->image) }}" style="height: 300px; width: 100%">
            </div>
            <div class="col-md-8 col-sm-12 float-left">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <td><span class="float-right">{{ $profile->name }}</span></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><span class="float-right">{{ $profile->email }}</span></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><span class="float-right">{{ $profile->phone }}</span></td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td><span class="float-right">{{ $profile->designation }}</span></td>
                    </tr>
                    <tr>
                        <th>Current Work At </th>
                        <td><span class="float-right">{{ $profile->current_job }}</span></td>
                    </tr>
                    <tr>
                        <th>Booking Price</th>
                        <td><span class="float-right">{{ number_format($profile->price, '2') }} T.K</span></td>
                    </tr>
                    <tr>
                        <th>Join Date</th>
                        <td><span class="float-right">{{ date('d-M-Y', strtotime($profile->created_at) ) }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection

