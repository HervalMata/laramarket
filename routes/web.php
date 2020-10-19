<?php

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

/*Route::get('/', function () {
    return view('welcome');
})->name('home');*/

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/stores', \App\Http\Controllers\Admin\StoreController::class);
        Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::post('photos/remove', [\App\Http\Controllers\Admin\ProductPhotoController::class, 'removePhoto'])->name('photo.remove');
    });
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [\App\Http\Controllers\HomeController::class, 'single'])->name('product.single');
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('index');
    Route::get('remove/{slug}', [\App\Http\Controllers\CartController::class, 'remove'])->name('remove');
    Route::post('add', [\App\Http\Controllers\CartController::class, 'add'])->name('add');
    Route::get('cancel', [\App\Http\Controllers\CartController::class, 'cancel'])->name('cancel');
});
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('index');
    Route::post('/proccess', [\App\Http\Controllers\CheckoutController::class, 'proccess'])->name('proccess');
    Route::get('/thanks', [\App\Http\Controllers\CheckoutController::class, 'thanks'])->name('thanks');
});
//Route::post('/cart/{slug}', [\App\Http\Controllers\HomeController::class, 'single'])->name('product.single');
