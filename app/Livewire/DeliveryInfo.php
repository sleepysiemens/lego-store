<?php

namespace App\Livewire;

use AntistressStore\CdekSDK2\Entity\Requests\DeliveryPoints;
use AntistressStore\CdekSDK2\Entity\Requests\Location;
use AntistressStore\CdekSDK2\Entity\Requests\Tariff;
use AntistressStore\CdekSDK2\Exceptions\CdekV2AuthException;
use AntistressStore\CdekSDK2\Exceptions\CdekV2Exception;
use App\Services\CDEKService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;


class DeliveryInfo extends Component
{
    public $lock=false;
    public $del_type=2;
    public $pvz;

    public $region_search_results=[];
    public $selected_region;
    public $show_regions=false;

    public $city_search_results=[];
    public $selected_city;
    public $show_cities=false;

    public $selected_company;
    public $selected_pvz;
    public $selected_pvz_address;

    public function mount()
    {
        if(Session::has('delivery'))
        {
            $s_delivery=Session::get('delivery');
            //dump($s_delivery);

            if(isset($s_delivery['region']))
            {
                $this->selected_region=$s_delivery['region'];
            }

            if(isset($s_delivery['city']))
            {
                $this->selected_city=$s_delivery['city'];
            }

            if(isset($s_delivery['type']))
            {
                $this->del_type=$s_delivery['type'];
                $this->selected_company=$s_delivery['type'];
                $this->change_lock();
            }

            if(isset($s_delivery['pvz']))
            {
                $this->selected_pvz=$s_delivery['pvz'];
            }

            if(isset($s_delivery['pvz_address']))
            {
                $this->selected_pvz_address=$s_delivery['pvz_address'];
            }
        }
    }

    #[On('UpdateDelivery')]
    public function change_lock()
    {
        $this->del_type=Session::get('delivery')['type'];
        switch ($this->del_type)
        {
                //почта
            case 1:
                $this->lock = false;
                break;
                //cdek
            case 2:
                $this->lock = false;
                $this->cdek_();
                break;
                //boxberry
            case 3:
                $this->lock = false;
                $this->boxberry();
                break;
                //pickup
            case 4:
                $this->lock=true;
                break;
        }

    }

    public function region_search($value)
    {
        $regions=Cache::get('regions');

        $filteredArray = array_filter($regions, function($item) use ($value) {
            return mb_stripos($item, $value) !== false;
        });

        $this->region_search_results=$filteredArray;
        $this->show_regions=true;
    }

    public function select_region($value)
    {
        $this->selected_region=$value;
        $this->show_regions=false;

        $s_delivery=Session::get('delivery');
        $s_delivery['region']=$value;
        Session::put('delivery', $s_delivery);
    }

    public function city_search($value)
    {
        $cities = Cache::remember('cities', 10, function () {
            // Здесь возвращается коллекция объектов, например, через модель Eloquent
            return YourModel::all();
        });
        $filteredCollection = $cities->filter(function ($item) use ($value) {
            $regionCondition = $item->region === $this->selected_region;

            $cityCondition = mb_stripos($item->city, $value) !== false;

            return $regionCondition && $cityCondition;
        });

        $this->city_search_results=$filteredCollection;
        $this->show_cities=true;
    }

    public function select_city($value)
    {
        $this->selected_city=$value;
        $this->show_cities=false;
        $this->change_lock();
        $s_delivery=Session::get('delivery');
        $s_delivery['city']=$value;
        Session::put('delivery',$s_delivery);
    }

    public function cdek_()
    {
        if($this->selected_city!=null)
        {
            $cdek_client = new \AntistressStore\CdekSDK2\CdekClientV2('TEST');
            $request = (new Location())->setCity($this->selected_city);
            $response = $cdek_client->getCities($request);
            $city_code=$response[0]->getCode();
            $requestPvz = (new DeliveryPoints())->setType('PVZ')->setCityCode($city_code);

            try
            {
                $responsePvz = ($cdek_client->getDeliveryPoints($requestPvz));

                $i=0;
                foreach ($responsePvz as $item)
                {
                    $i++;
                    $pvz[$i]['code']=$item->getCode();
                    $pvz[$i]['name']=$item->getName();
                    $pvz[$i]['address']=$item->getLocation()->getAddress();
                    $pvz[$i]['work_time']=$item->getWorkTime();
                    $pvz[$i]['postal_code']=$item->getLocation()->getPostalCode();
                    $pvz[$i]['work_time_list']=$item->getWorkTimeList();
                    $pvz[$i]['work_time_exception']=$item->getWorkTimeExceptions();
                    $pvz[$i]['address_comment']=$item->getAddressComment();
                }
                $this->pvz=json_encode($pvz);

                $tariff = (new Tariff())
                    ->setTariffCode(483) // Указывает код тарифа для расчета
                    ->setCityCodes(270, $city_code) // Экспресс-метод установки кодов отправителя и получателя
                    ->setPackageWeight(500)
                    ->addServices(['PART_DELIV'])
                ;

                $s_delivery=Session::get('delivery');
                $s_delivery['price']=$cdek_client->calculateTariff($tariff)->getTotalSum();
                Session::put('delivery',$s_delivery);
                $this->dispatch('UpdateDeliveryPrice');
            }
            catch (CdekV2Exception $exception)
            {
                $this->pvz=null;
            }
        }
    }

    public function boxberry()
    {
        if($this->selected_city!=null)
        {
            $response = Http::get("https://api.boxberry.ru/json.php?token=d6f33e419c16131e5325cbd84d5d6000&method=ListCities&CountryCode=643");
            $data = $response->json();

            $desiredCity = $this->selected_city;


            foreach ($data as $element) {
                if ($element['UniqName'] === $desiredCity) {
                    $city_code = $element['Code'];
                    break;
                }
            }

            $response = Http::get("https://api.boxberry.ru/json.php?token=d6f33e419c16131e5325cbd84d5d6000&method=ListPoints&prepaid=1&CityCode={$city_code}&CountryCode=643");
            $this->pvz = $response->json();
        }
    }

    public function select_cdek_pvz($pvz, $pvz_address)
    {
        $this->selected_pvz=$pvz;
        $this->selected_pvz_address=$pvz_address;
        $this->selected_company=2;

        $s_delivery=Session::get('delivery');
        $s_delivery['pvz']=$pvz;
        $s_delivery['pvz_address']=$pvz_address;
        Session::put('delivery',$s_delivery);

    }

    public function select_boxberry_pvz($pvz, $pvz_address, $code)
    {
        $this->selected_pvz=$pvz;
        $this->selected_pvz_address=$pvz_address;
        $this->selected_company=3;

        $response = Http::get("https://api.boxberry.ru/json.php?token=d6f33e419c16131e5325cbd84d5d6000&method=DeliveryCosts&weight=500&targetstart=06113&target={$code}&ordersum=0&deliverysum=0&height=120&width=80&depth=50&paysum=100");
        $data = $response->json();

        $s_delivery=Session::get('delivery');
        $s_delivery['price']=$data['price'];
        Session::put('delivery',$s_delivery);
        $this->dispatch('UpdateDeliveryPrice');

        $s_delivery=Session::get('delivery');
        $s_delivery['pvz']=$pvz;
        $s_delivery['pvz_address']=$pvz_address;
        Session::put('delivery',$s_delivery);
    }

    public function reset_pvz()
    {
        $this->selected_pvz=null;
        $this->selected_pvz_address=null;
    }

    public function render()
    {
        return view('livewire.delivery-info');
    }
}
