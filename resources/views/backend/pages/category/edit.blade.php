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
      <form action="{{route('category.update',$category->id)}}" method="post"enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Category Title</label>
                    <input type="text" class="form-control"id="name"name="title" value="{{$category->title}}" >
                </div>
                <div class="form-group">
                    <label for="Description"> Primary Category [ Optional ]</label>
                    <select name="is_parent" class="form-control">
                        <option value="0">Primary Category </option>
                        @foreach ($parents as $p)
                        <option value="{{$p->id}}"
                            @if($category->is_parent == 0)
                     
                            @elseif($category->is_parent != 0)
                                @if($category->is_parent==$p->id)
                                selected 
                                @endif
                             @endif
                             >{{$p->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Description">Category Description</label>
                    @if(!empty($category->description))
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"id="Description">{{$category->description}}</textarea>
                    @else
                        <i style="color:red;">No description Found</i>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"id="Description"></textarea>
                  
                  @endif
                   
                </div>

            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="Status">Category Status</label>
                    <label class="ckbox">
                        <select name="status" class="form-control">
                            <option value="1">Select Active/Inactive</option>
                            <option value="1"@if($category->status==1) selected @endif>Active</option>
                            <option value="0"@if($category->status==0) selected @endif>Inactive</option>
                        </select>
                      </label>
                </div>
                <div class="form-group">
                    <label for="name">Category Image</label>
                    @if(!empty($category->image))
                    <img src="{{asset('public/backend/img/categorys/'.$category->image)}}" width="80">
                    @else
                        <i style="color:red;">No Image Found</i>
                  @endif
                    <input type="file" class="form-control"id="image"name="image" placeholder="Input box">
                </div>

            </div>
        </div>
 

     
     
        <div class="form-group">
      
            <button class="btn btn-success btn-block mg-b-10">Update Category</button>
        </div>


      </form>
    </div>
  </div>



@endsection
@section('scripts')

@endsection