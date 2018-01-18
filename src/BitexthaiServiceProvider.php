<?php

namespace BugIM\bitexthai;

use Illuminate\Support\ServiceProvider;

class BitexthaiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bitexthai.php' => config_path('bitexthai.php')
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/bitexthai.php', 'bitexthai');
        $this->app->bind('bitexthai', function () {
            return new BitexthaiAPI(config('bitexthai'));
        });

    }
}