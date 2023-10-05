<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocatizationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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





// routes/web.php
Route::get("locale/{lange}",[LocatizationController::class,"setLang"])->name('setLang');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
{
	Route::get("products/all",[ProductController::class,"client"])->name('client.products.index');
    Route::get('/', function () {
        return view('index');
    })->name('index');
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::resource('products',ProductController::class);
        Route::resource('categories',CategoryController::class);
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
