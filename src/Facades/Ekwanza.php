<?php

namespace Souzajluiz\LaravelEkwanza\Facades;

use Illuminate\Support\Facades\Facade;

class Ekwanza extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Souzajluiz\LaravelEkwanza\EkwanzaManager::class;
    }
}
