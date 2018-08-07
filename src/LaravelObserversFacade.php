<?php

namespace CleaniqueCoders\LaravelObservers;

/*
 * This file is part of laravel-observers
 *
 * @license MIT
 * @package laravel-observers
 */

use Illuminate\Support\Facades\Facade;

class LaravelObserversFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'LaravelObservers';
    }
}
