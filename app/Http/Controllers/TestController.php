<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class TestController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.boxberry.ru/json.php?token=d6f33e419c16131e5325cbd84d5d6000&method=ListCities&CountryCode=643');
        $data = $response->json();

        $desiredCity = "Новосибирск";


        foreach ($data as $element) {
            if ($element['UniqName'] === $desiredCity) {
                // Найден нужный элемент, делайте что-то с ним
                // Например, вы можете сохранить его в переменную или выполнить нужные действия
                $foundElement = $element;
                break; // Для прерывания цикла после нахождения нужного элемента
            }
        }

        dd($foundElement['Code']);
    }
}
