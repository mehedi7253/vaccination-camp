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
            <h5>{{ $page_name }} </h5>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="table-responsive">
                <form action="{{ route('user.update_profile.update_data', $get_edit_data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label> Name</label>
                        <input type="text" name="name" value="{{ $get_edit_data->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" disabled title="Can't Update Your Email" value="{{ $get_edit_data->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        @if($get_edit_data->gender == 'Male')
                            <input type="radio" checked name="gender" value="Male">Male
                            <input type="radio"  name="gender" value="Fe-Male">Fe-Male
                        @elseif($get_edit_data->gender == 'Fe-Male')
                            <input type="radio"  name="gender" value="Male">Male
                            <input type="radio" checked name="gender" value="Fe-Male">Fe-Male
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" value="{{ $get_edit_data->phone }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address">{{ $get_edit_data->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="submit" name="btn" value="Update Now" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
