<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\UserProductController;
use Illuminate\Support\Facades\Route;


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


/*
| GROUP SECTION BY CONTROLLER NAME
| GROUP IN SECTION BY REQUEST METHOD
*/


// Authentication
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

// Pages
Route::get('/', [PagesController::class, 'index'])->name('pages.home');

// Profile
Route::get('/profile', [ProfileController::class,'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'showEditProfile'])->name('edit-profile');
Route::post('/profile/edit', [ProfileController::class,'editProfile'])->name('update-profile');

// Address
Route::resource('address', AddressController::class);
Route::put('/address/change_default/{address}', [AddressController::class, 'changeDefaultAddress'])->name('changeDefaultAddress');

// UserProduct
Route::get('/user_product/{opt}', [UserProductController::class, 'showUserProduct']);

// Cart
Route::delete('/cart/{id}/delete',[CartController::class,'destroy'])->name('cart.destroy');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('add_product/{id}',  [CartController::class, 'store'])->name('addcart');

// Products
Route::resource('products', ProductsController::class);
Route::get('product_types/{products}', [ProductsController::class, 'getSecondary']);
Route::get('product_qty/{product}', [ProductsController::class, 'getMaxQty']);
Route::get('product_management/{store}', [ProductsController::class, 'productsinStore'])->name('product_management');



// Stores
Route::resource('stores',StoresController::class);

// No Controller
Route::get('auth/register', function () {
    return view('pages.auth.register');
})->name('pages.auth.register');
Route::get('auth/login', function () {
    return view('pages.auth.login');
})->name('pages.auth.login');
Route::get('/cart/checkout', function () {
    return view('pages.checkout');
})->name('checkout');
Route::get('/profile/open-shop', function () {
    return view('auth.seller_register');
})->name('seller_register');
Route::get('/order-details/1', function () {
    return view('pages.order_details');
})->name('order_details');
