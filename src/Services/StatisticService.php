<?php

namespace Src\Services;

use Src\Services\StatisticDependencies\StatisticInterface;

class StatisticService
{
    private array $data = [];

//    something to cache data and to improve performance
//    we would wrap data from geDataFromResource() with dependencies
//    public function __construct(Redis $redis, Serializer $serializer)
//    {
//    }

    public function geDataFromResource(StatisticInterface $service): StatisticService
    {
        $statisticResponse = $service->getResponse();

        $this->data[$statisticResponse->getResourceName()] = $statisticResponse->getResourceData();

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }
}