<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Order;
use Livewire\Component;

class AdminMenu extends Component
{
    public function render()
    {
        $categories=Category::all();
        $new_orders_cnt=Order::query()->where('status','<',2)->count();
        return view('livewire.admin-menu', compact(['categories', 'new_orders_cnt']));
    }
}
