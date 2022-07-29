<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use Auth;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.profiles.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users=User::find($id);
        return view('frontend.pages.profiles.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $users=User::find($id);
        $users->name= $request->name;
        // $users->email = $request->email ;
        $users->phone= $request->phone;
        $users->address= $request->address;
        $users->city= $request->city;
        $users->country= $request->country;
        $users->zipcode= $request->zipcode;
        if($request->image){
         
             if(File::exists(public_path('backend/img/users/'.$users->image))){
                File::delete(public_path('backend/img/users/'.$users->image));
                
             }

            //upload image
            $image=$request->file('image');
            $img= time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/img/users/'.$img);
            Image::make($image)->save($location);
            $users->image=$img;
        }
 
        $users->save();
        return redirect()->route('customer_profile');
        
        
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
