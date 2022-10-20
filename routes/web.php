<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\OrderController;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use TCG\Voyager\Models\Role;

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

Route::get('roles', function () {
    return auth()->user()->notifications;
 foreach(auth()->user()->notifications as $notification){
    echo $notification->ordered_by;
 }
});

Route::get('/', function () {
    return view('index');
});

Route::get('/users/{user}/invoice', function (User $user) {
    $user->load('orders');

    // return view('test');

    $pdf = Pdf::loadView('test', compact('user'));
    return $pdf->stream();

    //return view('invoice',compact('user'));
});

Route::post('/users/store', function (Request $request) {

    $data = array();

    $name = "name";
    for ($i = 0; $i < count($request->email); $i++) {

        array_push($data, array(
            $name => 'hello',
            'email' => $request->email[$i],
            'password' => $request->password[$i],
        ));
    }


    User::insert(
        $data
    );
});

// Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace'=>'App\Http\Controllers\Admin'], function () {
//     Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
// });

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {


    // ... other controllers from Admin namespace

});
Route::group(['middleware' => 'auth'], function () {
    // Route::get('users/profile/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::get('users/profile/cart/edit', [CartController::class, 'create'])->name('cart.edit');
    // Route::put('users/profile/cart/{cart_id}', [CartController::class, 'create'])->name('cart.edit');
    // Route::post('users/profile/cart', [CartController::class, 'store'])->name('cart.store');
    // Route::delete('users/profile/cart/{cart_id}', [CartController::class, 'create'])->name('cart.destroy');



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

    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::get('users/{user}/invoice-show', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('users/{user}/invoice-download', [InvoiceController::class, 'download'])->name('invoice.download');
    Route::get('notifications',[NotificationController::class,'index'])->name('admin.notifications.index');
    Route::post('notifications',[NotificationController::class,'markAllAsRead'])->name('admin.notifications.markAllAsRead');
        Route::view('welcome', 'welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
