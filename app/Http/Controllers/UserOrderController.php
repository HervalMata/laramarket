<?php

namespace App\Http\Controllers;

class UserOrderController extends Controller
{
    public function index()
    {
        $userOrders = auth()->user()->orders()->paginate(15);
        return view('user-orders', compact('userOrders'));
    }
}