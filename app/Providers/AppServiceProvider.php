<?php

namespace App\Providers;


use App\Observers\NewsPostObserver;
use App\Observers\NewsCategoryObserver;

use App\News;
use App\NewsCategory;

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
      News::observe(NewsPostObserver::class);
      NewsCategory::observe(NewsCategoryObserver::class);
    }
}
