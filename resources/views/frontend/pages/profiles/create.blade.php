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
                    <form action="{{ route('profilestore',$users->id) }}" id="frmSignUp" method="post"enctype="multipart/form-data">>
                                    @csrf
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        
                                            
                                            <div class="form-row">
                                                <div class="form-group ">
                                                    <label for="name">Full Name</label>
                                                    <input type="text"name="name" id="name" class="form-control form-control-lg"value="{{auth()->user()->name}}" >
                                                </div>
                                            </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="name">E-mail </label>
                                                <input type="email"name="email" value="{{auth()->user()->email}}" class="form-control form-control-lg"@disabled(true)>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="phone">phone</label>
                                                <input type="text"name="phone" id="phone" class="form-control form-control-lg"placeholder="Enter your userphone"value="{{auth()->user()->phone}}" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="image">image</label>
                                                
                                                <input type="file"name="image"id="image" value="" class="form-control form-control-lg">
                                            </div>
                                        </div>
                
                                        
                                    
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">address</label>
                                                <input type="text"name="address" value="{{auth()->user()->address}}" class="form-control form-control-lg"placeholder="Enter your useraddress" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">city</label>
                                                <input type="text"name="city" value="{{auth()->user()->city}}" class="form-control form-control-lg" placeholder="Enter your usercity" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">zipcode</label>
                                                <input type="text"name="zipcode" value="{{auth()->user()->zipcode}}" class="form-control form-control-lg" placeholder="Enter your userzipcode" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">country</label>
                                                <input type="text"name="country" value="{{auth()->user()->country}}" class="form-control form-control-lg" placeholder="Enter your usercountry" >
                                            </div>
                                        </div>
                                        
                                    

                                    </div>
                                </div>
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group col-lg-3">
                                <input type="submit" value="Save Change" class="btn btn-primary float-right" data-loading-text="Loading...">
                            </div>
                        </div>
                        </div>
                </form>
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