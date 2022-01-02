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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                @if (session()->has('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if (session()->has('old_pass_not_match'))
                    <p class="alert alert-danger">{{ session('old_pass_not_match') }}</p>
                @endif
                @if (session()->has('new_confirm_not_match'))
                    <p class="alert alert-danger">{{ session('new_confirm_not_match') }}</p>
                @endif
            <div class="table-responsive">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                {{--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('user.update_profile.store_pass') }}" method="post">--}}
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="current-password" placeholder="Enter Current Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new-password" placeholder="Enter New Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="new-password-confirm" placeholder="Enter Confirm Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="submit" name="change_pass" class="btn btn-success" value="Change Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
