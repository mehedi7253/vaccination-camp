@extends('user.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>
    <div class="card mb-5">
        <div class="card-header">
            <h5>{{ $page_name }} </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Name</th>
                        <th>NID</th>
                        <th>Phone</th>
                        <th>Vaccine Dose</th>
                        <th>Dose Taken</th>
                        <th>Next Dose</th>
                        <th>More</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($corona as $i=>$reg)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $reg->userName }}</td>
                            <td>{{ $reg->userNID }}</td>
                            <td>{{ $reg->userPhone }}</td>
                            <td>{{ $reg->number_of_dose }}</td>
                            <td>
                                @if($reg->dosetaken == $reg->number_of_dose)
                                    @for($i = 1; $i<=$reg->dosetaken; $i++ )
                                        <label ><i class="fa fa-check-circle text-success"></i></label>
                                    @endfor
                                @else
                                    <?php $dose =  $reg->number_of_dose - $reg->dosetaken;?>
                                    @for($i = 1; $i<=$reg->dosetaken; $i++ )
                                        <label ><i class="fa fa-check-circle text-success"></i></label>
                                    @endfor
                                    @for($i = 1; $i<=$dose; $i++ )
                                        <label ><i class="fa fa-check-circle text-danger"></i></label>
                                    @endfor
                                @endif
                            </td>
                            <td>
                                @if($reg->takenDate == '')
                                    <span class="text-danger">Not Fixed yet</span>
                                @else
                                    @if($reg->dosetaken == $reg->number_of_dose)
                                        <span class="text-success">All Dose Taken</span>
                                    @else
                                        <?php
                                            $take_date = (date('Y-m-d', strtotime($reg->takenDate)));
                                            $break = $reg->break;
                                            $date = new DateTime($take_date);
                                            $date->modify('+'.$break.' month');
                                            $date = $date->format('M-d-Y');
                                            echo $date;
                                        ?>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.corona.get_more_dtls', $reg->serial) }}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
