
@extends('admin.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="card" >
        @foreach($application as $applications)
        <div class="card-header">
            <h3>Invoice Number: VC{{ $applications->invoice_number }} </h3>
        </div>
        <div class="card-body" id="mainFrame">
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong> User Information:</strong><br>
                        <span class="text-capitalize">{{ $applications->name }}</span><br>
                         {{ $applications->phone }}<br>
                        {{ $applications->address }}<br>
                    </address>
                </div>
                <div class="col-md-6 text-md-right">
                    <address>
                        <strong> <i class="fa fa-hospital text-info"></i>  Hospital Details:</strong><br>
                        <span class="text-capitalize">{{ $applications->hospital_name }}</span><br>
                    </address>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Payment Method: {{ $applications->pay_by }}</strong><br>
                        <strong>Account Number: </strong> {{ $applications->account_number }}<br>
                        <strong>Transaction ID: </strong> {{ $applications->transaction_number }} <br>
                    </address>
                </div>

            </div>


            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Vaccine Summary</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md table-bordered">
                            <tr>
                                <th data-width="40">#</th>
                                <th>Vaccine Name</th>
                                <th>Missing Dose</th>
                                <th>Price</th>
                                <th>Taken Date</th>
                                <th>Hospital</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $applications->vaccine_name }}</td>
                                <td>{{ $applications->missing_dose }}</td>
                                <td>{{ number_format($applications->dose_fee,'2') }}</td>
                                <td>
                                    @if($applications->takenDate == '')
                                        <label class="text-danger">Not Set Yet</label>
                                    @else
                                        {{ $applications->takenDate }}
                                    @endif
                                </td>
                                <td>{{ $applications->hospital_name }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
            @endforeach
            <div class="card-footer">
                <div class="text-md-right">
                    <button class="btn btn-primary btn-icon icon-left" type="pss" id="prntPSS"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
    </div>

@endsection

