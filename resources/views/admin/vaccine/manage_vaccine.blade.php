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
                <h3>{{$page_name}} <a href="{{ route('admin.vaccine.get_add_vaccine_page') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add New Vaccine</a></h3>
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
                            <th style="width: 20%;">Vaccine Name</th>
                            <th>Dose</th>
                            <th style="width: 20%;">Disease Name</th>
                            <th>Age Limit</th>
                            <th>Action</th>
                            <th>More</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($vaccine as $i=>$vaccines)
                             <tr>
                                 <td>{{ ++$i }}</td>
                                 <td>{{ $vaccines->vaccine_name }}</td>
                                 <td>{{ $vaccines->number_of_dose }}</td>
                                 <td>{{ $vaccines->disease }}</td>
                                 <td>{{ $vaccines->age_limit }}</td>
                                 <td>
                                     <form action="{{ route('admin.vaccine.delete_vaccine', $vaccines->id) }}" method="post">
                                         <a href="{{ route('admin.vaccine.get_edit_page', $vaccines->id) }}" class="btn btn-primary">Edit</a> |
                                         @csrf
                                         @method('DELETE')
                                         <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');" value="Delete">
                                     </form>
                                 </td>
                                 <td>
                                     <a href="{{ route('admin.vaccine.show', $vaccines->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                 </td>
                             </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
@endsection
