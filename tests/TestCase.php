<?php

namespace Mattsplat\Readmore\Tests;

use Illuminate\Foundation\Application;
use Laravel\Nova\NovaCoreServiceProvider;
use Mattsplat\Readmore\FieldServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            NovaCoreServiceProvider::class,
            FieldServiceProvider::class,
        ];
    }
}
