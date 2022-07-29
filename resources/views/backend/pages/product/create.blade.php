@extends('backend.layouts.app')
@section('title',' Product Create')
@section('style')
    
<link href="{{asset('public/backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
@endsection
@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create Product</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Create Product</h6>
      <form action="{{route('product.store')}}" method="post"enctype="multipart/form-data">
        @csrf
      <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="name">Product Title <i style="color:red;">*</i></label>
                  <input type="text" class="form-control"id="name"name="title" placeholder="product title.." value="{{old('title')}}">
                </div>
              <div class="form-group">
                <label for="quantity">Quantity [ Ex:5 ]<i style="color:red;">*</i></label>
                <input type="text" class="form-control"id="quantity"name="quantity" placeholder="product quantity.."value="{{old('quantity')}}">
              </div>
              <div class="form-group">
                <label for="regular_price">Regular Price<i style="color:red;">*</i></label>
                <input type="text" class="form-control"id="regular_price"name="regular_price" placeholder=" regular_price.."value="{{old('regular_price')}}">
              </div>
              <div class="form-group">
                <label for="offer_price">Offer Price [ Optional ]</label>
                <input type="text" class="form-control"id="offer_price"name="offer_price" placeholder="product offer_price" value="{{old('offer_price')}}">
              </div>
              <div class="form-group">
                <label for="brand_id"> Brand Name<i style="color:red;">*</i></label>
                   <select name="brand_id" id="brand_id"class="form-control">
                       <option value="">Select Brand </option>
                    @foreach ($brands as $brand)
                       <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
           </div>
           <div class="form-group">
              <label for="category_id"> Category Name<i style="color:red;">*</i></label>
                <select name="category_id" id="category_id"class="form-control">
                      <option value="">Select Category </option>
                  @foreach ($categories as $pcat)
                      <option value="{{$pcat->id}}">{{$pcat->title}}</option>
                      @foreach (App\Models\Category::orderby('title','asc')->where('is_parent',$pcat->id)->get() as $ccat)
                      <option value="{{$ccat->id}}">--{{$ccat->title}}</option>
                      @endforeach
                    @endforeach
              </select>
           </div>
             
          </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
        
          <div class="form-group">
                 <label for="is_featured">Product is_featured</label>
                 <label class="ckbox">
                   <select name="is_featured" class="form-control"id="is_featured">
                      <option value="0">Select Active/Inactive</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                  </select>
                 </label>
          </div>
           <div class="form-group">
              <label for="status">Product Status</label>
             <label class="ckbox">
                <select name="status" class="form-control"id="status">
                    <option value="1">Select Active/Inactive</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
              </label>
           </div>
           <div class="form-group">
            <label for="tags">Product Search Tags [Separated With Comma , ]</label>
            <input type="text" class="form-control"id="tags"name="tags" placeholder="product tags.." >
          </div>
          <div class="form-group">
            <label for="summernote">Product short description<i style="color:red;">*</i></label>
            <textarea name="short_description" id="summernote" cols="30" rows="5"class="form-control"placeholder="product short"></textarea>
        </div>
           <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="image">Thumbnail Image</label>
                <input type="file" class="form-control"id="image"name="image[]" >
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="image">Extra Image 1</label>
                <input type="file" class="form-control"id="image"name="image[]" >
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="image">Extra Image 2</label>
                <input type="file" class="form-control"id="image"name="image[]" >
              </div>
            </div>
           </div>
        </div>

      </div>
        <div class="form-group">
          <label for="summernote">Product Description<i style="color:red;">*</i></label>
          <textarea name="description" id="summernote" cols="30" rows="5"class="form-control"placeholder="product description"></textarea>
      </div>
        <div class="form-group">
            <button class="btn btn-success btn-block mg-b-10">Add Product </button>
        </div>
      </form>
    </div>
  </div>



@endsection
@section('scripts')
<script src="{{asset('public/backend/lib/medium-editor/js/medium-editor.min.js')}}"></script>
<script>
  $(function(){


    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    })
  });
</script>
@endsection