
@extends('admin.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>


    <div class="card mb-5">
        <div class="card-header">
            <h3>{{$page_name}} <a href="{{ route('admin.vaccine.get_all_vaccine') }}" class="btn btn-info float-right"><i class="fa fa-backward"></i> Back</a></h3>
        </div>
        <div class="card-body">
          <div class="col-md-4 col-sm-12 float-left">
              <img src="{{ asset('Vaccine/images/'.$vaccine_details->vaccine_image) }}" style="height: 255px; width: 100%">
          </div>
            <div class="col-md-8 col-sm-12 float-left">
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
                            <th style="border-top: 1px solid silver">Vaccine Taken TIme</th>
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
        </div>
    </div>

@endsection
