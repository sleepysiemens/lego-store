<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DeliveryType extends Component
{
    public $type;

    public function mount()
    {
        if(Session::has('delivery'))
        {
            $s_delivery=Session::get('delivery');
            if(isset($s_delivery['type']))
            {
                $this->type=$s_delivery['type'];
            }
            else
            {
                $this->type=1;
            }
        }
    }

    public function delivery($type)
    {
        $s_delivery=Session::get('delivery');

        if($type==4)
            $s_delivery['price']=0;

        $s_delivery['type']=$type;
        Session::put('delivery',$s_delivery);

        $this->type=$type;
        $this->dispatch('UpdateDelivery');

    }

    public function render()
    {
        return view('livewire.delivery-type');
    }
}
