<?php

namespace App\Providers;

use App\Models\Document;
use App\Models\Setting;
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
        view()->share('setting', Setting::orderBy('created_at', 'desc')->limit(1)->get()->first());
        view()->share('document', Document::orderBy('id', 'desc')->latest()->get()->first());
    }
}
