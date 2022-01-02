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
            <h3>{{$page_name}} <a href="{{ route('admin.consultant.get_add_form') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add New Consultant</a></h3>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Profile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultant as $i=>$consultants)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $consultants->name }}</td>
                                <td>{{ $consultants->email }}</td>
                                <td>{{ $consultants->phone }}</td>
                                <td>{{ number_format($consultants->price,'2') }} T.K</td>
                                <td>
                                    <a href="{{ route('admin.consultant.profile', $consultants->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.consultant.delete', $consultants->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to Remove !!');" value="Delete">
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

