@extends('frontend.layouts.template')
@section('title','picabo')
@section('style')
    <style>
        .shop .products .product .price del {
    color: rgb(0 0 0 / 71%);
    font-size: 0.7em;
    margin: -2px 0 0;
}
.shop .products .product .price del {
    color: rgb(0 0 0 / 71%);
    font-size: 0.7em;
    margin: -2px 0 0;
}input.add-to-cart-product.bg-color-primary {
    width: 100% !important;
    border: 1px solid #037dfb;
}
#header .header-nav-features .header-nav-features-cart .mini-products-list li .product-details .btn-remove {
    z-index: 3;
    top: 5px;
    right: -5px;
    width: 20px;
    height: 20px;
    background-color: #fff;
    color: #474747;
    border-radius: 100%;
    position: absolute;
    text-align: center;
    box-shadow: 0 2px 3px 0 rgb(0 0 0 / 20%);
    line-height: 20px;
    font-size: 10px;
    border: 1px solid #ddd;
}
    </style>
@endsection
@section('body-content')
  
<div role="main" class="main shop py-4">

    <div class="container">

        <div class="row">
            
            @include('frontend.includes.sidebar')

            <div class="col-lg-9">

                <div class="masonry-loader masonry-loader-loaded">
                    <div class="row products product-thumb-info-list" data-plugin-masonry="" data-plugin-options="{'layoutMode': 'fitRows'}" style="position: relative; height: 1088.95px;">
                      
                     
                        @if ($products->count() > 0)
                             @foreach ($products as $product)
                            <div class="col-sm-6 col-lg-4 product" style="position: absolute; left: 0px; top: 0px;">
                                @if ($product->is_featured==0)
                                    
                                @elseif($product->is_featured==1)
                                <a href="shop-product-sidebar-left.html">
                                    <span class="onsale">Sale!</span>
                                </a>
                                @endif
                               
                                <span class="product-thumb-info border-0">
                                    <form action="{{route('cart.store')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="quantity"value="1">
                                        <input type="hidden" name="product_id"value="{{$product->id}}">
                                        @if ($product->is_featured==0)
                                        <input type="hidden" name="unit_price"value="{{$product->regular_price}}">
                                        
                                          @elseif($product->is_featured==1)
                                          <input type="hidden" name="unit_price"value="{{$product->offer_price}}">
                                          @endif
                                        <input type="submit"name="submit" value="Add to Cart" class="add-to-cart-product bg-color-primary">
                                    {{-- <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                        <span class="text-uppercase text-1">Add to Cart</span>
                                    </a> --}}
                                </form>
                                  
                                    <a href="{{route('productdetails',$product->slug)}}">
                                        <span class="product-thumb-info-image">
                                            @php $j = 1; @endphp
                                            @foreach ($product->images as $image)
                                            @if($j > 0)
                                            <img alt="" class="img-fluid" src="{{asset('public/backend/img/products/'.$image->image)}}">
                                                @endif
                                                @php $j--;  @endphp
                                            @endforeach
                                           
                                        </span>
                                    </a>
                                    <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                        <a href="shop-product-sidebar-left.html">
                                            <h4 class="text-4 text-primary">{{Str::limit($product->title,25)}}</h4>
                                            <span class="price">
                                                @if ($product->is_featured==0)
                                                <ins><span class="amount text-dark font-weight-semibold">৳{{$product->regular_price}}</span></ins>
                                                  @elseif($product->is_featured==1)
                                                  <del><span class="amount">৳{{$product->regular_price}}</span></del> 
                                                      <ins><span class="amount text-dark font-weight-semibold">৳{{$product->offer_price}}</span></ins>
                                                 
                                                  @endif
                                                   
                                            </span>
                                        </a>
                                    </span>
                                </span>
                            </div>
                        @endforeach
                        @else
                            <div class="alert alert-info">No Product found your search keyword...<strong>{{$search}}</strong></div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div>
                <div class="bounce-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
            </div>
        </div>
    </div>

</div>
  
@endsection
