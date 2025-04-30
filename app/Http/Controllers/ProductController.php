<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function cleaningProducts()
    {
        $products = Product::where('category', 'cleaning-products')->get();
        return view('cleaning-products', compact('products'));
    }

    public function fashionProducts()
    {
        $products = Product::where('category', 'fashion')->get();
        return view('fashion', compact('products'));
    }

    public function homeGoods()
    {
        $products = Product::where('category', 'home-goods')->get();
        return view('home-goods', compact('products'));
    }
}