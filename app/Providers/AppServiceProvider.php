<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CDEKService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CDEKService::class, function ($app) {
            return new CDEKService(/* Если ваш сервис требует аргументы, укажите их здесь */);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
