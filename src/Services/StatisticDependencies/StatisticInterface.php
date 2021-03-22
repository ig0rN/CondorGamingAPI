<?php

namespace Src\Services\StatisticDependencies;

interface StatisticInterface
{
    public function getResponse(): StatisticResponse;
}