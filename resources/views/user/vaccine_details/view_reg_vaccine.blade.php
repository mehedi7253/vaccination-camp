<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/25/2021
 * Time: 12:56 PM
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
            <h3>{{$page_name}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Child Name</th>
                        <th>View More</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reg_vaccine as $i=>$reg)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $reg->childFirst_name }} {{ $reg->childLastName }}</td>
                            <td>
                                <a href="{{ route('user.vaccine_details.view_vaccine_taken_details', $reg->childID ) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View More</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

