<?php

namespace Souzajluiz\LaravelEkwanza\Contracts;

use Souzajluiz\Ekwanza\Client;

interface EkwanzaContract
{
    public function client(): Client;
    public function transactions();
    public function customers();
    public function tickets();
    public function gateway();
}