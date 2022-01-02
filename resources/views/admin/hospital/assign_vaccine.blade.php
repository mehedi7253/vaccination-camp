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
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="{{ route('admin.hospital.add_vaccine') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Hospital Name: </label>
                    <input type="text" name="hospitalID" value="{{ $hospital_id->id }}" class="form-control" hidden>
                    <input type="text" value="{{ $hospital_id->hospital_name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <table>
                        @foreach($vaccine as $vaccines)
                            <tr>
                                <td><input type="checkbox" name="vaccineID[]" value="{{ $vaccines->id }}"> {{ $vaccines->vaccine_name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="form-group">
                    <label> </label>
                    <input type="submit" name="btn" value="Submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
