<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories=Category::orderby('title','asc')->where('is_parent',0)->get();
        $categories=Category::orderby('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $parents=Category::orderby('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->title   = $request->title;
        $category->slug   =Str::slug($request->title);
        $category->description =$request->description;
        $category->is_parent =$request->is_parent;
        $category->status =$request->status;

        //Brand Image
        if($request->image){
            $image=$request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            // $img= $brand->slug.'.'.$image->getClientOriginalExtension();//modified kora hoyece
            $location=public_path('backend/img/categorys/'.$img);
            Image::make($image)->save($location);
            // Image::make($image)->resize(500,400)->save($location);//modified kora hoyece
            $category->image=$img;
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $category=Category::find($id);
      
        if(!is_null($category)){
            $parents=Category::orderby('title','asc')->where('is_parent',0)->get();
            return view('backend.pages.category.edit',compact('category','parents'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        $category->title       = $request->title;
        $category->slug        = Str::slug($request->title);
        $category->description = $request->description;
        $category->is_parent   = $request->is_parent;
        $category->status      = $request->status;

        //category Image
        if($request->image){
            //Exists Image
            if(File::exists(public_path('backend/img/categorys/'.$category->image))){
                File::delete(public_path('backend/img/categorys/'.$category->image));
                
             }
            $image=$request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/img/categorys/'.$img);
            Image::make($image)->save($location);
            $category->image=$img;
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(!is_null($category)){
        if(File::exists(public_path('backend/img/categorys/'.$category->image))){
            File::delete(public_path('backend/img/categorys/'.$category->image));
            
         }
     
         $category->delete();
         return redirect()->route('category.index');
    }
}
}
