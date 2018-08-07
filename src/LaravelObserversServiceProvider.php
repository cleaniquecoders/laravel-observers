<?php

namespace CleaniqueCoders\LaravelObservers;

use Illuminate\Support\ServiceProvider;

class LaravelObserversServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Configuration
         */
        $this->publishes([
            __DIR__ . '/config/document.php'  => config_path('document.php'),
            __DIR__ . '/config/hashids.php'   => config_path('hashids.php'),
            __DIR__ . '/config/observers.php' => config_path('observers.php'),
        ], 'observers');
        $this->mergeConfigFrom(
            __DIR__ . '/config/observers.php', 'observers'
        );
        $this->mergeConfigFrom(
            __DIR__ . '/config/document.php', 'document'
        );
        $this->mergeConfigFrom(
            __DIR__ . '/config/hashids.php', 'hashids'
        );

        \CleaniqueCoders\LaravelObservers\Observers\Kernel::make()->observes();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
