<?php

namespace Outright\LaravelAvb\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelAvb extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelavb';
    }
}
