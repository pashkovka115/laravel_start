<?php

namespace App\Providers;

use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Models\CategoryTour;
use Modules\Admin\Models\Page;
use Modules\Admin\Models\Tour;
use Modules\Admin\Models\TourVariant;
use Route;

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
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale(config('app.locale'));

    }
}
