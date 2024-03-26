<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DeliveryInfo extends Component
{
    public function render()
    {
        if(!Cache::has('cities') and Cache::has('regions'))
        {
            $cities=Cache::get('cities');
            $regions=Cache::get('regions');
        }
        else
        {
            if (file_exists(public_path('cities_list.json')))
            {
                $cities=collect(json_decode(file_get_contents(public_path('cities_list.json'))));
                $regions=$cities->pluck('region')->unique()->values()->all();
                $cities=$cities->pluck('city')->unique()->values()->all();
                Cache::put('cities', $cities);
                Cache::put('regions', $regions);
            }
            else
            {
                $cities=[];
                $regions=[];
            }

        }

        return view('livewire.delivery-info', compact(['cities', 'regions']));
    }


}
