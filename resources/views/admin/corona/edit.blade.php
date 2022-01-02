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


    <div class="card mt-5">
        <div class="card-header">
            <h3>{{$page_name}} <a href="{{ route('admin.corona.get_all') }}" class="btn btn-info float-right"><i class="fa fa-edit"></i> Manage Vaccine</a></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.corona.update_data', $edit_data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Vaccine Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="vaccine_name"  placeholder="Enter Vaccine Name" class="form-control" value="{{ $edit_data->vaccine_name }}">
                </div>
                <div class="form-group">
                    <label>Number Of Vaccine Dose <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="number" min="1" name="number_of_dose" placeholder="Enter Number Of Dose" class="form-control" value="{{ $edit_data->number_of_dose }}">
                    @if($errors->has('number_of_dose'))
                        <span class="text-danger ">{{ $errors->first('number_of_dose') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label> Disease Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text"  name="dises_name" placeholder="Enter Disease Name" class="form-control" value="{{$edit_data->dises_name }}">
                    @if($errors->has('dises_name'))
                        <span class="text-danger ">{{ $errors->first('dises_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label> Vaccine Taken Time (In Month) <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text"  name="break" placeholder="Enter Vaccine Taken Time (In Month)" class="form-control" value="{{ $edit_data->break }}">
                    @if($errors->has('break'))
                        <span class="text-danger ">{{ $errors->first('break') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label> Vaccine Description <sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea  name="description" id="application" class="form-control">{{ $edit_data->description }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger ">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="btn" class="btn btn-success col-5" value="Submit">
                </div>

            </form>
        </div>
    </div>

@endsection
