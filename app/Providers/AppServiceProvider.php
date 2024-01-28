<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Slider;
use App\Observers\ClientObserver;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Schema;
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
        $sliderBanner = Slider::where('status',1)->first();

        if (!$sliderBanner) {
            $sliderBanner = Slider::first();
        }

        View::composer('*', function ($view) use($sliderBanner){
            $view->with('sliderBanner', $sliderBanner);
        });

        Schema::defaultStringLength(191);
    }
}
