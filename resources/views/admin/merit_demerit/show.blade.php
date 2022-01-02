
@extends('admin.layouts.mastar')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{$page_name}}</li>
    </ol>


    <div class="card">
        <div class="card-header">
            <h3>{{$page_name}} <a href="{{ route('admin.merit_demerit.get_all_meritDemrit_data') }}" class="btn btn-info float-right"><i class="fa fa-backward"></i> Back</a></h3>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Vaccine Name: {{ $vaccine->vaccine_name }}</li>
            </ol>

            <div class="col-md-6 col-sm-12 float-left" style="border: 1px solid blue">
               @foreach($get_all as $merit)
                   @if($merit->merit_demerit == 'merit')
                       <h4 class="text-capitalize pt-3 text-center">Merit List</h4>
                       <hr/>
                        <label class="float-right">
                            <form action="{{ route('admin.merit_demerit.delete_merit_demerit', $merit->meritID) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="fa fa-trash" onclick="return confirm('Are you sure to delete !!');" value="Delete">
                            </form>
                        </label>
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
                        <label class="float-right">
                            <form action="{{ route('admin.merit_demerit.delete_merit_demerit', $merit->meritID) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="fa fa-trash" onclick="return confirm('Are you sure to delete !!');" value="Delete">
                            </form>
                        </label>
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

@endsection
