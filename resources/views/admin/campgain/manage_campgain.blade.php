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
            <h3>{{$page_name}} <a href="{{ route('admin.campgain.get_add_form') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add New Campaign</a></h3>
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
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campaign as $i=>$campaigns)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $campaigns->title }}</td>
                            <td>{{ $campaigns->start_date }}</td>
                            <td>{{ $campaigns->end_date }}</td>
                            <td>{{ $campaigns->location }}</td>
                            <td>
                                <img src="{{ asset('campaign/images/'.$campaigns->image) }}" style="height: 50px; width: 50px;'">
                            </td>
                            <td>
                                <form action="{{ route('admin.campgain.delete_campain', $campaigns->id) }}" method="post">
                                    <a href="{{ route('admin.campgain.get_edit_page', $campaigns->id) }}" class="btn btn-primary">Edit</a> |
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

