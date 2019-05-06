<?php

namespace Mattsplat\Readmore;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;



class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('readmore', __DIR__ . '/../dist/js/field.js');
            Nova::style('readmore', __DIR__ . '/../dist/css/field.css');
        });

        Text::macro('readMore', function ($options = []) {
            $request = resolve(NovaRequest::class);

            if (
                is_null($request->resourceId) &&
                !$request->isCreateOrAttachRequest() &&
                !$request->isUpdateOrUpdateAttachedRequest()) {

                $this->withMeta(['options' => $options]);
                $this->component = 'read-more';
            }

            return $this;
        });
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
