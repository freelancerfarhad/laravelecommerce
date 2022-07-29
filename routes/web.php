
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Frontend\CartColtroller;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\OrderManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Frontend route
Route::get('/',[HomepageController::class,'homepage'])->name("homepage");

//all product and details route
Route::get('/all-product',[HomepageController::class,'allproduct'])->name("allproduct");
Route::get('{slug}/product-details',[HomepageController::class,'productdetails'])->name("productdetails");
// category and sub category route
Route::get('/category/{slug}',[HomepageController::class,'category'])->name("catgory");
Route::get('/primary/category/{id}',[HomepageController::class,'primary'])->name("primary");
// search product route
Route::get('/search',[HomepageController::class,'search'])->name("search");
// contact page and send mail
Route::get('/contact-mail',[HomepageController::class,'contactmail'])->name("contactmail");
Route::post('/send-mail',[HomepageController::class,'sendmail'])->name("sendmail");
Route::get('/about-us',[HomepageController::class,'about'])->name("about");
// cart and checkout all route
Route::group(['prefix'=>'cart'],function(){
        Route::get('/',[CartColtroller::class,'index'])->name("cart.items");
        Route::post('/store',[CartColtroller::class,'store'])->name("cart.store");
        Route::put('/update/{id}',[CartColtroller::class,'update'])->name("cart.update");
        Route::delete('/destroy/{id}',[CartColtroller::class,'destroy'])->name("cart.destroy");
       
});

// cart and checkout all route
Route::get('/checkout',[HomepageController::class,'checkout'])->name("checkout");
Route::get('get-district/{id}',function($id){
        return json_encode(App\Models\District::where('division_id',$id)->get());
});

// all author and customer route
Route::get('/customer-login',[HomepageController::class,'login'])->name("customer-login");

// admin route define By Backend
Route::group(['prefix'=>'admin'],function(){
    Route::get('dashboard',[PagesController::class,'dashboard'])->name('admin.dashboard')->middleware(['auth','verified','role']);

        Route::resource('brand', BrandController::class)->middleware(['auth',]);
        Route::resource('category', CategoryController::class)->middleware(['auth']);
        Route::resource('product', ProductController::class)->middleware(['auth']);
        Route::resource('division', DivisionController::class)->middleware(['auth']);
        Route::resource('district', DistrictController::class)->middleware(['auth']);
   


});
// order management system
Route::group(['prefix'=>'/order_management'],function(){
//        customer profile setup
        Route::get('/manage',[OrderController::class,'index'])->middleware(['auth'])->name('order.manage');
        Route::get('/manage/details/{id}',[OrderController::class,'show'])->middleware(['auth'])->name('order.details');
        Route::get('/edit/{id}',[OrderController::class,'edit'])->middleware(['auth'])->name('order.edit');
        Route::put('/update/{id}',[OrderController::class,'update'])->middleware(['auth'])->name('order.update');
        Route::post('/delete/{id}',[OrderController::class,'destroy'])->middleware(['auth'])->name('order.destroy');
        });
// Frontend route by Customer  setting
Route::group(['prefix'=>'customer'],function(){
//        customer profile setup
        Route::get('/profile',[CustomerController::class,'index'])->middleware(['auth','verified'])->name('customer_profile');
        Route::get('/profile/update/{id}',[CustomerController::class,'create'])->middleware(['auth'])->name('profileupdate');
        Route::post('/profile/updates/{id}',[CustomerController::class,'store'])->middleware(['auth'])->name('profilestore');

        // ordermanagement system
        Route::get('/order-history',[OrderManagementController::class,'index'])->middleware(['auth'])->name('order_management');
        Route::get('/order-invoice/{id}',[OrderManagementController::class,'show'])->middleware(['auth'])->name('order-invoice');
   
});

// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
 Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('make_payment');
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('payment_success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('payment_fail');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('payment_cancel');

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

require __DIR__.'/auth.php';