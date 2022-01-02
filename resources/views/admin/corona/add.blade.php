
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
            <form action="{{ route('admin.corona.add_vaccine') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Disses Name: <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="dises_name" placeholder="Enter Disses Name" class="form-control" value="{{ old('dises_name') }}">
                    @if($errors->has('dises_name'))
                        <span class="text-danger ">{{ $errors->first('dises_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Vaccine Name:<sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="vaccine_name" placeholder="Enter Vaccine Name" class="form-control" value="{{ old('vaccine_name') }}">
                    @if($errors->has('vaccine_name'))
                        <span class="text-danger ">{{ $errors->first('vaccine_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Number Dose:<sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="number_of_dose" placeholder="Enter Vaccine Dose" class="form-control" value="{{ old('number_of_dose') }}">
                    @if($errors->has('number_of_dose'))
                        <span class="text-danger ">{{ $errors->first('number_of_dose') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Break Time:<sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" name="break" placeholder="Enter Vaccine Break Time" class="form-control" value="{{ old('break') }}">
                    @if($errors->has('break'))
                        <span class="text-danger ">{{ $errors->first('break') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image:<sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="file" name="image" placeholder="Enter Vaccine Break Time" class="form-control">
                    @if($errors->has('image'))
                        <span class="text-danger ">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label> Vaccine Description: <sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea  name="description" id="application" class="form-control"></textarea>
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
