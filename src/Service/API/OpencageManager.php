<?php


namespace App\Service\API;

class OpencageManager extends AbstractManager
{
    protected $client;

    protected $url = "https://api.opencagedata.com/geocode/v1/json?q=";

    protected $key = "&key=" . API_OPENCAGE_KEY;

    public function __construct()
    {
        parent::__construct($this->url, $this->key);
    }


    public function location($location)
    {
        $response = $this->client->request('GET', $this->url . $location . $this->key);
        $data = $response->toArray();
        if (empty($data['results'][0]['geometry'])) {
            return false;
        } else {
            $geolocation = $data['results'][0]['geometry'];
            return $geolocation;
        }
    }
}
