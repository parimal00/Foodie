<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(User $user){
         return  $user->orders();
    }
}
