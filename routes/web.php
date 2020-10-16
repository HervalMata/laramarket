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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/stores', \App\Http\Controllers\Admin\StoreController::class);
        Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::post('photos/remove', [\App\Http\Controllers\Admin\ProductPhotoController::class, 'removePhoto'])->name('photo.remove');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
