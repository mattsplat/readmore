<?php

namespace Mattsplat\Readmore\Tests;

use Mattsplat\Readmore\FieldServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            \Laravel\Nova\NovaCoreServiceProvider::class,
            FieldServiceProvider::class,
        ];
    }
}
