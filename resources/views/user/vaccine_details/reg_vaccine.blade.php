<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/22/2021
 * Time: 10:00 PM
 */
?>

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
            <div class="mt-3">
                <form action="{{ route('user.vaccine_details.search') }}" method="get" role="search">
                    <div class="form-group input-group">
                        <select name="search" class="col-4 form-control">
                            <option>-----------Select Your Child Name------------</option>
                            @foreach($children as $childrens)
                                <option value="{{ $childrens->first_name }}">{{ $childrens->first_name }} {{ $childrens->last_name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                    </div>
                </form>
            </div>



            <div class="details">
                @if(isset($data))
                    @foreach($data as $user)
                        <div class="form-group input-group col-5 float-left">
                            <button class="btn-secondary" >Child Name</button>
                            <input type="text" disabled value="{{$user->first_name}} {{$user->last_name}}" class="form-control">
                        </div>
                        <div class="form-group input-group col-5 float-left">
                            <button class="btn-secondary" >Child Age</button>

                            <input type="text" value="<?php
                            $birth_date = (date('Y-m-d', strtotime($user->birth_date)));

                            $birthDate   = new DateTime($birth_date);
                            $currentDate = new DateTime('today');

                            $year = $birthDate->diff($currentDate)->y;
                            $month = $birthDate->diff($currentDate)->m;
                            $day = $birthDate->diff($currentDate)->d;

                            echo $year.' '.'Years'.' '.$month.' '.'Months'.' '.$day.'Days'
                            ?>" disabled class="form-control">
                        </div>
                        <div class="col-md-2 float-left input-group">
                            <a class="btn btn-block btn-success" href="{{ route('user.vaccine_details.get_child_dtls', $user->id) }}" >Next<i class="fa fa-arrow-right"></i></a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection

