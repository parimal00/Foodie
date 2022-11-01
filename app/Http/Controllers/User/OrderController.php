<?php

namespace App\Http\Controllers\User;

use App\Events\OrderPlacedEvent;
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
        // $orders=auth()->user()->orders();
        $orders = Order::filterStatus(request('status'))->with('driver')->where('user_id', auth()->id())->get();
        return view('orders.index', compact('orders'));
    }
    public function store(OrderStoreRequest $request)
    {
        $cart_ids = $request->cart_ids;

        //get carts
        $carts = Cart::with('item')->whereIn('id', $cart_ids)
            ->where('user_id', auth()->id())
            ->get();

        //prepare order
        $orders =  $this->prepareOrder($carts);

        // //place order from carts
        try {
            DB::transaction(function () use ($orders, $cart_ids) {
                auth()->user()->placeOrder($orders, $cart_ids);
            });
        } catch (Exception $e) {
            return back()->with('error', 'Opps!! Error Occorred! Try again!');
        }

        //event to send notifications to admins
        OrderPlacedEvent::dispatch($orders);

        return back()->with('success', 'Order Placed Successfully');
    }

    private function prepareOrder($carts)
    {
        $order_id =  Str::uuid()->toString();
        $orders = array();
        foreach ($carts as $cart) {
            $order = array(
                "item_name" => $cart->item->name,
                "amount" => $cart->amount,
                "price_per_unit" => $cart->item->price_per_unit,
                "discount_per_unit" => $cart->item->discount,
                "order_id" => $order_id,
                "user_id" => auth()->id(),
                "image_url" => $cart->item->getFirstMediaUrl("item_image"),
                "status" => "processing",
                "total_price" => ($cart->amount * $cart->item->price_per_unit) - ($cart->amount * $cart->item->discount),
                "created_at" => now(),
                "updated_at" => now(),
            );
            array_push($orders, $order);
        }
        return $orders;
    }
}
