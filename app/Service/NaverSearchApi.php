<?php


namespace App\Service;


use GuzzleHttp\Client;

class NaverSearchApi
{
    protected string $url = 'https://map.naver.com';
//     private string $url = 'https://map.naver.com/v5/api/search?caller=pcweb&query=%EC%84%9C%EC%9A%B8%EC%8B%9C%EC%B2%AD&type=all&searchCoord=126.97420399999992;37.566610300000235&page=1&displayCount=20&isPlaceRecommendationReplace=true&lang=ko';
    protected array $params = [];
    protected Client $client;
    protected int $page = 1;
    protected int $display = 20;
    protected string $lon = '126.97420399999992';
    protected string $lat = '37.566610300000235';
    protected string $query = '%EC%84%9C%EC%9A%B8%EC%8B%9C%EC%B2%AD';

    /**
     * NaverSearchApi constructor.
     */
    public function __construct()
    {
        $this->client = new Client(
            ['base_uri' => $this->url]
        );
        $this->initParams();
    }

    protected function initParams()
    {
        $this->params = [
            'caller' => 'pcweb',
            'query' => "%EC%84%9C%EC%9A%B8%EC%8B%9C%EC%B2%AD",
            // 'query' => $this->query,
            'type' => 'all',
            // 'page' => "$this->page",
            'page' => 1,
            'displayCount' => 20,
            // 'displayCount' => "$this->display",
            'searchCoord' => "126.97420399999992;37.566610300000235",
            'isPlaceRecommendationReplace' => true,
            // 'isPlaceRecommendationReplace' => 'true',
            'lang' => 'ko',
        ];
    }


    public function call()
    {
        $response = $this->client->request('GET', $this->getSearchRoute(), [
            'query' => $this->params
        ]);
        dump($response->getHeaders());
        dump($response->getBody()->getContents());
    }

    protected function getSearchRoute(): string
    {
        return '/v5/api/search';
    }
}
