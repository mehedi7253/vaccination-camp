
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
            <h3>{{$page_name}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.services.RequestService') }}" method="post">
                @csrf
                <div class="form-group col-md-6 float-left">
                    <label>Select Child : </label>
                    <input type="text" hidden name="userID" value="{{ Auth::user()->id }}">
                    <input type="text" hidden  name="fee" value="500.00">
                    <select name="childID" class="form-control">
                        <option>---------------Select One--------------</option>
                        @foreach($child as $childs)
                            <option value="{{ $childs->id }}">{{ $childs->first_name }} {{ $childs->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>Select Vaccine Name : <sup class="text-danger font-weight-bold">*</sup></label>
                    <select name="vacID" class="form-control">
                        <option>---------------Select One--------------</option>
                        @foreach($vaccine as $vaccines)
                            <option value="{{ $vaccines->vacID }}">{{ $vaccines->vaccine_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label> Dose Number : <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" min="1" class="form-control" name="dose_number" placeholder="Example: 1">
                    @if($errors->has('dose_number'))
                        <span class="text-danger ">{{ $errors->first('dose_number') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>  Current Dose Taken Date : <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="date" class="form-control" name="takenDate" value="{{ old('takenDate') }}">
                    @if($errors->has('takenDate'))
                        <span class="text-danger ">{{ $errors->first('takenDate') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>  Service Fee : <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" disabled class="form-control" value="500">
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>Guardian Phone: </label>
                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                </div>
                <div class="form-group col-md-12 float-left">
                    <label>Current Address : <sup class="text-danger font-weight-bold">*</sup></label>
                    <textarea class="form-control" name="address">{{ Auth::user()->address }}</textarea>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label> </label>
                    <input type="submit"  class="btn btn-success btn-block" name="btn" value="Submit">
                </div>
            </form>
        </div>
    </div>

@endsection

