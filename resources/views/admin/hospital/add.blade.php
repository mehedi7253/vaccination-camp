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
            <h3>{{$page_name}} <a href="{{ route('admin.hospital.hospital_list') }}" class="btn btn-info float-right"><i class="fa fa-edit"></i> Manage Hospital Data</a></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.hospital.add_hospital') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Hospital Name : <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="hospital_name" placeholder="Enter Hospital Name" class="form-control" value="{{ old('hospital_name') }}">
                    @if($errors->has('hospital_name'))
                        <span class="text-danger ">{{ $errors->first('hospital_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Hospital Phone Number : <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="phone" placeholder="Enter Hospital Phone Number" class="form-control" value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <span class="text-danger ">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Hospital Address : <sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea name="address" placeholder="Enter Hospital Address" class="form-control">{{ old('address') }}</textarea>
                    @if($errors->has('address'))
                        <span class="text-danger ">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Map Link : <sup class="text-danger font-weight-bold">* </sup></label>
                    <div class="form-group input-group">
                        <input name="map_link" placeholder="Enter Hospital Address" class="col-10 form-control" value="{{ old('map_link') }}">
                        <a class="btn btn-success" href="https://www.embedmymap.com/" target="_blank">Generate Map Link</a>
                    </div>
                    @if($errors->has('map_link'))
                        <span class="text-danger ">{{ $errors->first('map_link') }}</span>
                    @endif
                    <br/>
                    <label class="text-danger">[ Note: Click On Generate Map Link and copy The Link Then Pas it On Map Link Filed ]</label>
                </div>
                <div class="form-group">
                    <label>About Hospital : <sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea name="description" id="application" class="form-control">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger ">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="btn" class="btn btn-success col-6" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
