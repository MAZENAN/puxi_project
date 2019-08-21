<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Site;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $site = Site::find(1);
        view()->share('site',$site);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
