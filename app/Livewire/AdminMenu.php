<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class AdminMenu extends Component
{
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin-menu', compact(['categories']));
    }
}
