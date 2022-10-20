<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NewOrderNotification;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        // return $orders;
        return view('orders.index', compact('orders'));
    }
    public function store(OrderStoreRequest $request)
    {
        $orders = array();
        $cart_ids = $request->cart_ids;

        //get carts
        $carts = Cart::with('item')->whereIn('id', $cart_ids)
            ->where('user_id', auth()->id())
            ->get();

        //prepare orders
        foreach ($carts as $cart) {
            $order = array(
                "item_name" => $cart->item->name,
                "amount" => $cart->amount,
                "price_per_unit" => $cart->item->price_per_unit,
                "discount_per_unit" => $cart->item->discount,
                "order_id" => Str::random(10),
                "user_id" => auth()->id(),
                "image_url" => $cart->item->getFirstMediaUrl("item_image"),
                "status" => "pending",
                "created_at" => now(),
                "updated_at" => now(),
            );
            array_push($orders, $order);
        }
        try {
            DB::transaction(function () use ($orders, $cart_ids) {
                Order::insert($orders);
                Cart::whereIn('id', $cart_ids)
                    ->where('user_id', auth()->id())
                    ->delete();
                //delete quantity
            });
        } catch (Exception $e) {
            return back()->with('error', 'Opps!! Error Occorred! Try again!');
        }
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->get();
        foreach ($users as $user) {
            $user->notify(new NewOrderNotification);
        }
        
        return back()->with('success', 'Order Placed Successfully');
    }
}
