<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\UserController;

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
    return view('auth.login');
});



// Route::view('home', 'home')->middleware('auth');


Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(static function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::resource('category', CategoryController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('user', UserController::class);
        Route::resource('profile', ProfileController::class);
        Route::get('password-change', [ProfileController::class, 'password_change'])->name('user.password_change');
        Route::post('password-update', [ProfileController::class, 'password_update'])->name('user.password_update');


        Route::resource('supplier', SupplierController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('product', ProductController::class);
        Route::resource('purchase', PurchaseController::class);

        // Default
        Route::get('get-category', [DefaultController::class,'get_category'])->name('get-category');        
        Route::get('get-product', [DefaultController::class,'get_product'])->name('get-product');
    });
});
