<?php

namespace Src\Services\StatisticDependencies;

// in this service we could implement as much API methods as we want if that method is connected with Google
class AmazonStatistic implements StatisticInterface
{
//    /**
//     * AmazonStatistic constructor
//     */
//    public function __construct(Guzzle $client, array $paramsFromConfig)
//    {
//    }

    public function getResponse(): StatisticResponse
    {
        $resourceData = $this->getData();

        return new StatisticResponse('AmazonStatistic', $resourceData);
    }

    private function getData(): int
    {
        // connect on google and return data
        // if we don't have data, return empty array

        return 1500;
    }
}