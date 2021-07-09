<?php


namespace App\Service;


use GuzzleHttp\Client;

class NaverSearchApi
{
    protected string $url = 'https://map.naver.com/v5/api/search';
    // private string $url = 'https://map.naver.com/v5/api/search?caller=pcweb&query=%EC%84%9C%EC%9A%B8%EC%8B%9C%EC%B2%AD&type=all&searchCoord=126.97420399999992;37.566610300000235&page=1&displayCount=20&isPlaceRecommendationReplace=true&lang=ko';
    protected array $params = [];
    protected Client $client;
    protected int $page = 1;
    protected int $display = 20;
    protected string $lon = '126.97420399999992';
    protected string $lat = '37.566610300000235';
    protected string $query = '';

    /**
     * NaverSearchApi constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    protected function initParams()
    {
        $this->params = [
            'isPlaceRecommendationReplace' => 'true',
            'lang' => 'ko',
            'caller' => 'pcweb',
            'type' => 'all',
            'page' => $this->page,
            'displayCount' => $this->display,
            'searchCoord' => "$this->lat;$this->lon",
            'query' => $this->query,
        ];
    }


    public function call()
    {
        $response = $this->client->request('GET', $this->url);
        dump($response->getBody()->getContents());
    }
}
