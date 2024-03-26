<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function index()
    {
        $is_empty=Session::get('cart')==null;
        $all_products=$this->cacheService->products_cache();

        if(!Cache::has('cities') and Cache::has('regions'))
        {
            $cities=Cache::get('cities');
            $regions=Cache::get('regions');
        }
        else {
            if (file_exists(public_path('cities_list.json'))) {
                $cities = collect(json_decode(file_get_contents(public_path('cities_list.json'))));
                $regions = collect(json_decode(file_get_contents(public_path('cities_list.json'))));
                $regions = $regions->pluck('region')->unique()->values()->all();
                Cache::put('cities', $cities);
                Cache::put('regions', $regions);
            } else {
                $cities = [];
                $regions = [];
            }
        }

        //dd(json_encode($cities));

        return view('pages.cart.index', compact(['is_empty', 'all_products', 'cities', 'regions']));
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
        $order_info=Session::get('order_info');
        $all_products=$this->cacheService->products_cache();

        return view('pages.checkout.index', compact(['cart', 'order_info', 'all_products']));
    }

    public function empty_cart()
    {
        Session::forget('cart');
        return redirect()->route('cart.index');
    }

}
