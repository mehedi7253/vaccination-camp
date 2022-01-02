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
            <h3>{{$page_name}}</h3>
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
                        <th>Patient Name</th>
                        <th>Patient Phone</th>
                        <th>Doctor Name</th>
                        <th>Doctor Phone</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appointment as $i=>$appointments)
                            @if($appointments->bookingStatus !== '3')
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $appointments->userName }}</td>
                                <td>{{ $appointments->userPhone }}</td>
                                <td>{{ $appointments->consultantName }}</td>
                                <td>{{ $appointments->consultantPhone }}</td>
                                <td>
                                    @if($appointments->bookingStatus == '1')
                                             <label class="text-danger">Pending</label>
                                        @elseif($appointments->bookingStatus == '2')
                                             <label class="text-primary">Received</label>
                                        @elseif($appointments->bookingStatus == '3')
                                            <label class="text-success">Complete</label>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.application.update_consultant_status', $appointments->bookingID) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group input-group">
                                            <select name="status" class="form-control">
                                                <option>--Select One--</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Received</option>
                                                <option value="3">Complete</option>
                                            </select>
                                            <input type="submit" name="btn" class="btn btn-info" value="Update">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
