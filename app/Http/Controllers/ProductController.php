<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'فروشگاه';
        $products = Product::query()
            ->where('status', '=', ProductStatus::ENABLE)
            ->paginate(1);

        return view('product.index', compact('products', 'title'));
    }
    public function show(Product $product)
    {
        $product->load('productCategory');

        return view('product.show', compact('product'));
    }
}
