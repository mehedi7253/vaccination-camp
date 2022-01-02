
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
            <div class="col-md-8 mx-auto mt-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('images/bkas.png') }}" class="card-img-top" style="height: 100px; width: 100%">
                    </div>
                    <div class="card-body" style="background-color: #E3106D;">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="col-md-8 mx-auto">
                            <form action="{{ route('user.services.make_payment', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="text-white">Enter Bkash Number</label>
                                    <input type="text" name="account_number" class="form-control" placeholder="01711111111">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" > <span class="text-white ml-2">I Agree To The Term And Condition</span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn col-md-5 p-1" value="Submit" name="btn" style="background-color: #B6195E; color: white">
                                    <input type="submit" class="btn col-md-5 p-1" value="Cancel" name="cancel" style="background-color: #B6195E; color: white">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

