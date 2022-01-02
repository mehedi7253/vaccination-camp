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
            <h3>{{$page_name}} <a href="{{ route('admin.campgain.get_all_campaign') }}" class="btn btn-info float-right"><i class="fa fa-backward"></i> Back</a></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.campgain.update_data', $edit_data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="title" placeholder="Enter Title" class="form-control" value="{{ $edit_data->title }}">
                    @if($errors->has('title'))
                        <span class="text-danger ">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Start Date <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="date" name="start_date" placeholder="Enter Start Date" class="form-control" value="{{ $edit_data->start_date }}">
                    @if($errors->has('start_date'))
                        <span class="text-danger ">{{ $errors->first('start_date') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>End Date <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="date" name="end_date" placeholder="Enter End Date" class="form-control" value="{{ $edit_data->end_date }}">
                    @if($errors->has('end_date'))
                        <span class="text-danger ">{{ $errors->first('end_date') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Enter Location Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="location" placeholder="Enter End Date" class="form-control" value="{{ $edit_data->location }}">
                    @if($errors->has('location'))
                        <span class="text-danger ">{{ $errors->first('location') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description<sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea class="form-control" name="description" id="application">{{ $edit_data->description }}</textarea>
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
