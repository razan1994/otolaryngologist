<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\Service;
use App\Models\Treatment;
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

        $treatments = Treatment::latest()->limit(5)->get();
        $contacts = ContactUs::first();
        view()->share([
            'treatments' => $treatments,
            'contacts' => $contacts,
        ]);

    }
}
