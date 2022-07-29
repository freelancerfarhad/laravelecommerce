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
      <form action="{{route('brand.update',$brand->id)}}" method="post"enctype="multipart/form-data">
        @csrf
      @method('patch')
        <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text" class="form-control"id="name"name="name" value="{{$brand->name}}" >
        </div>

        <div class="form-group">
            <label for="name">Brand Image</label>
            @if(!empty($brand->image))
                <img src="{{asset('public/backend/img/brands/'.$brand->image)}}" width="80">
                @else
                    <i style="color:red;">No Image Found</i>
              @endif
            <input type="file" class="form-control"id="image"name="image">
        </div>
        <div class="form-group">
            <label for="name">Brand Status</label>
            <label class="ckbox">
                <select name="status" class="form-control">
                    <option value="0">Select Active/Inactive</option>
                    <option value="1"@if($brand->status==1) selected @endif>Active</option>
                    <option value="0"@if($brand->status==0) selected @endif>Inactive</option>
                </select>
              </label>
        </div>
        <div class="form-group">
      
            <button class="btn btn-success btn-block mg-b-10">Update Brand Name</button>
        </div>


      </form>
    </div>
  </div>



@endsection
@section('scripts')

@endsection