<?php

use Souzajluiz\Ekwanza\Enums\Environment;

return [
    'app_key' => env('EKWANZA_APP_KEY'),
    'client_id' => env('EKWANZA_CLIENT_ID'),
    'client_secret' => env('EKWANZA_CLIENT_SECRET'),
    'resource' => env('EKWANZA_RESOURCE'),
    'notification_token' => env('EKWANZA_NOTIFICATION_TOKEN'),
    'merchant_registration_number' => env('EKWANZA_MERCHANT_REGISTRATION_NUMBER'),
    'environment' => Environment::SANDBOX,
];