<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contract;
use App\Models\ContractTemplate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.admin', function ($view) {
            $view->with('stats', [
                'contracts_count' => Contract::count(),
                'templates_count' => ContractTemplate::count(),
            ]);
        });
    }
}
