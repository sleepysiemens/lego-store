<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DeliveryType extends Component
{
    public $price=0;
    public $type=4;

    public function delivery($type)
    {
        switch ($type)
        {
            case 1:
                $price=200;
                break;
            case 2:
                $price=300;
                break;
            case 3:
                $price=400;
                break;
            case 4:
                $price=0;
                break;
        }

        Session::put('delivery',['type'=>$type, 'price'=>$price]);
        $this->price=$price;
        $this->type=$type;
        $this->dispatch('UpdateDelivery');

    }

    public function render()
    {
        return view('livewire.delivery-type');
    }
}
