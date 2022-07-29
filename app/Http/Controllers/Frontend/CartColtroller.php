<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Auth;
class CartColtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Cart::orderBy('id','desc')->where('order_id',NULL)->get();
        return view('frontend.pages.cart',compact('items'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $cart= Cart::where('user_id',Auth::id())->where('product_id',$request->product_id)->where('order_id',NULL)->first();
        }else{
            $cart= Cart::where('ip_address',request()->ip())->where('product_id',$request->product_id)->where('order_id',NULL)->first();
        }
// dd($cart);exit();
        if(!is_null($cart)){
            $cart->increment('quantity');
            return redirect()->back();
        }else{
            $cart=new Cart();
            if(Auth::check()){
                $cart->user_id=Auth::id();
            }
           
        }
        $cart->ip_address=$request->ip();
        $cart->product_id=$request->product_id;
        $cart->quantity=$request->quantity;
        $cart->unit_price=$request->unit_price;
        $cart->save();
        return redirect()->back();
        
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
        $cart=Cart::find($id);
        if(! is_null($cart)){
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::find($id);
        if(! is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->back();
    }
}
