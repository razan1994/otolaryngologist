<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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

        Paginator::useBootstrap();
        session()->put('locale', 'ar');

        // app()->setLocale(session()->get('locale'));

        // $services2=Service::latest()->limit(4)->get();
        // view()->share([
        //     'services2' => $services2,

        // ]);

    }
}
