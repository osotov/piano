<?php

namespace App\Providers;

use App\StackExchangeSearch\GuzzleSearchService;
use App\StackExchangeSearch\SearchService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * Class StackExchangeSearchServiceProvider
 * @package App\Providers
 */
class StackExchangeSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SearchService::class, function($app) {
            return new GuzzleSearchService(
                new Client([
                    'base_uri' => 'http://api.stackexchange.com/',
                    'timeout'  => 2.0,
                ])
            );
        });
    }
}
