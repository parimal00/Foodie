<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Driver\OrderController as DriverOrderController;
use App\Http\Controllers\User\OrderController;
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
Route::get('test',function(){
return auth()->user()->unreadNotifications->count();
});

Route::view('/','index');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('users/profile/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::get('users/profile/cart/edit', [CartController::class, 'create'])->name('cart.edit');
    // Route::put('users/profile/cart/{cart_id}', [CartController::class, 'create'])->name('cart.edit');
    // Route::post('users/profile/cart', [CartController::class, 'store'])->name('cart.store');
    // Route::delete('users/profile/cart/{cart_id}', [CartController::class, 'create'])->name('cart.destroy');


    Route::get('users/{id}/orders', [DriverOrderController::class, 'index']);
    Route::resource('carts', CartController::class);
    Route::prefix('user')->namespace('App\Http\Controllers\User')->group(function () {
        Route::get('orders', [OrderController::class, 'index']);
        Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
    });
});
Route::view('/user/login', 'login')->name('user.login');
Route::get('menus', [MenuController::class, 'index'])->name('menus.index');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Voyager::routes();

    Route::group(['as' => 'admin.'], function () {
        //items and categories
        Route::resource('categories', CategoryController::class);
        Route::resource('items', ItemController::class);

        //orders
        Route::get('orders', [AdminOrderController::class, 'index']);
        Route::get('users/{user}/orders/edit', [AdminOrderController::class, 'edit'])->name('orders.edit');
        Route::put('users/{user}/orders', [AdminOrderController::class, 'update'])->name('orders.update');

        //invoice
        Route::get('users/{user}/invoice-show', [InvoiceController::class, 'show'])->name('invoice.show');
        Route::get('users/{user}/invoice-download', [InvoiceController::class, 'download'])->name('invoice.download');

        //notifications
        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::post('notifications', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
