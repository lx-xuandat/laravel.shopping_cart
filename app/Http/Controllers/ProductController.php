<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

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
        if ($request->session()->has('cart')) {
            $oldCart = $request->session()->get('cart');
        }

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        //dd($cart);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getCart(Request $request)
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', [
                'products' => null,
            ]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.shopping-cart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice,
        ]);
    }
}
