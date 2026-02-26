<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $title = 'لیست سفارشات';
        $userOrders = Order::query()
            ->where('user_id', '=', Auth::user()->id)
            ->orderByDesc('created_at')
            ->paginate();

        return view('account.orders', compact('userOrders', 'title'));
    }
}
