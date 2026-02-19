<?php

namespace Souzajluiz\LaravelEkwanza\Contracts;

use Ekwanza\Client;

interface EkwanzaContract
{
    public function client(): Client;
    public function transactions();
    public function customers();
    public function tickets();
}
