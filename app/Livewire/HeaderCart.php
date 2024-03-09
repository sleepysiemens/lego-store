<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class HeaderCart extends Component
{
    public $cartItems = [];
    public $cart = [];
    public $amount = 0;

    protected $listeners = ['UpdateCart'];

    public function UpdateCart()
    {
        $this->cartItems = Session::get('cart');

        if ($this->cartItems != null) {
            foreach ($this->cartItems as $item) {
                $product = Product::query()
                    ->where('products.id', '=', $item['product_id'])
                    ->join('colors', 'colors.bl_num', '=', 'products.color_id')
                    ->select('products.title', 'products.number', 'colors.title as color', 'products.color_id as bl_color', 'products.bricklink_number', 'products.price')
                    ->first();
                $product->setAttribute('amount', $item['amount']);
                $product->setAttribute('total', $item['amount'] * $product->price);

                $this->cart[] = $product;
            }
        }
        $this->amount=count($this->cart);
    }

    public function mount()
    {
        $this->UpdateCart();
        //dd($this->amount);
    }

    public function render()
    {
        return view('livewire.header-cart');
    }
}
