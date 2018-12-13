<?php

namespace Outright\LaravelAvb;

use Illuminate\Support\ServiceProvider;

class LaravelAvbServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'outright');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'outright');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelavb.php', 'laravelavb');

        // Register the service the package provides.
        $this->app->singleton('laravelavb', function ($app) {
            return new LaravelAvb;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelavb'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelavb.php' => config_path('laravelavb.php'),
        ], 'laravelavb.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/outright'),
        ], 'laravelavb.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/outright'),
        ], 'laravelavb.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/outright'),
        ], 'laravelavb.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
