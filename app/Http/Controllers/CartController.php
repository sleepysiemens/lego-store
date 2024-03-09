<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index()
    {
            $cart_=Session::get('cart');
        $test=collect($cart_)->where('product_id','=',1);
        $test->first()['amount']=200;
        //dd(Product::all());

        $cart=[];
        if($cart_!=null)
        {
            foreach ($cart_ as $item)
            {
                $product=Product::query()
                    ->where('products.id','=',$item['product_id'])
                    ->join('colors','colors.bl_num','=','products.color_id')
                    ->select('products.title', 'products.number', 'colors.title as color', 'products.color_id as bl_color', 'products.bricklink_number', 'products.price')
                    ->first();
                $product->setAttribute('amount',$item['amount']);
                $product->setAttribute('total',$product->amount*$product->price);

                $cart[]=$product;
            }
        }

        //dd($cart);
        return view('pages.cart.index', compact(['cart']));
    }

    public function checkout()
    {
        return view('pages.checkout.index');
    }

    public function empty_cart()
    {
        Session::forget('cart');
        return redirect()->route('cart.index');
    }
}
