@extends('admin.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Admin Dashboard</li>
    </ol>
    <div class="container">
        <div class="row">

            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="mr-5">
                            <h3>{{ $user }}</h3>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="">
                        <span class="float-left">Total Users</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-secondary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <div class="mr-5">
                            <h3>{{ $consultant }}</h3>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.consultant.get_all_consultant') }}">
                        <span class="float-left">Total Consultant</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i></span></a>
                </div>
            </div>


            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-info o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <div class="mr-5">
                            <h3>{{ $vaccine }}</h3>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.vaccine.get_all_vaccine') }}">
                        <span class="float-left">Total Vaccine</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i></span></a>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-hospital-alt"></i>
                        </div>
                        <div class="mr-5">
                            <h3>{{ $hospital }}</h3>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.hospital.hospital_list') }}">
                        <span class="float-left">Total Hospitals</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection