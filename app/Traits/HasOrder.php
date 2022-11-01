<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\Order as ItemOrder;

trait HasOrder
{
    function placeOrder($orders, $cart_ids)
    {
        ItemOrder::insert($orders);

        //delete quantity
        $this->decreaseItemQuantity($cart_ids);

        //delete cart
        $this->deleteCarts($cart_ids);
    }

    private function decreaseItemQuantity($cart_ids)
    {
        $carts = Cart::whereIn('id', $cart_ids)->get();
        foreach ($carts as $cart) {
            $cart->item()->decrement('quantity', $cart->amount);
        }
    }

    private function deleteCarts($cart_ids)
    {
        Cart::whereIn('id', $cart_ids)
            ->where('user_id', $this->id)
            ->delete();
    }
}
