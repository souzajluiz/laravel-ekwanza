# Ekwanza Laravel

Laravel wrapper for ekwanza-php-sdk.

## Installation

composer require souzajluiz/ekwanza-laravel

## Publish Config

php artisan vendor:publish --tag=ekwanza-config

## .env

EKWANZA_APP_KEY=

EKWANZA_APP_SECRET=

EKWANZA_ENV=sandbox

## Usage

use Ekwanza;

Ekwanza::transactions()->create([
    'amount' => 1000,
    'currency' => 'AOA'
]);
