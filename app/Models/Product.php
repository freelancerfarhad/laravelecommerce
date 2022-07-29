<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    //product page a brand name show
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
      //product page a Catgory name show
      public function category()
      {
          return $this->belongsTo(Category::class);
      }
       //imag
       public function images()
       {
           return $this->hasMany(ProductImage::class);
       }
         //imag
         public function carts()
         {
             return $this->belongsTo(Cart::class);
         }
}
