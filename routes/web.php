<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', [PagesController::class, 'index'])->name('pages.home');
Route::resource('product_list', ProductsController::class);

Route::get('/profile', function () {
    return view('pages.profile');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/profile/register', function () {
    return view('auth.seller_register');
});
