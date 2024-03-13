<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Features\SupportEvents\Event;

class AddToCart extends Component
{
    public $prodict;
    public $is_in_cart=false;
    public $amount=0;
    public function mount($product)
    {
        $this->prodict=$product;
    }

    public function add_to_cart()
    {
        if(Session::get('cart')==null or !isset(Session::get('cart')[0]))
        {
            $cart=collect([['id'=>0, 'product_id'=>$this->prodict->id, 'amount'=>1]]);
            Session::put('cart',$cart);
            $this->dispatch('UpdateCart');
        }
        else
        {
            $cart=Session::get('cart');

            if($cart->where('product_id','=',$this->prodict->id)->first()==null)
            {
                $id=$cart->last()['id']+1;
                $cart[]=['id'=>$id, 'product_id'=>$this->prodict->id, 'amount'=>1];
                Session::put('cart',$cart);
                $this->dispatch('UpdateCart');
            }
        }
    }

    public function increment()
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$this->prodict->id)->first();

        if($cart_elem['amount']<$this->prodict->amount)
        {
            $cart_elem['amount']=$cart_elem['amount']+1;
            $cart[$cart_elem['id']]=$cart_elem;
            Session::put('cart',$cart);
            $this->dispatch('UpdateCart');

        }
    }

    public function decrement()
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$this->prodict->id)->first();

        if($cart_elem['amount']>1)
        {
            $cart_elem['amount']=$cart_elem['amount']-1;
            $cart[$cart_elem['id']]=$cart_elem;
        }
        else
        {
            unset($cart[$cart_elem['id']]);
        }

        Session::put('cart',$cart);
        $this->is_in_cart=false;

        $this->dispatch('UpdateCart');
    }

    public function hand_input($value)
    {
        $cart=Session::get('cart');
        $cart_elem=$cart->where('product_id','=',$this->prodict->id)->first();

        if($value<=$this->prodict->amount and $value>0)
        {
            $cart_elem['amount']=$value;
        }
        elseif($value<1)
        {
            unset($cart[$cart_elem['id']]);
        }
        Session::put('cart',$cart);
        $this->dispatch('UpdateCart');

    }

    public function render()
    {
        if(Session::get('cart')!=null and Session::get('cart')->where('product_id','=',$this->prodict->id)->first()!=null)
        {
            $this->is_in_cart=true;

            $this->amount=Session::get('cart')->where('product_id','=',$this->prodict->id)->first()['amount'];
        }

        return view('livewire.add-to-cart');
    }
}
