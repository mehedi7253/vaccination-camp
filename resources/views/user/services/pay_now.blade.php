
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
                        <p class="mt-5 text-center text-white">Bkash Check Out</p>
                        <div class="col-md-8 mx-auto">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="text-white">Amount</label>
                                    <input type="text" disabled name="payment" class="form-control" value="500.00">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" required> <span class="text-white ml-2">I Agree To The Term And Condition</span>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('user.services.next_pay', $item->id) }}" class="btn col-md-5 p-1" name="btn" style="background-color: #B6195E; color: white">Submit</a>
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

