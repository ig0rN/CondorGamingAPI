<?php

namespace Src\Services\StatisticDependencies;

class StatisticResponse
{
    private string $resourceName;
    private int $resourceData;

    public function __construct(string $resourceName, int $resourceData)
    {
        $this->resourceName = $resourceName;
        $this->resourceData = $resourceData;
    }

    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    public function getResourceData(): int
    {
        return $this->resourceData;
    }
}