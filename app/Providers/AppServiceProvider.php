<?php

namespace App\Providers;

use App\Models\Citizen;
use App\Models\Maternal;
use App\Models\Nutritional;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'maternal'    => Maternal::class,
            'nutritional' => Nutritional::class,
        ]);
    }
}
