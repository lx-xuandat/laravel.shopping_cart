<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getindex()
    {
        $products = Product::all();
        return view('shop.index', [
            'products' => $products,
        ]);
    }
}
