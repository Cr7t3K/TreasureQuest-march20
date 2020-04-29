<?php


namespace App\Service\API;

class WindyManager extends AbstractManager
{
    protected $client;

    protected $url = "https://api.windy.com/api/webcams/v2/list/nearby=";

    protected $params = ",20?show=webcams:player";

    protected $key = "&key=" . API_WINDY_KEY;

    public function __construct()
    {
        parent::__construct($this->url, $this->key);
    }

    public function webcam($coord)
    {
        $geoLoc = implode(",", $coord);
        $response = $this->client->request('GET', $this->url . $geoLoc . $this->params . $this->key);
        $data = $response->toArray();
        $arrayCam = $data['result']['webcams'];

        return $arrayCam;
    }
}
