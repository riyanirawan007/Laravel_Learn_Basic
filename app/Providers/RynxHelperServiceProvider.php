<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RynxHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path().'/Helpers/RynxHelper/ViewTemplate.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
