<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrders extends Component
{
    use WithPagination;

    public function render()
    {
        $orders=Order::paginate(12);

        return view('livewire.admin-orders', compact(['orders']));
    }
}
