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

<div class="consultant_booking">
    <div class="banner_section_consultant">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center" style="font-size: 48px; font-weight: 600; margin-top: 50px; color: white"> Consultant Appointment</h1>
                    <p class="text-center" style="font-size: 20px; color: white">Home <i class="fa fa-arrow-right"></i> Make payment</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="vaccine">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mt-5 mb-5">
                    <div class="card-header">
                        <img src="{{ asset('images/bkas.png') }}" class="card-img-top" style="height: 100px; width: 100%">
                    </div>
                    <div class="card-body" style="background-color: #E3106D;">
                        <div class="col-md-8 mx-auto">
                            <form action="{{ route('pages.final_payment', $booking->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="text-white">Enter Bkas Number</label>
                                    @foreach($doctor as $doctors)
                                        <input type="text" name="amount"  hidden class="form-control" value="{{ $doctors->Payment }}">
                                    @endforeach
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