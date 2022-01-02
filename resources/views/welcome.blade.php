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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
                        <a class="nav-link" href="user/index">Profile</a>
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

<div class="banner"></div>
<section style="background-color: honeydew">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="text-center">vaccination</h1>
                <p class="text-justify" style="line-height: 33px; font-family: sans-serif; font-size: 18px">
                    Now-a-days vaccination is very important for child to prevent many diseases such as developmental disability, hearing loss, pertussis, and polio, mumps, rubella, Hepatitis B, tetanus, diphtheria, chickenpox and pneumococcal infection. So, vaccine is very important for a growth of child Immunization can save your child life Vaccination is very safe and effective Immunization protect others you care about Immunization can save your family, time and money An immunization protects future generations. Immunization is a fact or process of becoming immune as against a disease. In Bangladesh, Vaccine is important for children growth but parents are not aware about this situation and they neglect it because of two reasons: Lack of Knowledge Lack of Time So we want to working on this project to solve this reasons by automated system, so that people can gather knowledge about this factor and also can make time from their busy schedule by the time period of vaccination for his/her children. The system can able to tell us every aspect of vaccination process, it can guide and it can able to create an appointment with doctors if needed. So this system is very important for our next healthy generation.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="vaccine_dtls" style="background-color: #d4edda;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mb-3">
                <h3 class="text-center mt-3 text-dark">Vaccines</h3>
                @foreach($vaccine as $vaccines)
                    <div class="col-md-4 col-sm-12 float-left mt-3">
                        <div class="card" style="height: 500px;">
                            <img src="{{ asset('Vaccine/images/'.$vaccines->vaccine_image) }}" style="height: 250px; width: 100%" class="card-img-top">

                            <div class="card-body">
                                <h4 class="text-dark">{{ $vaccines->vaccine_name }}</h4>
                                <p class="text-justify">
                                    <?php
                                    $desc = $vaccines->description;
                                    $strcut = substr($desc, 0, 200);
                                    $desc = substr($strcut, 0, strrpos($strcut, ' ')) . '....';
                                    echo $desc;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 col-sm-12 text-center p-5">
                <a class="text-center btn btn-info" href="{{ url('pages/vaccine') }}">View All Vaccine's</a>
            </div>
        </div>
    </div>
</section>

<section class="campgain" style="background-color: whitesmoke;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3 class="text-center mt-3 text-dark">Campaign</h3>
                @foreach($campin as $i=>$campins)
                    <div class="col-md-4 col-sm-12 float-left mt-3">
                        <div class="card" style="height: 600px">
                            <div class="card-header">
                                <img src="{{ asset('campaign/images/'.$campins->image) }}" class="card-img-top" style="height: 250px; width: 100%">
                            </div>
                            <div class="card-body">
                                <h4 class="text-dark text-center">{{ $campins->title }}</h4>
                                <label class="text-primary">Location: <i class="fa fa-location-arrow"></i> {{ $campins->location }}</label><br/>
                                <label class="font-weight-bold text-success">Start Date: {{  $campins->start_date}}</label><br/>
                                <label class="font-weight-bold text-danger">End Date: {{  $campins->end_date}}</label><br/>
                                <p class="text-justify">
                                    <?php
                                    $desc = $campins->description;
                                    $strcut = substr($desc, 0, 200);
                                    $desc = substr($strcut, 0, strrpos($strcut, ' ')) . '....';
                                    echo $desc;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 col-sm-12 text-center p-5">
                <a class="text-center btn btn-info" href="{{route('pages.campaign')}}">View All Campaign</a>
            </div>
        </div>
    </div>
</section>

<section class="campgain" style="background-color: #ced4da;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3 class="text-center mt-3 text-dark">Consultant</h3>
                @foreach($consultant as $i=>$consultants)
                    <div class="col-md-4 col-sm-12 float-left mt-3">
                        <div class="card">
                            <img src="{{ asset('consultant/images/'.$consultants->image) }}" style="height: 250px; width: 100%" class="card-img-top">
                            <div class="card-body">
                                <h4 class="text-dark text-center">{{ $consultants->name }}</h4>
                                <label class="text-primary">Email: {{ $consultants->email }}</label><br/>
                                <label class="font-weight-bold">Phone: {{  $consultants->phone}}</label><br/>
                                <label class="font-weight-bold">Designation: {{  $consultants->designation}}</label><br/>
                                <label class="font-weight-bold">Current Job: {{  $consultants->current_job}}</label><br/>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 col-sm-12 text-center p-5">
                <a class="text-center btn btn-info" href="{{ route('pages.consultant') }}">View All Consultant</a>
            </div>
        </div>
    </div>
</section>

<section class="fotter bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p class="text-center text-white pt-1" style="font-size: 14px">This site is Made By @<b> <i> Saem Abdullah</i></b></p>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>
</html>