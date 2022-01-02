<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vaccination Camp</title>
    <link rel="stylesheet" href="{{ asset('assets/style/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/main.css') }}">
    <link rel="icon" href="{{ asset('images/logo.JPG') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><span class="text-success font-weight-bold" style="font-size: 30px">Vaccination <span class="text-white">Camp</span></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-5" style="font-size: 20px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vaccine's
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: black;">
                    <a class="nav-link" href="{{ route('pages.vaccine') }}">Vaccine's</a>
                    <a class="nav-link" href="{{ route('pages.corona_vaccine_page') }}">Covid 19</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.campaign') }}">Campaign</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.consultant') }}">Consultant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.hospital') }}">Hospital</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.get_contact_form') }}">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
                @if (Route::has('login'))
                    @auth
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: black;">
                        <a class="nav-link" href="{{ url('/user/index') }}">Profile</a>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    @endauth
                @endif
            </li>
        </ul>
    </div>
</nav>

<div class="corona_vaccine">
    <div class="banner_section_consultant">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center" style="font-size: 48px; font-weight: 600; margin-top: 50px; color: white">Corona Vaccine's</h1>
                    <p class="text-center" style="font-size: 20px; color: white">Home <i class="fa fa-arrow-right"></i>Registration Covid19 Vaccine</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="vaccine" style="background-color: #d4edda">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mb-5">
                <div class="col-md-10 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header bg-info">
                            <h3 class="text-center text-white">Registration Covid19 Vaccine</h3>
                        </div>
                        <div class="card-body">
                            @if($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if(Auth::check() && Auth::user()->role_id == 2)
                            <form action="{{ route('pages.corona_vaccine_reg') }}" method="post">
                                @csrf
                                <div class="form-group col-md-6 float-left">
                                    <label>Full Name: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input hidden type="text" name="userID" value="{{ Auth::user()->id }}" class="form-control">
                                    <input hidden type="text" name="vacID" value="{{ $corona->id }}" class="form-control">

                                    <input type="text" name="fullName" placeholder="Enter Name" value="{{ Auth::user()->name }}" class="form-control">
                                    @if($errors->has('fullName'))
                                        <span class="text-danger ">{{ $errors->first('fullName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Email: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="email" disabled placeholder="Enter Email" value="{{ Auth::user()->email }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Phone: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="phone" placeholder="Enter Phone" value="{{ Auth::user()->phone }}" class="form-control">
                                    @if($errors->has('phone'))
                                        <span class="text-danger ">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>NID Number: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="nid" placeholder="Enter NID Number" value="{{ old('nid') }}" class="form-control">
                                    @if($errors->has('nid'))
                                        <span class="text-danger ">{{ $errors->first('nid') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Birth Date: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="date" name="bod" value="{{ old('bod') }}" class="form-control">
                                    @if($errors->has('bod'))
                                        <span class="text-danger ">{{ $errors->first('bod') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Select Hospital: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <select name="hospital" class="form-control">
                                        <option>----Select One-------</option>
                                        @foreach($hospital as $hospitals)
                                             <option value="{{ $hospitals->hospital_name }}">{{ $hospitals->hospital_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('hospital'))
                                        <span class="text-danger ">{{ $errors->first('hospital') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 float-left">
                                    <label>Address: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <textarea name="address" placeholder="Enter Address" class="form-control">{{ old('address') }}</textarea>
                                    @if($errors->has('address'))
                                        <span class="text-danger ">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label></label>
                                    <input type="submit" name="btn" value="Submit" class="btn btn-primary btn-block">
                                </div>
                            </form>
                            @else
                                <div class="mt-5 mb-5">
                                    <h1 class="text-danger text-center">Please Login First</h1>
                                    <p class="text-center"><a href="{{ route('login') }}" class="">Click Here To Login</a></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="fotter bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p class="text-center text-white pt-1" style="font-size: 14px">This site is Made By @<b> <i> Abdullah Al Murshed</i></b></p>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>
</html>