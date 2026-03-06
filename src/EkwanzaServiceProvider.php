<?php

namespace Souzajluiz\LaravelEkwanza;

use Illuminate\Support\ServiceProvider;
use Souzajluiz\Ekwanza\{Client, Config};

class EkwanzaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/ekwanza.php',
            'ekwanza'
        );

        $this->app->singleton(EkwanzaManager::class, function ($app) {

            $configValues = $app['config']->get('ekwanza', []);

            $validator = $app['validator']->make($configValues, [
                'app_key' => 'required|string'
            ]);

            if ($validator->fails()) {
                throw new \InvalidArgumentException('Ekwanza config validation failed: ' . $validator->errors()->first());
            }

            $envValue = $configValues['environment'] ?? 'sandbox';
            $environment = $envValue instanceof \Souzajluiz\Ekwanza\Enums\Environment
                ? $envValue
                : (\Souzajluiz\Ekwanza\Enums\Environment::tryFrom($envValue) ?? \Souzajluiz\Ekwanza\Enums\Environment::SANDBOX);

            $config = new Config(
                apiKey: $configValues['app_key'] ?? '',
                notificationToken: $configValues['notification_token'] ?? '',
                merchantRegistrationNumber: $configValues['merchant_registration_number'] ?? '',
                environment: $environment,
                
                // Gateway Auth Credentials (optional if only using Tickets)
                clientId: $configValues['client_id'] ?? '',
                clientSecret: $configValues['client_secret'] ?? '',
                resource: $configValues['resource'] ?? ''
            );

            $ekwanza = new Client($config);

            return new EkwanzaManager($ekwanza);
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