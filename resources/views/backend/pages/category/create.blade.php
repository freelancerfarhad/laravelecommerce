@extends('backend.layouts.app')
@section('title',' Category Create')

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create Category</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label"> Category Create</h6>
      <form action="{{route('category.store')}}" method="post"enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Category Title</label>
                    <input type="text" class="form-control"id="name"name="title" placeholder="Category Title" >
                </div>
                <div class="form-group">
                    <label for="Description"> Primary Category [ Optional ]</label>
                    <select name="is_parent" class="form-control">
                        <option value="0">Primary Category Optiional</option>
                        @foreach ($parents as $p)
                        <option value="{{$p->id}}">{{$p->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Description">Category Description</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"id="Description"></textarea>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="Status">Category Status</label>
                    <label class="ckbox">
                        <select name="status" class="form-control">
                            <option value="1">Select Active/Inactive</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                      </label>
                </div>
                <div class="form-group">
                    <label for="name">Category Image</label>
                    <input type="file" class="form-control"id="image"name="image" placeholder="Input box">
                </div>

            </div>
        </div>
 

     
     
        <div class="form-group">
      
            <button class="btn btn-success btn-block mg-b-10">Add Category</button>
        </div>


      </form>
    </div>
  </div>



@endsection
@section('scripts')

@endsection