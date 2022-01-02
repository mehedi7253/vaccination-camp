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

<section class="vaccine">
    <div class="container">
        <div class="row">
            <div class="card mt-5 mb-5">
                <div class="card-body">
                    <div class="col-md-6 col-sm-12 float-left">
                        <img src="{{ asset('Vaccine/images/'.$vaccine_details->vaccine_image) }}" style="height: 255px; width: 100%">
                    </div>
                    <div class="col-md-6 col-sm-12 float-left">
                        <div class="table-responsive">
                            <table class="table tab-pane table-hover">
                                <tr style="height: 50px; background-color: aliceblue;">
                                    <th style="border-top: 1px solid silver">Vaccine Name </th>
                                    <td style="border-top: 1px solid silver">
                                        <span class="float-right">{{ $vaccine_details->vaccine_name  }}</span>
                                    </td>
                                </tr>
                                <tr style="height: 50px; background-color: aliceblue;">
                                    <th style="border-top: 1px solid silver">Number Of Dose</th>
                                    <td style="border-top: 1px solid silver">
                                        <span class="float-right">{{ $vaccine_details->number_of_dose  }}</span>
                                    </td>
                                </tr>
                                <tr style="height: 50px; background-color: aliceblue;">
                                    <th style="border-top: 1px solid silver">Daises Name</th>
                                    <td style="border-top: 1px solid silver">
                                        <span class="float-right">{{ $vaccine_details->disease  }}</span>
                                    </td>
                                </tr>
                                <tr style="height: 50px; background-color: aliceblue;">
                                    <th style="border-top: 1px solid silver">Eligible Age</th>
                                    <td style="border-top: 1px solid silver">
                                        <span class="float-right">{{ $vaccine_details->age_limit  }} year's</span>
                                    </td>
                                </tr>
                                <tr style="height: 50px; background-color: aliceblue;">
                                    <th style="border-top: 1px solid silver">Taken Break Time</th>
                                    <td style="border-top: 1px solid silver">
                                        <span class="float-right">{{ $vaccine_details->break  }} Month's</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto mt-2">
                                <div class="card">
                                    <div class="card-header" style="background-color: #602D8D;">
                                        <h4 class="text-uppercase" style="color: white;"> VACCINE DETAILS</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto mt-2">
                                <p class="text-justify product_description"><?php echo $vaccine_details['description'];?></p>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto mt-2">
                                <div class="card">
                                    <div class="card-header" style="background-color: #602D8D;">
                                        <h4 class="text-uppercase" style="color: white;"> VACCINE Merit And Demerit</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto mt-2">

                                <div class="col-md-6 col-sm-12 float-left" style="border: 1px solid blue">
                                    @foreach($get_all as $merit)
                                        @if($merit->merit_demerit == 'merit')
                                            <h4 class="text-capitalize pt-3 text-center">Merit List</h4>
                                            <hr/>
                                            <p class="text-justify">
                                                <?php
                                                echo $merit->description;
                                                ?>
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-sm-12 float-left" style="border: 1px solid blue">
                                    @foreach($get_all as $merit)
                                        @if($merit->merit_demerit == 'demerit')
                                            <h4 class="text-capitalize pt-3 text-center">DeMerit List</h4>
                                            <hr/>
                                            <p class="text-justify">
                                                <?php
                                                echo $merit->description;
                                                ?>
                                            </p>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
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