<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CartTotal extends Component
{
    #[On('UpdateCart')]
    #[On('UpdateDelivery')]
    public function render()
    {
        $cart=Session::get('cart');
        $total=0;
        $delivery=0;

        if($cart!=null)
        {
            foreach ($cart as $product_)
            {
                $price=Product::query()->where('id','=',$product_['product_id'])->first()->price;
                $total=$total+($price*$product_['amount']);
            }
        }



        if(Session::get('delivery')!=null)
            $delivery=Session::get('delivery')['price'];

        return view('livewire.cart-total', compact(['total', 'delivery']));
    }
}
