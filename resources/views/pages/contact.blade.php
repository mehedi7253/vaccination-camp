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

<div class="consultant">
    <div class="banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center" style="font-size: 48px; font-weight: 600; margin-top: 150px; color: white"> Contact With Us</h1>
                    <p class="text-center" style="font-size: 20px; color: white">Home <i class="fa fa-arrow-right"></i>Contact With Us </p>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact_us" id="contact" style="background-color: #343A40;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="text-center text-white">
                    <h3 class="text-white">Drop Your Message</h3>
                    <p class="text-capitalize text-white">Send Us Your Important Message...We will Conatact With You as soon as Possible</p>
                </div>
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{ route('pages.sendMessage') }}" method="post">
                    @csrf
                    <div class="col-md-6 col-sm-12 float-left">
                        <div class="form-group">
                            <label for="fullName" class="text-white">Name*</label>
                            <input type="text" name="fullName" class="form-control" placeholder="Enter Your Name" id="name" value="{{ old('fullName') }}">
                            @if($errors->has('fullName'))
                                <span class="text-danger ">{{ $errors->first('fullName') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="emailAddress" class="text-white">Email*</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="emailAddress" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="text-danger ">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber" class="text-white">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number" id="phoneNumber" value="{{ old('phone') }}">
                            @if($errors->has('phone'))
                                <span class="text-danger ">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 float-left">
                        <div class="form-group">
                            <label class="text-white">Message*</label>
                            <textarea class="form-control" placeholder="Enter Your Message" name="message" style="height: 155px"></textarea>
                            @if($errors->has('message'))
                                <span class="text-danger ">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn"  class="btn btn-block" style="background-color: #1bbd36; color: #fff;" value="Send Message">
                        </div>
                    </div>
                </form>
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

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

</body>
</html>