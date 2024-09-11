<?php

namespace App\Providers;

use App\Models\Allclass;
use App\Models\Map;
use App\Models\BackImage;
use App\Models\CompanyProfile;
use App\Models\Management;
use App\Models\News;
use App\Models\Notice;
use App\Models\Partner;
use App\Models\Result;
use App\Models\School;
use App\Models\Section;
use App\Models\Social;
use App\Models\Welcome;
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
        view()->share('content', CompanyProfile::first());
        view()->share('welcome', Welcome::first());
       
    }
}
