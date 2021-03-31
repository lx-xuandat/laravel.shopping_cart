<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = null;
        if ($request->session()->has('users')) {
            $oldCart = $request->session()->get('users');
        }

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        //dd($cart);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }
}
