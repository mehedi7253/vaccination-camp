<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 4/13/2021
 * Time: 4:54 PM
 */
?>
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
            <h3>{{$page_name}} </h3>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Name</th>
                        <th>NID</th>
                        <th>Phone</th>
                        <th>Dose Taken</th>
                        <th>Update Status </th>
                        <th>Next Dose</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($corona as $i=>$reg)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $reg->userName }}</td>
                            <td>{{ $reg->userNID }}</td>
                            <td>{{ $reg->userPhone }}</td>
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
                                <form action="{{ route('admin.corona_vaccine.update_corona_vaccine', $reg->serial) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group input-group">
                                        <select name="dosetaken" class="form-control">
                                            <option>--Select One--</option>
                                            @for($i=1; $i<=$reg->number_of_dose; $i++)
                                                <option value="{{ $i }}"> {{ $i }} Dose</option>
                                            @endfor
                                        </select>
                                        <input type="submit" name="btn" class="btn btn-info" value="Update">
                                    </div>
                                </form>
                            </td>

                            <td>
                                @if($reg->takenDate == '')
                                    <form action="{{ route('admin.corona_vaccine.update_date', $reg->serial) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group input-group">
                                            <input type="date" name="takenDate" class="form-control">
                                            <input type="submit" name="btn" class="btn btn-info" value="Update">
                                        </div>
                                    </form>
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

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
