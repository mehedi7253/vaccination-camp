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
            <h3>{{$page_name}} <a href="{{ route('admin.corona.get_add_form') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add New Covid19 Vaccine</a></h3>
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
                        <th>Disease Name</th>
                        <th>Vaccine Name</th>
                        <th>Number of Dose</th>
                        <th>Break</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($corona as $i=>$vaccines)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td style="">{{ $vaccines->dises_name }}</td>
                            <td>{{ $vaccines->vaccine_name }}</td>
                            <td>{{ $vaccines->number_of_dose }}</td>
                            <td>{{ $vaccines->break }} Month</td>
                            <td>
                                <img src="{{ asset('corona/images/'. $vaccines->image) }}" style="height: 50px; width: 50px;" class="img-thumbnail">
                            </td>
                            <td>
                                <form action="{{ route('admin.corona.delete_corona_vaccine', $vaccines->id) }}" method="post">
                                    <a href="{{ route('admin.corona.get_edit_page', $vaccines->id) }}" class="btn btn-primary">Edit</a> |
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
