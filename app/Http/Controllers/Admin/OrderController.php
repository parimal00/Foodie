<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Models\User;
use App\Services\UserType;
use App\Services\UserWithRole;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Role;

use function PHPUnit\Framework\returnValue;

class OrderController extends Controller
{
    public function index()
    {
        $users = User::whereHas('orders', function ($query) {
            $query->filterStatus(request('status'));
        })->with('orders.driver')->get();

        return view('admin.orders.index', compact('users'));
    }
    public function edit(Order $order)
    {
        $order->load('user');

        //get users with role driver ie (get drivers)
        $drivers = (new UserWithRole('driver'))->get();

        return view('admin.orders.edit', compact('drivers', 'order'));
    }

    public function show($id)
    {
        $orders = Order::with('user')->where('order_id', $id)->get();
        return view('admin.orders.show', compact('orders'));
    }
    public function update(OrderUpdateRequest $request, Order $order)
    {

        // dd($request->validated());
        $order->update($request->validated());
        return redirect()->route('admin.orders.index')->with('success', 'Order Updated Succesfully');
    }
}
