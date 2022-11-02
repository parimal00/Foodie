<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $users = User::whereHas('orders', function ($query) {
            $query->where(function ($query) {
                $query->where('driver_id', auth()->id())
                    ->where('status', '!=', 'delivered');
            });
        })
            ->with(['orders' => function ($query) {
                $query->where('status', '!=', 'delivered');
            }])
            ->get();

        return view('driver.orders.index', compact('users'));
    }
    public function update(User $user)
    {
        $user->orders()->update([
            'status' => 'delivered'
        ]);
        return back()->with('success', 'Items Delivered Successfully');
    }
}
