@extends('user.layouts.mastar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-5 mb-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-capitalize">Well Come <span class="text-info">{{ Auth::user()->name }}</span> </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-3 col-sm-12 float-left">
                            <img src="{{ asset('user/images/'.Auth::user()->user_image) }}" class="img-fluid" style="height: 200px; width: 200px"><br/><br/>
                        </div>
                        <div class="col-md-9 col-sm-12 float-left">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th> Name  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th> Email  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th> Phone  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th> Gender  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th> Address  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="float-right btn btn-info" href="{{ route('user.update_profile.get_edit_page') }}">Update Profile</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection