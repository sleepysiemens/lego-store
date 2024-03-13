<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartPage extends Component
{

    public function delete_product($id)
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$id)->first();
        unset($cart[$cart_elem['id']]);
        Session::put('cart',$cart);
        $this->dispatch('UpdateCart');
    }

    public function increment($id)
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$id)->first();

        if($cart_elem['amount']<Product::query()->where('id','=',$id)->first()->amount)
        {
            $cart_elem['amount']=$cart_elem['amount']+1;
            $cart[$cart_elem['id']]=$cart_elem;
            Session::put('cart',$cart);
            $this->dispatch('UpdateCart');
        }
    }

    public function decrement($id)
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$id)->first();

        if($cart_elem['amount']>1)
        {
            $cart_elem['amount']=$cart_elem['amount']-1;
            $cart[$cart_elem['id']]=$cart_elem;
        }
        elseif($cart_elem['amount']<=1)
        {
            unset($cart[$cart_elem['id']]);
        }
        Session::put('cart',$cart);
        $this->dispatch('UpdateCart');
    }

    public function hand_input($params)
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$params[1])->first();

        if($params[0]<1)
        {
            unset($cart[$cart_elem['id']]);
        }

        if($params[0]<=Product::query()->where('id','=',$params[1])->first()->amount)
        {
            $cart_elem['amount']=$params[0];
            $cart[$cart_elem['id']]=$cart_elem;
        }

        Session::put('cart',$cart);
        $this->dispatch('UpdateCart');
    }

    public function render()
    {
        $cart_=Session::get('cart');
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

        return view('livewire.cart-page', compact(['cart']));
    }
}
