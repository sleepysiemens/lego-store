<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CreateOrder
{
    public function unique_number()
    {
        $number=$this->create_number();
        while (Order::query()->where('number','=',$number)->exists())
            $number=$this->create_number();
        return $number;
    }

    public function create_number()
    {
        $number=null;
        for($i=1;$i<=8;$i++)
        {
            $number=$number.mt_rand(0,9);
        }
        return $number;
    }
    public function create($pay_type)
    {
        $order_info=Session::get('order_info');
        $number=$this->unique_number();
        $cart=Session::get('cart');
        $data=
            [
                'number'=>$number,
                'user_id'=>auth()->user()->id,
                'cart'=>json_encode($cart),
                'price'=>$order_info['cart_price'],
                'status'=>0,
                'delivery_price'=>$order_info['delivery_price'],
                'delivery_type'=>$order_info['delivery_type'],
                'pay_type'=>$pay_type,
            ];

        $order=Order::create($data);

        if($order!=null)
        {
            foreach ($cart as $product_)
            {
                $product=Product::query()->where('id','=',$product_['product_id'])->first();
                $product->update(['amount'=>($product->amount)-$product_['amount']]);

                if($product->amount==0)
                {
                    $product->update(['is_available'=>0]);
                }
            }
        }

        Session::put('cart',null);
        Session::put('order_info',null);
        Session::put('pay_order',$number);

        return true;
    }
}
