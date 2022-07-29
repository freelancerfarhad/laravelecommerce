@extends('backend.layouts.app')
@section('title',' District Create')

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create District</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Create District</h6>
      <form action="{{route('district.store')}}" method="post"enctype="multipart/form-data">
        @csrf
      
        <div class="form-group">
            <label for="name">District Name</label>
            <input type="text" class="form-control"id="name"name="district_name" placeholder="District Name" >
        </div>

        <div class="form-group">
            <label for="divistion_id"> Division Name</label>
            <select name="division_id" id="divistion_id"class="form-control">
              <option value="">Select Division Name</option>
              @foreach ($divisions as $division)
                  <option value="{{$division->id}}">{{$division->name}}</option>
                  @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Brand Status</label>
            <label class="ckbox">
                <select name="status" class="form-control">
                    <option value="1">Select Active/Inactive</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
              </label>
        </div>
        <div class="form-group">
      
            <button class="btn btn-success btn-block mg-b-10">Add District Name</button>
        </div>


      </form>
    </div>
  </div>



@endsection
@section('scripts')

@endsection