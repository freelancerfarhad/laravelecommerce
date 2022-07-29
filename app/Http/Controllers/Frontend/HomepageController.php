<?php

namespace App\Http\Controllers\Frontend;

use Mail;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Mail\Contactmail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HomepageController extends Controller
{
    /**
     * Display a listing of the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        $allproduct=Product::all()->take(9);
        $latestproduct=Product::latest()->where('status',1)->where('is_featured',0)->take(9)->get();
        $featureproduct=Product::orderBy('id','asc')->where('is_featured',1)->take(9)->get();
        return view('frontend.pages.homepage',compact('latestproduct','featureproduct','allproduct'));
    }
    /**
     * Display a listing of the cart page.
     *
     * @return \Illuminate\Http\Response
     */
   
        /**
      * Display a listing of the Checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {        $items=Cart::orderBy('id','desc')->where('id',NULL)->get();
        $divisions=Division::orderby('priority','asc')->get();
        $districts=District::orderby('id','asc')->get();
        return view('frontend.pages.checkout',compact('items','divisions','districts'));
    }
    /**
     * Display a listing of the Login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('frontend.pages.login');
    }

    /**
      * Display a listing of the all product page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allproduct()
    {
        $products=Product::orderby('id','desc')->where('status',1)->get();
        return view('frontend.pages.allproducts',compact('products'));
    }

    /**
      * Display a listing of the product details page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productdetails($slug)
    {
        // $productdetails=Product::find($slug);
        $productdetails=Product::orderby('slug','desc')->where('slug',$slug)->first();
        if(!is_null($productdetails)){
            return view('frontend.pages.productdetails',compact('productdetails'));
        }else{
            return redirect()->back();
        }
        
        
    }

    /**
      * Display a listing of the search page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $search=$request->search;
        $products=Product::orWhere('title','like','%'.$search.'%')
        ->orWhere('short_description','like','%'.$search.'%')
        ->orWhere('tags','like','%'.$search.'%')->orderby('id','desc')->get();
        return view('frontend.pages.search',compact('search','products'));
    }
   /**
     * Display a listing of the Primary category page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function primary($id)
    {  
        // $products=Product::orderby('id','desc')->where('status',1)->get();
        $pcategory=Category::where('id',$id)->first();
        if(!is_null($pcategory)){
        return view('frontend.pages.primarycategory',compact('pcategory'));
        }else{
            return redirect()->back();
        }
    }
    /**
     * Display a listing of the sub categorky page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {  
        // $products=Product::orderby('id','desc')->where('status',1)->get();
        $category=Category::where('slug',$slug)->first();
        if(!is_null($category)){
        return view('frontend.pages.categorysearch',compact('category'));
        }else{
            return redirect()->back();
        }
    }

    /*
        contact mail function
    */
    public function contactmail()
    {
        return view('frontend.pages/contact');
    }
      /*
        sendmail mail function
    */
    public function sendmail(Request $request)
    {
        $sendEmail = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

        ];
       Mail::to('forhadhossainfh22@gmail.com')->send(new Contactmail($sendEmail));
       Toastr::success('Message Send Successfully :)' ,'Success');
       return back();
    }
    public function about()
    {
        return view('frontend.pages/about');
    }
}
