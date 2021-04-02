<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.checkout', [
            'total' => $cart->totalPrice,
        ]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('product.cart');
        }

        $this->validate($request, [
            'address' => 'required',
            'paymentMethod' => 'required',
        ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        try {
            $order = new Order();

            $order->cart = serialize($cart);
            $order->name = $request->input('lastName') . ' ' . $request->input('firstName');
            $order->address = $request->input('address');
            $order->payment_id = $request->input('paymentMethod') . '_' . date("YmdH:i:s");
            Auth::user()->orders()->save($order);
        } catch (\Throwable $th) {
            Log::info('Fail');
            Log::info($th);
            return redirect()->route('product.index')->with('error', $th->getMessage());
        }
        Session::forget('cart');

        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}
