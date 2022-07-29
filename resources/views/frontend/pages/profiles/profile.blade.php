@extends('frontend.layouts.template')
@section('title','picabo')

@section('body-content')
  <div role="main"class="main shop py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="featured-boxes">
                    <div class="row">
                        <div class="col">
                            <div class="featured-box featured-box-primary text-left mt-2">
                                <div class="box-content">
                                    <!---profile page content area start----->
                                    <div class="row">
                                        <div class="col-lg-3">
                                            @if (!empty(Auth::user()->image))
                                            <img src="{{asset('public/backend/img/users/'.Auth::user()->image)}}" alt="profile"class="img-fluid">
                                            @else
                                            <img src="{{asset('public/frontend/img/profile.png')}}" alt="profile"class="img-fluid">
                                            @endif
                                            
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-hover table-striped table-bordered">
                                             
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row">1</th>
                                                            <td>Name</td>
                                                            <td>{{Auth::user()->name}}</td>
                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row">2</th>
                                                            <td>Email</td>
                                                            <td>{{Auth::user()->email}}</td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row">3</th>
                                                            <td>Phome</td>
                                                            <td>@if (!empty(Auth::user()->phone))
                                                                {{Auth::user()->phone}}
                                                                @else
                                                                    -N/A-
                                                                @endif</td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row">4</th>
                                                            <td>Shipping Address</td>
                                                            <td>@if (!empty(Auth::user()->address))
                                                                {{Auth::user()->address}}
                                                                @else
                                                                    -N/A-
                                                                @endif</td>
                                                          </tr>
                                                          
                                                        </tbody>
                                                      </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-hover table-striped table-bordered">
                                             
                                                        <tbody>
                                            
                                                          <tr>
                                                            <th scope="row">5</th>
                                                            <td>City</td>
                                                            <td>@if (!empty(Auth::user()->city))
                                                                {{Auth::user()->city}}
                                                                @else
                                                                    -N/A-
                                                                @endif</td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row">6</th>
                                                            <td>Country</td>
                                                            <td>@if (!empty(Auth::user()->country))
                                                                {{Auth::user()->country}}
                                                                @else
                                                                    -N/A-
                                                                @endif</td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row">7</th>
                                                            <td>Zip Code</td>
                                                            <td>@if (!empty(Auth::user()->zipcode))
                                                                {{Auth::user()->zipcode}}
                                                                @else
                                                                    -N/A-
                                                                @endif</td>
                                                          </tr>
                                                       
                                                        </tbody>
                                                      </table>

                                                </div>
                                            </div>
                                   <div class="row">
                                    <div class="col-lg-12">
                                        <a href="{{route('profileupdate',Auth::user()->id)}}"class="btn btn-sm btn-primary">Update Profile</a>
                                    </div>
                                   </div>
                                        </div>
                                    </div>

                                    <!---profile page content area end----->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


@endsection