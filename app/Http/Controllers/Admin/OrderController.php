<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $users = User::whereHas('orders', function ($query) {
            $query->filterStatus(request('status'));
        })->with('orders')->get();
        // return $users;
        return view('admin.orders.index', compact('users'));
    }
}
