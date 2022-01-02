<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/18/2021
 * Time: 2:39 PM
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
            <h3>{{$page_name}} <a href="{{ route('admin.merit_demerit.get_add_form') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add New Merit & Demerit</a></h3>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="table-responsive">
                <table id="bootstrap-data-table" class=" text-center table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Vaccine Name</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($get_data as $i=>$meritDemerit)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $meritDemerit->vaccine_name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.merit_demerit.show', $meritDemerit->vaccine_id) }}"><i class="fa fa-eye"></i> More</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

