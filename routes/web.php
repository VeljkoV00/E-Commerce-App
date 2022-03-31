<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});
//Main Shop Routes
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/home/{product}', [HomeController::class, 'show'])->name('show');


//Admin Routes
Route::prefix('admin')->middleware('auth', 'admin')->group(function(){

    Route::get('/dashboard', function(){
        return view('dash');
    })->name('dash');
    //Category resource controller
    Route::resource('categories', CategoryController::class);
    //Product resource controller
    Route::resource('products', ProductController::class);

});

//Email routes
Route::get('/send-email', [HomeController::class, 'sendEmail'])->name('mail');

//Cart route
//Route::get('/add-to-cart/{product}', [HomeController::class, 'cart'])->name('cart');
Route::post('/add-to-cart/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.get');




require __DIR__.'/auth.php';
