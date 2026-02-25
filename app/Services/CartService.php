<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function add(int $productId, int $qty): void
    {
        $userCart = session('cart', []);

        $userCart[$productId] = [
            'product_id' => $productId,
            'qty' => $qty
        ];

        session([
            'cart' => $userCart
        ]);

    }

    public static function getCount(): int
    {
        $userCart = session('cart', []);

        return count($userCart);
    }

    public static function getItems(): array
    {
        $userCart = session('cart', []);

        foreach ($userCart as $key => $value){
            $userCart[$key]['product'] = Product::find($key);
        }

        return $userCart;
    }
}
