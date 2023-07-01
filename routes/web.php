<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LandingController;
use App\Models\Product;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//produk
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
});

 Auth::routes();

Route::get('/', function() {
    return view('index');
});

Route::get('/search', [SearchController::class, 'search'])->name('product.search');


