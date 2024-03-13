<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function index()
    {
        $is_empty=Session::get('cart')==null;
        return view('pages.cart.index', compact(['is_empty']));
    }

    public function check()
    {
        if(auth()->user()==null)
        {
            $is_registered=User::query()->where('email', '=', request()->email)->exists();
            if($is_registered)
                return redirect()->route('login');
            else
            {
                $password=Str::random(8);
                $user=User::create(
                    [
                        'email'=>request()->email,
                        'phone'=>request()->phone,
                        'name'=>request()->name,
                        'surname'=>request()->surname,
                        'password'=>Hash::make($password),
                    ]
                );
                auth()->login($user);
            }
        }
        $order_info=
            [
                'delivery_type'=>request()->delivery_type,
                'delivery_price'=>request()->delivery_price,
                'cart_price'=>request()->cart_price,
                'total'=>request()->total,
            ];
        Session::put('order_info',$order_info);
        return redirect()->route('cart.checkout');
    }

    public function checkout()
    {
        $cart_=Session::get('cart');

        if($cart_==null)
            return redirect()->route('cart.index');

        $cart=[];
        if($cart_!=null)
        {
            foreach ($cart_ as $item)
            {
                $product=Product::query()
                    ->where('products.id','=',$item['product_id'])
                    ->join('colors','colors.bl_num','=','products.color_id')
                    ->select('products.title', 'products.number', 'colors.title as color', 'products.color_id as bl_color', 'products.bricklink_number', 'products.price', 'products.id')
                    ->first();
                $product->setAttribute('amount',$item['amount']);
                $product->setAttribute('total',$product->amount*$product->price);

                $cart[]=$product;
            }
        }
        $order_info=Session::get('order_info');;
        return view('pages.checkout.index', compact(['cart', 'order_info']));
    }

    public function empty_cart()
    {
        Session::forget('cart');
        return redirect()->route('cart.index');
    }

}
