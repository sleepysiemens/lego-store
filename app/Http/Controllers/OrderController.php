<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Services\CreateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public $CreateOrder;
    public function __construct(CreateOrder $CreateOrder)
    {
        $this->CreateOrder=$CreateOrder;
    }
    public function create()
    {
        if($this->CreateOrder->create(\request()->pay_type))
        {
            return redirect()->route('successful_payment');
        }
        else
            return redirect()->route('cart.checkout');
    }

    public function successful_payment()
    {
        $order=Order::query()->where('number','=',Session::get('pay_order'))->first();
        $order->update(['is_payed'=>1]);
        dd('succ');
    }

    public function index($number)
    {
        $order=Order::query()->where('number','=',$number)->first();

        if($order->user_id!=auth()->user()->id)
            return redirect()->route('main.index');

        $cart_=json_decode($order->cart);
        $cart=[];
        if($cart_!=null)
        {
            foreach ($cart_ as $item)
            {
                $product=Product::query()
                    ->where('products.id','=',$item->product_id)
                    ->join('colors','colors.bl_num','=','products.color_id')
                    ->select('products.title', 'products.number', 'colors.title as color', 'products.color_id as bl_color', 'products.bricklink_number', 'products.price', 'products.id')
                    ->first();
                $product->setAttribute('amount',$item->amount);
                $product->setAttribute('total',$product->amount*$product->price);

                $cart[]=$product;
            }
        }

        return view('pages.order.index', compact(['order', 'cart']));
    }
}
