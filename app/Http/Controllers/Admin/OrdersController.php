<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;

class OrdersController
{
    public function index()
    {
        return view('admin.pages.orders.index');
    }

    public function show($number)
    {
        $order=Order::query()->where('number','=',$number)->join('users','users.id','orders.user_id')->select('orders.*', 'users.email', 'users.name', 'users.surname')->first();
        $cart_=json_decode($order->cart);

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

        return view('admin.pages.order.index', compact(['order', 'cart']));
    }

    public function edit($number)
    {
        $order=Order::query()->where('number','=',$number)->join('users','users.id','orders.user_id')->select('orders.*', 'users.email', 'users.name', 'users.surname')->first();
        $cart_=json_decode($order->cart);

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

        return view('admin.pages.order.edit', compact(['order', 'cart']));
    }

    public function update(Order $order)
    {
        $request=request()->all();
        unset($request['_token']);
        unset($request['_method']);
        $order->update($request);
        return redirect()->route('admin.orders.show',$order->number);
    }
}
