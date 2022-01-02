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
            <h3>{{$page_name}} </h3>
        </div>
        <div class="card-body">
            {{--@if($message = Session::get('success'))--}}
                {{--<div class="alert alert-success">--}}
                    {{--<button type="button" class="close" data-dismiss="alert">x</button>--}}
                    {{--<strong>{{ $message }}</strong>--}}
                {{--</div>--}}
            {{--@endif--}}
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th style="width: 30%">Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($message as $i=>$messages)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td></td>{{ $messages->fullName }}</td>
                            <td>{{ $messages->phone }}</td>
                            <td>{{ $messages->email }}</td>
                            <td>{{ $messages->message }}</td>
                            <td>
                                <form action="{{ route('admin.contact.deleteMessage', $messages->id) }}" method="post">
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
