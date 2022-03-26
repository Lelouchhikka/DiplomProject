<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public static $locale='en';
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(session()->has(self::$locale)=='en'){
            App::setLocale(self::$locale);
        }
        if(session()->has(self::$locale)=='ru'){
            App::setLocale(self::$locale);
            dd(App::getLocale());
        }
    }
}
