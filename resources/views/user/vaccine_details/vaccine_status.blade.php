
@extends('user.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h3>{{$page_name}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Child Name</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Dose</th>
                        <th>Dose Taken</th>
                        <th>Next Dose</th>
                        <th>More</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reg_vaccine as $i=>$reg)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $reg->childFirst_name }} {{ $reg->childLastName }}</td>
                            <td style="width: 25%">{{ $reg->vaccineName }}</td>
                            <td>{{ $reg->vaccineDose }}</td>
                            <td>
                                @if($reg->doseTake == $reg->vaccineDose)
                                    @for($i = 1; $i<=$reg->doseTake; $i++ )
                                        <label ><i class="fa fa-check-circle text-success"></i></label>
                                    @endfor
                                    @else
                                    <?php $dose =  $reg->vaccineDose - $reg->doseTake;?>
                                    @for($i = 1; $i<=$reg->doseTake; $i++ )
                                        <label ><i class="fa fa-check-circle text-success"></i></label>
                                    @endfor
                                    @for($i = 1; $i<=$dose; $i++ )
                                        <label ><i class="fa fa-check-circle text-danger"></i></label>
                                    @endfor
                                @endif
                            </td>
                            <td>
                                @if($reg->doseTake == $reg->vaccineDose)
                                    <span class="text-success">All Dose Taken</span>
                                @elseif($reg->takeDate == '')
                                    <?php
                                        $birth_date = (date('Y-m-d', strtotime($reg->birthDay)));
                                        $break = $reg->Break;
                                        $date = new DateTime($birth_date);
                                        $date->modify('+'.$break.' month');
                                        $date_final_one = $date->format('M-d-Y');

                                        $today = date("M-d-Y");
                                        $today_time = strtotime($today);
                                        $expire_time = strtotime($date_final_one);
                                    ?>

                                    @if($expire_time < $today_time)
                                        <a class="btn btn-danger" href="{{ route('user.missing_vaccine.get_reg_form', $reg->childID) }}" title="Click Here to Registration Missing Vaccine">Date Over</a>
                                    @endif
                                    @if($expire_time < $today_time)

                                        @else
                                            <?php
                                            $birth_date = (date('Y-m-d', strtotime($reg->birthDay)));
                                            $break = $reg->Break;
                                            $date = new DateTime($birth_date);
                                            $date->modify('+'.$break.' month');
                                            $date = $date->format('M-d-Y');
                                            echo $date;
                                            ?>
                                        @endif

                                    @elseif($reg->takeDate !=='')
                                    <?php
                                        if ($reg->takeDate == ''){
                                            $birth_date = (date('Y-m-d', strtotime($reg->birthDay)));
                                            $break = $reg->Break;
                                            $date = new DateTime($birth_date);
                                            $date->modify('+'.$break.' month');
                                            $date = $date->format('M-d-Y');
                                            echo $date;
                                        }else{
                                            $birth_date = (date('Y-m-d', strtotime($reg->takeDate)));
                                            $break = $reg->Break;
                                            $date = new DateTime($birth_date);
                                            $date->modify('+'.$break.' month');
                                            $date = $date->format('M-d-Y');
                                            echo $date;
                                        }
                                    ?>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.vaccine_details.get_certificate', $reg->regID) }}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

