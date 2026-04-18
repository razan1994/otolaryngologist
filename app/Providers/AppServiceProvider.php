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

        $treatments = \App\Models\Treatment::latest()->take(5)->get();
        $contacts = \App\Models\ContactUs::first();
        view()->share([
            'treatments' => $treatments,
            'contacts' => $contacts,
        ]);

    }
}
