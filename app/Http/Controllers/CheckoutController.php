<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPostRequest;
use App\Services\CartService;
use App\Services\OrderService;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $title = 'تکمیل سفارش';
        $userCart = CartService::getItemsWithDetails();
        $userCartTotalPrices = CartService::userCartTotalPrices();

        return view('checkout', compact('userCart', 'userCartTotalPrices', 'title'));
    }

    public function post(CheckoutPostRequest $request)
    {
        $checkoutData = $request->only([
           'user_province',
           'user_city',
           'user_address',
           'user_postal_code',
           'user_mobile',
           'description',
        ]);

        try {
            OrderService::register($checkoutData);
        } catch (Exception $exception){
            return back()->withErrors([
                'general' => $exception->getMessage()
            ]);
        }

        return redirect()->route('account.orders');
    }
}
