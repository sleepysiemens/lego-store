<?php

namespace App\Http\Controllers;

use App\Services\CacheService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $cacheService;
    public function __construct(CacheService $cacheService)
    {
        $this->cacheService=$cacheService;
    }
}
