<?php

namespace App\Livewire;

use Livewire\Component;

class HeaderSearch extends Component
{
    public $is_enabled=false;

    public function toggle()
    {
        $this->is_enabled=!$this->is_enabled;
    }

    public function render()
    {
        return view('livewire.header-search');
    }
}
