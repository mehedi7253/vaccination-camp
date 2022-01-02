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
            <h3>{{$page_name}} <a href="{{ route('admin.merit_demerit.get_all_meritDemrit_data') }}" class="btn btn-info float-right"><i class="fa fa-edit"></i> Manage Merit & Demerit</a></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.merit_demerit.add_merit_demerit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Select Vaccine Name <sup class="text-danger font-weight-bold">*</sup></label>
                  <select name="vaccine_id" class="form-control">
                      <option>------------Select One Vaccine Name--------------</option>
                      @foreach($vaccin as $vaccines)
                          <option value="{{ $vaccines->id }}">{{ $vaccines->vaccine_name }}</option>
                      @endforeach
                  </select>
                    @if($errors->has('vaccine_id'))
                        <span class="text-danger ">{{ $errors->first('vaccine_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Select Merit or Demerit <sup class="text-danger font-weight-bold">*</sup></label>
                    <select name="merit_demerit" class="form-control">
                        <option>------------ Select One --------------</option>
                       <option value="merit">Merit</option>
                        <option value="demerit">DeMerit</option>
                    </select>
                    @if($errors->has('merit_demerit'))
                        <span class="text-danger ">{{ $errors->first('merit_demerit') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Write Description <sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea name="description" class="form-control" id="application"></textarea>
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
