<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $userCartItems = CartService::getItems();

        return view('cart', compact('userCartItems'));
    }
    public function add(OrderAddRequest $request)
    {
        CartService::add($request->input('product_id'), $request->input('qty'));

        return redirect()->back();
    }
}
