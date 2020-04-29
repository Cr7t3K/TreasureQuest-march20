<?php


namespace App\Service\API;

use Symfony\Component\HttpClient\HttpClient;

abstract class AbstractManager
{
    protected $client;

    protected $url;

    protected $key;

    public function __construct(string $url, string $key)
    {
        $this->client = HttpClient::create();
        $this->url = $url;
        $this->key = $key;
    }
}
