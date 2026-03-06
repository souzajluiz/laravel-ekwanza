<?php

namespace Souzajluiz\LaravelEkwanza;

use Illuminate\Support\ServiceProvider;
use Souzajluiz\Ekwanza\Client;

class EkwanzaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/ekwanza.php',
            'ekwanza'
        );

        $this->app->singleton(EkwanzaManager::class, function ($app) {

            $config = $app['config']['ekwanza'];

            $client = new Client([
                'app_key' => $config['app_key'],
                'app_secret' => $config['app_secret'],
                'environment' => $config['environment'],
            ]);

            return new EkwanzaManager($client);
        });

        $this->app->alias(EkwanzaManager::class, 'ekwanza');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/ekwanza.php' => config_path('ekwanza.php'),
        ], 'ekwanza-config');
    }
}
