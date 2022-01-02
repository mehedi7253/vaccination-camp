<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('user/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-edit" style="color: blue"></i>
            <span> Update Profile </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.update_profile.get_edit_page') }}"><i class="fas fa-user-edit" style="color: #007bff"></i> Update Profile</a>
            <a class="dropdown-item" href="{{ route('user.update_profile.get_updateProfilePic_from') }}"><i class="fa fa-user-circle text-info"></i> Change Profile Pic</a>
            <a class="dropdown-item" href="{{ route('user.update_profile.get_change_pass_form') }}"><i class="fa fa-lock text-danger"></i> Change Password</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-plus" style="color: blue"></i>
             <span> Reg New Child </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.Reg_child.get_reg_child_form') }}"><i class="fas fa-user-plus" style="color: #007bff"></i> Reg New Child</a>
            <a class="dropdown-item" href="{{ route('user.Reg_child.view_all_children') }}"><i class="fa fa-eye text-danger"></i> View Child Details</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: yellow"></i>
            <span> Eligible Vaccine </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.vaccine_details.get_reg_form') }}"><i class="fas fa-plus" style="color: #007bff"></i> Reg Vaccine</a>
            <a class="dropdown-item" href="{{ route('user.vaccine_details.view_vaccine_reg') }}"><i class="fa fa-eye text-danger"></i> View Reg Vaccine</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-excel" style="color: whitesmoke"></i>
            <span> Appointment  </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.appointment.view_appointment') }}"><i class="fas fa-eye" style="color: #007bff"></i> Appointment </a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: green"></i>
            <span> Covid19 Vaccine Reg.  </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.corona.view_corona_reg') }}"><i class="fas fa-eye" style="color: #007bff"></i> Registration Data </a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-invoice" style="color: blue"></i>
            <span> My Application.  </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.missing_vaccine.my_application') }}"><i class="fas fa-eye" style="color: #007bff"></i> Application </a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fab fa-servicestack" style="color: red"></i>
            <span> Home Service </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.services.get_request_form') }}"><i class="fas fa-plus" style="color: #007bff"></i> Send Request </a>
            <a class="dropdown-item" href="{{ route('user.services.view_my_service') }}"><i class="fas fa-eye" style="color: #007bff"></i> View Request </a>
        </div>
    </li>


</ul>