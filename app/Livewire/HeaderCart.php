<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class HeaderCart extends Component
{

    #[On('UpdateCart')]
    public function render()
    {
        $cartItems = Session::get('cart');
        $cart=[];

        if ($cartItems != null) {
            foreach ($cartItems as $item) {
                $product = Product::query()
                    ->where('products.id', '=', $item['product_id'])
                    ->join('colors', 'colors.bl_num', '=', 'products.color_id')
                    ->select('products.title', 'products.number', 'colors.title as color', 'products.color_id as bl_color', 'products.bricklink_number', 'products.price')
                    ->first();
                $product->setAttribute('amount', $item['amount']);
                $product->setAttribute('total', $item['amount'] * $product->price);

                $cart[] = $product;
            }
        }
        $amount=count($cart);

        return view('livewire.header-cart', compact(['amount','cart']));
    }
}
