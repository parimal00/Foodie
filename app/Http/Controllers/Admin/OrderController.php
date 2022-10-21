<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Role;

use function PHPUnit\Framework\returnValue;

class OrderController extends Controller
{
    public function index()
    {
        $users = User::whereHas('orders', function ($query) {
            $query->filterStatus(request('status'));
        })->with('orders')->get();
        return view('admin.orders.index', compact('users'));
    }
    public function edit(User $user)
    {
        $user->load('orders');
        $role_id = Role::where('display_name', 'driver')->first()->id;
        $drivers = User::where('role_id', $role_id)->get();
        return view('admin.orders.edit', compact('drivers', 'user'));
    }
    public function update(OrderUpdateRequest $request,User $user){
        $user->orders->update($request->validated());
    }
}
