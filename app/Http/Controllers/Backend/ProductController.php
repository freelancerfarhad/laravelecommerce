<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderby('title','desc')->get();
        return view('backend.pages.product.manage',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::orderby('name','asc')->get();
        $categories=Category::orderby('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.product.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:products',
            'slug' => '',
            'brand_id' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:20',
            'short_description' => 'required',
            'quantity' => 'required',
            'regular_price' => 'required',
            'offer_price' => '',
            'is_featured' => 'required',
            'status' => 'required',
            'tags' => 'min:2'

        ]);

        $product=new Product();
        $product->title   = $request->title;
        $product->slug   = Str::slug($request->title);
        $product->brand_id =$request->brand_id;
        $product->category_id =$request->category_id;
        $product->short_description =$request->short_description;
        $product->description =$request->description;
        $product->quantity =$request->quantity;
        $product->regular_price =$request->regular_price;
        $product->offer_price =$request->offer_price;
        $product->is_featured =$request->is_featured;
        $product->status =$request->status;
        $product->tags =$request->tags;
        $product->save();
        //Image uploas
        if(count($request->image) > 0)
        {
            foreach($request->image as $image)
            {
                $img= rand(1,9999999).'.'.$image->getClientOriginalExtension();
                // $img= $brand->slug.'.'.$image->getClientOriginalExtension();//modified kora hoyece
                $location=public_path('backend/img/products/'.$img);
                // Image::make($image)->save($location);
                Image::make($image)->resize(900,600)->save($location);//modified kora hoyece
                $image = new ProductImage();
                $image->product_id=$product->id;
                $image->image=$img;
                $image->save();
            }
        }

       
        Toastr::success('product Successfully Add :)' ,'Success');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands=Brand::orderby('name','asc')->get();
        $categories=Category::orderby('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.product.edit',compact('brands','categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        // $validated = $request->validate([
        //     'title' => 'required',
        //     'slug' => '',
        //     'brand_id' => 'required',
        //     'category_id' => 'required',
        //     'description' => 'required|min:20',
        //     'quantity' => 'required',
        //     'regular_price' => 'required',
        //     'offer_price' => '',
        //     'is_featured' => 'required',
        //     'status' => 'required',
        //     'tags' => 'min:2'

        // ]);

     
        $product->title   = $request->title;
        $product->slug   = Str::slug($request->title);
        $product->brand_id =$request->brand_id;
        $product->category_id =$request->category_id;
        $product->short_description =$request->short_description;
        $product->description =$request->description;
        $product->quantity =$request->quantity;
        $product->regular_price =$request->regular_price;
        $product->offer_price =$request->offer_price;
        $product->is_featured =$request->is_featured;
        $product->status =$request->status;
        $product->tags =$request->tags;
        $product->save();

        if(count($request->image) > 0) {
            foreach($product->images as $pimage)
            {
                if(File::exists(public_path('backend/img/products/'.$pimage->image))){
                    File::delete(public_path('backend/img/products/'.$pimage->image));
                    
                }
            }
            foreach($request->image as $image)
            {
                $img= rand(1,9999999).'.'.$image->getClientOriginalExtension();
                // $img= $brand->slug.'.'.$image->getClientOriginalExtension();//modified kora hoyece
                $location=public_path('backend/img/products/'.$img);
                // Image::make($image)->save($location);
               Image::make($image)->resize(900,600)->save($location);//modified kora hoyece
                $image = new ProductImage();
                $image->product_id=$product->id;
                $image->image=$img;
                $image->save();
            }
         }

        Toastr::success('product Successfully Updated :)' ,'Success');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
