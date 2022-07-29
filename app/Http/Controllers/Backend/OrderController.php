<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('backend.pages.orders.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderdetails=Order::find($id);
        return view('backend.pages.orders.orderdetails',compact('orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderupdate=Order::find($id);
        $divisions=Division::orderBy('priority','asc')->get();
        $districts=District::orderBy('district_name','asc')->get();
        return view('backend.pages.orders.orderupdate',compact('orderupdate','divisions','districts'));
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
        $orderupdate=Order::find($id);
        $orderupdate->first_name   = $request->first_name;
        $orderupdate->last_name    = $request->last_name;
        $orderupdate->email        = $request->email;
        $orderupdate->phone        = $request->phone;
        $orderupdate->address      = $request->address;
        $orderupdate->district_id  = $orderupdate->district_id;
        $orderupdate->division_id  = $request->division_id;
        $orderupdate->post_code    = $request->post_code;
        $orderupdate->status       = $request->status;
        $orderupdate->admin_note   = $request->admin_note;
        $orderupdate->save();
        return redirect()->route('order.details',$orderupdate->id);

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
