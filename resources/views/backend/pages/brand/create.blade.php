@extends('backend.layouts.app')
@section('title',' Brand Create')

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create Brand</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Create Brand</h6>
      <form action="{{route('brand.store')}}" method="post"enctype="multipart/form-data">
        @csrf
      
        <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text" class="form-control"id="name"name="name" placeholder="Name" >
        </div>

        <div class="form-group">
            <label for="name">Brand Image</label>
            <input type="file" class="form-control"id="image"name="image" placeholder="Input box">
        </div>
        <div class="form-group">
            <label for="name">Brand Status</label>
            <label class="ckbox">
                <select name="status" class="form-control">
                    <option value="0">Select Active/Inactive</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
              </label>
        </div>
        <div class="form-group">
      
            <button class="btn btn-success btn-block mg-b-10">Add Brand Name</button>
        </div>


      </form>
    </div>
  </div>



@endsection
@section('scripts')

@endsection