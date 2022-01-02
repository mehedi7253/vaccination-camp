
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
            <form action="{{ route('user.missing_vaccine.reg_missingVaccine') }}" method="post">
                @csrf
                <div class="form-group col-md-6 float-left">
                    <label>Child Name : </label>
                    <input type="text" hidden name="childID" value="{{ $child_id->id }}">
                    <input type="text" hidden name="userID" value="{{ Auth::user()->id }}">
                    <input type="text" hidden  name="dose_fee" value="500.00">
                    <input type="text" disabled class="form-control" value="{{ $child_id->first_name }} {{ $child_id->last_name }}">
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>Guardian Phone: </label>
                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>Select Missing Vaccine Name : <sup class="text-danger font-weight-bold">*</sup></label>
                    <select name="vacID" class="form-control">
                        <option>---------------Select One--------------</option>
                        @foreach($vaccine as $vaccines)
                            <option value="{{ $vaccines->vacID }}">{{ $vaccines->vaccine_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label> Missing Dose : <sup class="text-danger font-weight-bold">*</sup></label>
                   <input type="text" min="1" class="form-control" name="missing_dose" placeholder="Example: 1">
                    @if($errors->has('missing_dose'))
                        <span class="text-danger ">{{ $errors->first('missing_dose') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>Select Hospital : <sup class="text-danger font-weight-bold">*</sup></label>
                    <select name="hospital_name" class="form-control">
                        <option>---------------Select One--------------</option>
                        @foreach($hospital as $hospitals)
                            <option value="{{ $hospitals->hospital_name }}">{{ $hospitals->hospital_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 float-left">
                    <label>  Dose Fee : <sup class="text-danger font-weight-bold">*</sup></label>
                    <input type="text" disabled class="form-control" value="500">
                </div>
                <div class="form-group col-md-6 float-left">
                    <label> </label>
                    <input type="submit"  class="btn btn-success btn-block" name="btn" value="Submit">
                </div>
            </form>
        </div>
    </div>

@endsection

