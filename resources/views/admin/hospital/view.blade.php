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
            <h3>{{$page_name}} <a href="{{ route('admin.hospital.get_add_form') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add New Hospital</a></h3>
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
                        <th>Hospital Name</th>
                        <th>Phone </th>
                        <th>Address</th>
                        <th>Action</th>
                        <th>More</th>
                        <th>Add Vaccine</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($hospital as $i=>$hospitals)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $hospitals->hospital_name }}</td>
                                <td>{{ $hospitals->phone }}</td>
                                <td style="width: 20%">{{ $hospitals->address }}</td>
                                <td>
                                    <form action="{{ route('admin.hospital.delete_data', $hospitals->id) }}" method="post">
                                        <a href="{{ route('admin.hospital.get_update_data', $hospitals->id) }}" class="btn btn-primary">Edit</a> |
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');" value="Delete">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.hospital.get_hospital_data', $hospitals->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> More</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.hospital.get_vaccine_id', $hospitals->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
