<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Models\User;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\Backend\OrderController;

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


  

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

//Admin Routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');



//User All Routes

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
Route::get('/user/settings', [IndexController::class, 'UserChangePassword'])->name('user.change_password');
Route::post('/user/password/update', [IndexController::class, 'UserUpdatePassword'])->name('user.update_password');




//Admin All brands route
Route::prefix('brand')->group(function(){

    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});

//Admin Products

Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'ProductAdd'])->name('add.product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'ProductManage'])->name('product.manage');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product.update');
    Route::post('/update/images', [ProductController::class, 'ProductImagesUpdate'])->name('update.product.image');
    Route::post('/update/main/image', [ProductController::class, 'ProductUpdateThambnail'])->name('update.product.thambnail');
    Route::get('/delete/image/{id}', [ProductController::class, 'ProductImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});

//Product details
Route::get('/product/details/{id}', [IndexController::class, 'ProductDetails']);

//Product view modal add to cart
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

//add to cart
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

//mini cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
//remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);




Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'Cartincrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'Cartdecrement']);


//checkout
Route::get('/checkout', [CartPageController::class, 'CheckoutCreate'])->name('checkout');

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace'=>'User'], function(){
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
});


//admin orders view
Route::get('/orders/pending', [OrderController::class, 'PendingOrders'])->name('pending-orders');
Route::get('/orders/details/{order_id}', [OrderController::class, 'PendingOrderDetails'])->name('pending.order.details');
Route::get('/orders/confirmed', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
Route::get('/orders/processing', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
Route::get('/orders/shipped', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
Route::get('/orders/delivered', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm-processing');
Route::get('/processing/shipped/{order_id}', [OrderController::class, 'ProcessingToShipped'])->name('processing-shipped');
Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped-delivered');
Route::get('/admin/invoice/download/{order_id}', [OrderController::class, 'AdminInvoice'])->name('admin.invoice');