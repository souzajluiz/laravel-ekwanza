<?php

namespace Souzajluiz\LaravelEkwanza;

use Souzajluiz\Ekwanza\Client;
use Souzajluiz\LaravelEkwanza\Contracts\EkwanzaContract;

class EkwanzaManager implements EkwanzaContract
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function transactions()
    {
        return $this->client->transactions();
    }

    public function customers()
    {
        return $this->client->customers();
    }

    public function tickets()
    {
        return $this->client->tickets();
    }
}
