<?php
namespace App\StackExchangeSearch;

use GuzzleHttp\Client;

/**
 * Class GuzzleSearchService
 * @package App\StackExchangeSearch
 */
class GuzzleSearchService implements SearchService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $query
     * @param array $options
     * @return mixed
     */
    public function search($query, $options = [])
    {
        $defaultOptions = [
            'order' => 'desc',
            'sort' => 'activity',
            'site' => 'stackoverflow',
        ];

        // in case if search will be more customizable
        $options = array_merge($defaultOptions, $options);

        $options['intitle'] = $query;

        $response = $this->client->request(
            'GET',
            '/2.2/search',
            ['query' => $options]
        );

        return \GuzzleHttp\json_decode($response->getBody()->getContents())->items;
    }
}