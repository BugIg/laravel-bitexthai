<?php

namespace BugIg\Bitexthai;

use Illuminate\Support\ServiceProvider;

class BitexthaiAPIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bitexthaiapi.php' => config_path('bitexthaiapi.php')
        ], 'bitexthaiapi');
    }



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/bitexthaiapi.php', 'bitexthaiapi');

        $this->app->singleton(BitexthaiAPI::class, function () {
            return new BitexthaiAPI();
        });
    }

    public function provides() {
        return ['BitexthaiAPI'];
    }
}