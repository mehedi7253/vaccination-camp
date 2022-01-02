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
                <form action="{{ route('user.update_profile.updateProfilePic', $get_edit_pic_data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <img src="{{ asset('user/images/'.$get_edit_pic_data->user_image) }}" class="img-fluid" style="height: 200px; width: 200px"><br/><br/>
                    <div class="form-group">
                        <label>Chose Picture</label>
                        <input type="file" name="user_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label></label>
                        <input type="submit" name="btn" value="Update Profile Picture" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
