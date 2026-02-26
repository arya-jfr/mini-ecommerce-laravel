<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $title = 'سبد خرید';

        $userCartItems = CartService::getItemsWithDetails();

        $userCartTotalPrices = CartService::userCartTotalPrices();

        return view('cart', compact('userCartItems', 'userCartTotalPrices', 'title'));
    }
    public function add(OrderAddRequest $request)
    {
        CartService::add($request->input('product_id'), $request->input('qty'));

        return redirect()->back();
    }

    public function clear()
    {
        CartService::clear();

        return back();
    }

    public function removeItem(int $productId)
    {
        CartService::remove($productId);

        return back();
    }

    public function updateQty(Request $request)
    {
        $cartItems = $request->input('cart_items');

        foreach ($cartItems as $cartItem){
            CartService::updateQty($cartItem['product_id'], $cartItem['qty']);
        }

        return back();
    }
}
