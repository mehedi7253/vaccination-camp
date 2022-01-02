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

<div class="vaccine_banner">
    <div class="banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center" style="font-size: 48px; font-weight: 600; margin-top: 150px; color: white">Vaccine's</h1>
                    <p class="text-center" style="font-size: 20px; color: white">Home <i class="fa fa-arrow-right"></i> Vaccine</p>
                </div>
            </div>
        </div>
    </div>
</div>


    <section class="vaccine" style="background-color: #d4edda">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h3 class="text-center p-5">Vaccines</h3>
                    @foreach($vaccine as $vaccines)
                        <div class="col-md-4 col-sm-12 float-left mt-3">
                            <div class="card" style="border: 1px solid blue; height: 650px;">
                                <img src="{{ asset('Vaccine/images/'.$vaccines->vaccine_image) }}" style="height: 200px; width: 100%;">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table border-0 tab-pane">
                                            <tr style="height: 50px;">
                                                <th>Vaccine Name </th>
                                                <td>
                                                    <span class="float-right">
                                                         <?php
                                                            $desc = $vaccines->vaccine_name;
                                                            $strcut = substr($desc, 0, 20);
                                                            echo $strcut;
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr style="height: 50px;">
                                                <th>Number Of Dose</th>
                                                <td>
                                                    <span class="float-right">{{ $vaccines->number_of_dose  }}</span>
                                                </td>
                                            </tr>
                                            <tr style="height: 50px;">
                                                <th>Daises Name</th>
                                                <td>
                                                    <span class="float-right">
                                                         <?php
                                                            $vac = $vaccines->disease;
                                                            $vac_name = substr($vac, 0, 20);
                                                            echo $vac_name;
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr style="height: 50px;">
                                                <th>Eligible Age</th>
                                                <td>
                                                    <span class="float-right">{{ $vaccines->age_limit  }} year's</span>
                                                </td>
                                            </tr>
                                            <tr style="height: 50px;">
                                                <th>Break TIme</th>
                                                <td>
                                                    <span class="float-right">{{ $vaccines->break  }} Month's</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-info float-right" href="{{ route('pages.vaccine_dtls', $vaccines->id) }}">View More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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