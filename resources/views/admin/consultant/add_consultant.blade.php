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
            <h3>{{$page_name}} <a href="{{ route('admin.consultant.get_all_consultant') }}" class="btn btn-info float-right"><i class="fa fa-edit"></i> Manage Consultant</a></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.consultant.add_consultant') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="text-danger ">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Email <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="text-danger ">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Phone <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <span class="text-danger ">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Designation <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter Doctor Designation" value="{{ old('designation') }}">
                    @if($errors->has('designation'))
                        <span class="text-danger ">{{ $errors->first('designation') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Current Job Institute Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="current_job" class="form-control" placeholder="Current Job Institute Name" value="{{ old('current_job') }}">
                    @if($errors->has('current_job'))
                        <span class="text-danger ">{{ $errors->first('current_job') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Image <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                        <span class="text-danger ">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Booking Price <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="price" class="form-control" placeholder="Booking Price">
                    @if($errors->has('price'))
                        <span class="text-danger ">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label></label>
                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Submit">
                </div>

            </form>
        </div>
    </div>

@endsection
