<?php

namespace App\StackExchangeSearch;

/**
 * Interface SearchService
 * @package App\StackExchangeSearch
 */
interface SearchService
{
    /**
     * @param $query
     * @param array $options
     * @return mixed
     */
    public function search($query, $options = []);
}