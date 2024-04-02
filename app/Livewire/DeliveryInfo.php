<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryInfo extends Component
{
    public $lock=false;
    #[On('UpdateDelivery')]
    public function change_lock()
    {
        if(Session::get('delivery')['type']==4)
            $this->lock=true;
        else
        {
            $this->lock = false;
        }
    }


    public function render()
    {
        return view('livewire.delivery-info');
    }
}
