<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">User panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell" style="color: white"></i>
                <sup class="text-white">
                    @php( $reg_vaccine = DB::table('reg_vaccines')
                        ->join('users','users.id','=','reg_vaccines.user_id')
                        ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
                        ->join('child_registrations','child_registrations.id','=','reg_vaccines.child_id')
                        ->select('users.id as userID','child_registrations.id as childID','child_registrations.first_name as childFirst_name', 'child_registrations.last_name as childLastName','child_registrations.birth_date as birthDay', 'vaccines.id as vaccineID','vaccines.vaccine_name as vaccineName','vaccines.number_of_dose as vaccineDose','vaccines.break as Break','reg_vaccines.id as regID','reg_vaccines.dose_taken as doseTake', 'reg_vaccines.taken_date as takeDate','reg_vaccines.status')
                        ->where('reg_vaccines.user_id','=', Auth::user()->id)
                        ->get()

                )

                    @foreach($reg_vaccine as $reg)
                    <?php
                        $birth_date = (date('Y-m-d', strtotime($reg->birthDay)));
                        $break = $reg->Break;
                        $date = new DateTime($birth_date);
                        $date->modify('+'.$break.' month');
                        $date_dose = $date->format('M-d-Y');


                        $take = new DateTime($date_dose);
                        $take->modify('- 2 days');
                        $take_dose = $take->format('M-d-Y');

                        $today = date('M-d-Y');

                        if ($take_dose == $today){
                            echo '1';
                        }else{
                            echo '';
                        }
                    ?>

                    @endforeach
                </sup>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                @foreach($reg_vaccine as $reg)
                    <?php
                    $birth_date = (date('Y-m-d', strtotime($reg->birthDay)));
                    $break = $reg->Break;

                    $date = new DateTime($birth_date);
                    $date->modify('+'.$break.' month');
                    $date_dose = $date->format('M-d-Y');


                    $take = new DateTime($date_dose);
                    $take->modify('- 2 days');
                    $take_dose = $take->format('M-d-Y');

                    $today = date('M-d-Y');
                    ?>

                    @if($take_dose == $today)
                        <ul>
                            <li><a href="{{ route('user.vaccine_details.view_vaccine_taken_details', $reg->childID) }}" class="ml-3">{{ $reg->vaccineName }}</a></li>
                        </ul>
                    @endif
                @endforeach
            </div>
        </li>
    </ul>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw text-white"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>