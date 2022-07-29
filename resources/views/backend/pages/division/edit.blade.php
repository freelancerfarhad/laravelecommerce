@extends('backend.layouts.app')
@section('title',' Division Update')

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
      <h6 class="br-section-label">Create Division</h6>
      <form action="{{route('division.update',$division->id)}}" method="post"enctype="multipart/form-data">
        @csrf
      @method('patch')
        <div class="form-group">
            <label for="name">Division Name</label>
            <input type="text" class="form-control"id="name"name="name" value="{{$division->name}}" >
        </div>

        <div class="form-group">
            <label for="priority"> Priority</label>
            <input type="number" class="form-control"id="priority"name="priority" value="{{$division->priority}}">
        </div>
        <div class="form-group">
            <label for="name">Brand Status</label>
            <label class="ckbox">
                <select name="status" class="form-control">
                    <option value="1"@if($division->status==1) selected @endif>Active</option>
                    <option value="0"@if($division->status==0) selected @endif>Inactive</option>
                </select>
              </label>
        </div>
        <div class="form-group">
      
            <button class="btn btn-success btn-block mg-b-10">Save Changes</button>
        </div>


      </form>
    </div>
  </div>



@endsection
@section('scripts')

@endsection