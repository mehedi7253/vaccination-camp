<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: #007bff"></i>
            <span>Vaccine Taken Status</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.vaccine_take.view') }}"><i class="fa fa-edit text-danger"></i> Update Status</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: green"></i>
            <span>Covid19 vaccine Reg </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.corona_vaccine.corona_reg_details') }}"><i class="fa fa-plus text-info" style="color: #007bff"></i> Update Details</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-nurse" style="color: #bd2130"></i>
            <span>Consultant Request </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.application.get_appointment_data') }}"><i class="fa fa-check-circle text-danger" style="color: #007bff"></i> Pending Request</a>
            <a  class="dropdown-item" href="{{ route('admin.application.completeAppointment') }}"><i class="fa fa-check-circle text-success" style="color: #007bff"></i> Complete Request</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-calendar-times" style="color: #2e5ed7"></i>
            <span>Missing Request </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.missing_vaccine.missingVaccine_data') }}"><i class="fa fa-check-circle text-danger" style="color: #007bff"></i> Pending Request</a>
            <a  class="dropdown-item" href="{{ route('admin.missing_vaccine.complete_data') }}"><i class="fa fa-check-circle text-success" style="color: #007bff"></i> Complete Request</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fab fa-servicestack" style="color: #1c7430"></i>
            <span>Home Service  </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.service.view_service_list') }}"><i class="fa fa-eye text-danger" style="color: #007bff"></i> View All Request</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: #bd2130"></i>
             <span>Manage Vaccine</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('admin.vaccine.get_add_vaccine_page') }}"><i class="fas fa-user-plus" style="color: #007bff"></i> Add Vaccine</a>
            <a class="dropdown-item" href="{{ route('admin.vaccine.get_all_vaccine') }}"><i class="fa fa-edit text-danger"></i> Manage Vaccine</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-calendar-alt" style="color: #2e5ed7"></i>
            <span>Manage Campaign</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('admin.campgain.get_add_form') }}"><i class="fas fa-user-plus" style="color: #007bff"></i> Add Campaign</a>
            <a class="dropdown-item" href="{{ route('admin.campgain.get_all_campaign') }}"><i class="fa fa-edit text-danger"></i> Manage Campaign</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-hospital-alt" style="color: green"></i>
            <span>Manage Hospital</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.hospital.get_add_form') }}"><i class="fa fa-plus text-info" style="color: #007bff"></i> Add Hospital</a>
            <a  class="dropdown-item" href="{{ route('admin.hospital.hospital_list') }}"><i class="fa fa-edit text-danger" style="color: #007bff"></i> Manage Hospital</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: yellow"></i>
            <span> Merit and Demerit</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a style="font-size: 15px" class="dropdown-item" href="{{ route('admin.merit_demerit.get_add_form') }}"><i class="fas fa-plus" style="color: #007bff"></i> Add Merit & Demerit</a>
            <a style="font-size: 13px" class="dropdown-item" href="{{ route('admin.merit_demerit.get_all_meritDemrit_data') }}"><i class="fa fa-edit text-danger"></i> Manage Merit & Demerit</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-nurse" style="color: blue"></i>
            <span> Manage Consultant</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.consultant.get_add_form') }}"><i class="fas fa-user-plus" style="color: #007bff"></i> Add Consultant</a>
            <a  class="dropdown-item" href="{{ route('admin.consultant.get_all_consultant') }}"><i class="fa fa-edit text-danger"></i> Manage Consultant</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-syringe" style="color: green"></i>
            <span> Covid19 Vaccine</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.corona.get_add_form') }}"><i class="fa fa-plus text-info" style="color: #007bff"></i> Add Vaccine</a>
            <a  class="dropdown-item" href="{{ route('admin.corona.get_all') }}"><i class="fa fa-edit text-danger"></i> Manage Vaccine</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-mail-bulk" style="color: #b3e4ec"></i>
            <span>Public Message</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a  class="dropdown-item" href="{{ route('admin.contact.message') }}"><i class="fa fa-eye text-info" style="color: #007bff"></i> All Message</a>
        </div>
    </li>
</ul>