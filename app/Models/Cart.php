<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //total cart functionality
    public static function totalCarts()
    {
        if(Auth::check()){
           $carts= Cart::where('user_id',Auth::id())->where('order_id',NULL)->get();
        }else{
           $carts= Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }
        return $carts;
    }
      //total carts Items
      public static function totalItems()
      {
          if(Auth::check()){
             $carts= Cart::where('user_id',Auth::id())->where('order_id',NULL)->get();
          }else{
             $carts= Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
          }
          $total_items=0;
          foreach($carts as $cart){
            $total_items += $cart->quantity;
          }
          return $total_items;
      }

          //To return product price in the cart page
          public static function TotalPrice()
          {
              if(Auth::check()){
                 $carts= Cart::where('user_id',Auth::id())->where('order_id',NULL)->get();
              }else{
                 $carts= Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
              }
              $total_price=0;
              foreach($carts as $cart){
                if(!is_null($cart->product->offer_price))
                {
                    $total_price += $cart->product->offer_price * $cart->quantity;
                }else
                {
                    $total_price += $cart->product->regular_price * $cart->quantity;
                }
              }
              return $total_price;
          }
}

