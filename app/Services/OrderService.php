<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Exception;
use Illuminate\Support\Str;

class OrderService
{
    public static function register(array $checkoutData):void
    {
        $cartItems = CartService::getItemsWithDetails();
        $cartTotalPrices = CartService::userCartTotalPrices();

        //check product qty
        foreach ($cartItems as $cartItem){
            if ($cartItem['qty'] > $cartItem['product']->qty){
                throw new Exception('موجودی یکی از محصولات کافی نمی باشد');
            }
        }

        //dec product qty
        foreach ($cartItems as $cartItem){
            $cartItem['product']->decrement('qty', $cartItem['qty']);
        }

        //create order
        $orderData = [
            'user_id' => Auth::id(),
            'total_price' => $cartTotalPrices['price'],
            'total_discount' => $cartTotalPrices['discount'],
            'total_products' => CartService::getCount(),
            'tracking_code' => Str::random(12),
            'status' => OrderStatus::PROCESSING
        ];

        $order = Order::create(array_merge($orderData, $checkoutData));

        //create order items
        foreach ($cartItems as $cartItem){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'qty' => $cartItem['qty'],
                'price' => $cartItem['product']->price,
                'total_price' => $cartItem['product']->price * $cartItem['qty'],
                'discount' => $cartItem['product']->discount,
                'total_discount' => $cartItem['product']->price * $cartItem['qty']
            ]);
        }

        CartService::clear();
    }
}
