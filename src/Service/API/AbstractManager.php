<?php


namespace App\Service\API;



use Symfony\Component\HttpClient\HttpClient;

class AbstractManager
{
    protected $client;

    protected $url = "https://api.windy.com/api/webcams/v2/";

    protected $key = "&key=" . API_KEY;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function webcam($param)
    {
        $response = $this->client->request('GET', $this->url . $param . $this->key);
        $data = $response->toArray();
        $iframeSrc = $data['result']['webcams'][0]['player']['lifetime']['embed'];

        return $iframeSrc;
    }

}