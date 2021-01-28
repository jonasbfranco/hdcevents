<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//inserido porque estou usando uma versao do mysql antiga
use Illuminate\Support\Facades\Schema;



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
        //inserido porque estou usando uma versao do mysql antiga
        Schema::defaultStringLength(191);
    }
}
