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
use App\Models\User;
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

Route::view('/', 'index');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::get('menus', [MenuController::class, 'index'])->name('menus.index');

//login-registration

Route::view('/user/login', 'login')->name('user.login')->middleware('guest');
Route::view('/user/register', 'register')->name('user.register')->middleware('guest');

//auth
Route::group(['middleware' => 'auth'], function () {
    
    //users
    Route::group(['middleware' => 'auth', 'as' => 'user.', 'prefix' => 'user'], function () {
        Route::resource('/my/carts', CartController::class);
        Route::get('/my/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/my/orders', [OrderController::class, 'store'])->name('orders.store');
    });

    //drivers
    Route::group(['middleware' => 'role:Driver', 'as' => 'driver.'], function () {
        Route::get('/my/orders', [DriverOrderController::class, 'index']);
        Route::get('/my/orders', [DriverOrderController::class, 'index']);
        Route::put('/users/{user}/orders/', [DriverOrderController::class, 'update'])->name('orders.update');
    });

    //admins
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Voyager::routes();
        Route::group(['as' => 'admin.'], function () {
            //items and categories
            Route::resource('categories', CategoryController::class);
            Route::resource('items', ItemController::class);

            //orders
            Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}/edit', [AdminOrderController::class, 'edit'])->name('orders.edit');
            Route::put('orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
            Route::get('orders/{id}/show', [AdminOrderController::class, 'show'])->name('orders.show');

            //invoice
            Route::get('users/{user}/invoice-show', [InvoiceController::class, 'show'])->name('invoice.show');
            Route::get('users/{user}/invoice-download', [InvoiceController::class, 'download'])->name('invoice.download');

            //notifications
            Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
            Route::post('notifications', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
        });
    });
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
