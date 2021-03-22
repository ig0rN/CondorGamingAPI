<?php

namespace Src\Services\StatisticDependencies;

class StatisticResponse
{
    private string $resourceName;
    private int $resourceData;

    /**
     * StatisticResponse constructor.
     * @param string $resourceName
     * @param int $resourceData
     */
    public function __construct(string $resourceName, int $resourceData)
    {
        $this->resourceName = $resourceName;
        $this->resourceData = $resourceData;
    }

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    /**
     * @return int
     */
    public function getResourceData(): int
    {
        return $this->resourceData;
    }
}