<?php

namespace App\Livewire;

use App\Models\Category;
use App\Services\RenderCatalogue;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Catalogue extends Component
{
    use WithPagination;

    public $sort='id';
    public $sort_method='asc';
    public $filter=[];

    public function mount($filter)
    {
        $this->filter=$filter;
    }

    public function sorting($method)
    {
        switch ($method)
        {
            default:
                $this->sort='id';
                $this->sort_method='asc';
                break;
            case 'price_low_to_high':
                $this->sort='products.price';
                $this->sort_method='asc';
                break;
            case 'price_high_to_low':
                $this->sort='products.price';
                $this->sort_method='desc';
                break;
            case 'is_available':
                $this->sort='products.amount';
                $this->sort_method='desc';
                break;
        }
    }

    public function gotoPage($page)
    {
        $filter=$this->filter;
        $filter['page']=$page;
        return redirect()->route('shop.index',$filter);
    }

    public function nextPage()
    {
        $filter=$this->filter;
        if(isset($filter['page']))
            $filter['page']=$filter['page']+1;
        else
            $filter['page']=2;
        return redirect()->route('shop.index',$filter);
    }

    public function previousPage()
    {
        $filter=$this->filter;
        $filter['page']=$filter['page']-1;

        return redirect()->route('shop.index',$filter);
    }

    public function render(RenderCatalogue $renderCatalogue)
    {
        //получаем отсортированные товары
        $products=$renderCatalogue->get_products($this->sort, $this->sort_method, $this->filter);

        $products=$products->paginate(9);

        //категории
        $categories=Category::all();

        //Цвета
        $colors=$renderCatalogue->get_colors();

        //Количество товаров
        $amount=$renderCatalogue->get_amount();

        return view('livewire.catalogue', compact(['products','categories', 'colors', 'amount']));
    }
}
