<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::orderby('name','asc')->get();
        return view('backend.pages.brand.manage',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=new Brand();
        $brand->name   = $request->name;
        $brand->slug   =Str::slug($request->name);
        $brand->status =$request->status;

        //Brand Image
        if($request->image){
            $image=$request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            // $img= $brand->slug.'.'.$image->getClientOriginalExtension();//modified kora hoyece
            $location=public_path('backend/img/brands/'.$img);
            Image::make($image)->save($location);
            // Image::make($image)->resize(500,400)->save($location);//modified kora hoyece
            $brand->image=$img;
        }
        $brand->save();
        return redirect()->route('brand.index');
       
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
    public function edit(Brand $brand)
    {
        return view('backend.pages.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Brand $brand)
    {
 
        $brand->name   = $request->name;
        $brand->slug   =Str::slug($request->name);
        $brand->status =$request->status;

        //Brand Image
        if($request->image){
            //Existing Image
            // if(File::exists('public/backend/img/brands/'. $brand->image )){
            //     File::delete('public/backend/img/brands/'. $brand->image );
                
            //  }
             if(File::exists(public_path('backend/img/brands/'.$brand->image))){
                File::delete(public_path('backend/img/brands/'.$brand->image));
                
             }

            //upload image
            $image=$request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/img/brands/'.$img);
            Image::make($image)->save($location);
            $brand->image=$img;
        }
        $brand->save();
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if(File::exists(public_path('backend/img/brands/'.$brand->image))){
            File::delete(public_path('backend/img/brands/'.$brand->image));
            
         }
         $brand->delete();
         return redirect()->route('brand.index');
    }
}
