<div class="col-lg-3">
    <aside class="sidebar">
        <form action="{{route('search')}}" method="get">
            <div class="input-group mb-3 pb-1">
                <input class="form-control text-1" placeholder="Search..." name="search" id="s" type="text"value="{{isset($search) ? $search : ''}}">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
                </span>
            </div>
        </form>
        <h5 class="font-weight-bold pt-3">Categories</h5>
        <ul class="nav nav-list flex-column">
            @foreach (App\Models\Category::orderby('title','asc')->where('is_parent',0)->get() as $pCat)
           
            <li class="nav-item"><a class="nav-link" href="{{route('primary',$pCat->id)}}">{{$pCat->title}}</a>
                <ul class="nav nav-list flex-column"class="dropdown-menu">
                    @foreach (App\Models\Category::orderby('title','asc')->where('is_parent',$pCat->id)->get() as $cCat)
                      <li class="nav-item"><a class="nav-link" href="{{route('catgory',$cCat->slug)}}">{{$cCat->title}}</a></li>
                      @endforeach

                </ul>
            </li>
            @endforeach

        </ul>
        {{-- <h5 class="font-weight-bold pt-5">Tags</h5>
        <div class="mb-3 pb-1">
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Nike</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Travel</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Sport</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">TV</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Books</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Tech</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Adidas</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Promo</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Reading</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Social</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Books</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Tech</span></a>
            <a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">New</span></a>
        </div> --}}
        <div class="row mb-5">
            <div class="col">
                <h5 class="font-weight-bold pt-5">Top Rated Products</h5>
                <ul class="simple-post-list">
                    @foreach (App\Models\Product::orderBy('id','desc')->where('is_featured',1)->get() as $product)
                    <li>
                        <div class="post-image">
                            <div class="d-block">
                                <a href="{{route('productdetails',$product->slug)}}">
                                    @php $j = 1; @endphp
                                    @foreach ($product->images as $image)
                                    @if($j > 0)
                                    <img alt="product" width="60" height="60"class="img-fluid" src="{{asset('public/backend/img/products/'.$image->image)}}">
                                        @endif
                                        @php $j--;  @endphp
                                    @endforeach
                                    {{-- <img alt="dfd" width="60" height="60" class="img-fluid" src="{{asset('public/frontend/img/products/product-grey-1.jpg')}}"> --}}
                                </a>
                            </div>
                        </div>
                        <div class="post-info">
                            <a href="{{route('productdetails',$product->slug)}}">{{Str::limit($product->title,25)}}</a>
                            {{-- <div class="post-meta text-dark font-weight-semibold">
                                $299
                            </div> --}}
                        </div>
                    </li>
                    @endforeach
                    {{--
                    <li>
                        <div class="post-image">
                            <div class="d-block">
                                <a href="shop-product-sidebar-left.html">
                                    <img alt="" width="60" height="60" class="img-fluid" src="img/products/product-grey-4.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="post-info">
                            <a href="shop-product-sidebar-left.html">Luxury bag</a>
                            <div class="post-meta text-dark font-weight-semibold">
                                $199
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <div class="d-block">
                                <a href="shop-product-sidebar-left.html">
                                    <img alt="" width="60" height="60" class="img-fluid" src="img/products/product-grey-8.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="post-info">
                            <a href="shop-product-sidebar-left.html">Military Rucksack</a>
                            <div class="post-meta text-dark font-weight-semibold">
                                $49
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </aside>
</div>