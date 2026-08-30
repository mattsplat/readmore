<?php

namespace Mattsplat\Readmore;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('readmore', __DIR__.'/../dist/js/field.js');
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
