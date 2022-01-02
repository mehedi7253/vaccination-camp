@extends('user.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h5>{{ $page_name }} <a class="float-right btn btn-primary" href="{{ route('user.Reg_child.view_all_children') }}"><i class="fa fa-eye"></i> View Children Details</a></h5>
        </div>
        <div class="card-body">
            <form action="{{ route('user.Reg_child.add_new_child') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>First Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}">
                    @if($errors->has('first_name'))
                        <span class="text-danger ">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Last Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                    @if($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Birth Date <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                    @if($errors->has('birth_date'))
                        <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Birth Certificate </label>
                    <input type="text" name="birth_certificate" class="form-control" placeholder="Enter Birth Certificate Number If Have" value="{{ old('birth_certificate') }}">
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="btn" class="btn btn-success col-5"  value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection