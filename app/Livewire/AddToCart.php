<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class AddToCart extends Component
{
    public $product;
    public $cart;

    public function mount()
    {
        $this->cart=Session::get('cart');
    }

    public function InitItems($product)
    {
        $this->product=$product;
    }

    public function update_cart()
    {
        Session::put('cart', $this->cart);
        //$this->dispatch('UpdateCart');
    }

    //Первое добавление товара в корзину
    public function add_to_cart()
    {
        if($this->cart==null)
        {
            $this->cart=[['product_id'=>$this->product->id, 'amount'=>1]];
        }
        else
        {
            //Проверка наличия товара в корзине
            if(collect($this->cart)->where('product_id','=',$this->product->id)->first()==null)
            {
                $this->cart[]=['product_id'=>$this->product->id, 'amount'=>1];
            }
        }
        $this->update_cart();
    }

    //Увеличить кол-во в корзине
    public function increment()
    {
        $cart_id=array_search($this->product->id, array_column($this->cart, 'product_id'));

        if($this->cart[$cart_id]['amount']<$this->product->amount)
        {
            $this->cart[$cart_id]['amount']++;
            $this->update_cart();
        }
    }

    public function decrement()
    {
        $cart_id=array_search($this->product->id, array_column($this->cart, 'product_id'));

        if($this->cart[$cart_id]['amount']>1)
        {
            $this->cart[$cart_id]['amount']--;
            $this->update_cart();
        }
        else
        {
            unset($this->cart[$cart_id]);
            $this->update_cart();
        }
    }

    public function hand_input($value)
    {
        $cart_id=array_search($this->product->id, array_column($this->cart, 'product_id'));

        if($value<$this->product->amount)
        {
            if($value<=0)
            {
                unset($this->cart[$cart_id]);
            }
            else
            {
                $this->cart[$cart_id]['amount']=$value;
            }
            $this->update_cart();
        }
    }

    public function render()
    {
        $amount=0;
        if($this->cart!=null)
        {
            if(collect($this->cart)->where('product_id','=',$this->product->id)->first()!=null)
            {
                $is_in_cart=true;
                $amount=collect($this->cart)->where('product_id','=',$this->product->id)->first()['amount'];
            }
            else
            {
                $is_in_cart=false;
            }
        }
        else
        {
            $is_in_cart=false;
        }
        return view('livewire.add-to-cart', compact(['is_in_cart', 'amount']));
    }
}
