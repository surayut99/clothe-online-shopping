<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\ImageUploadController;
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



//resource::
Route::resource('product_list', ProductsController::class);
Route::resource('address', AddressController::class);
Route::resource('product_list', ProductsController::class);
Route::resource('/product_management', ProductsController::class);
Route::resource('/create_store',StoresController::class);
Route::resource('/stores',StoresController::class);

//middleware
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

// get
Route::get('/', [PagesController::class, 'index'])->name('pages.home');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/profile', [ProfileController::class,'index'])->name('profile');
Route::get('/profile/register', function () {
    return view('auth.seller_register');
});
Route::get('/address/change_default/{address}', [AddressController::class, 'changeDefaultAddress']);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
// Route::get('/edit_product/{product_list}', [ProductsController::class,'edit'])->name('edit_product');
