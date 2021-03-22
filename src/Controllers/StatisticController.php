<?php

namespace Src\Controllers;

use Core\Responses\JsonResponse;
use Src\Services\StatisticDependencies\AmazonStatistic;
use Src\Services\StatisticDependencies\GoogleStatistic;
use Src\Services\StatisticDependencies\OurDbStatistic;
use Src\Services\StatisticService;

class StatisticController
{
    /**
     * Show homepage
     */
    public function getStatistic()
    {
       $statisticService = new StatisticService();

        $statisticService
            ->geDataFromResource(new GoogleStatistic())
            ->geDataFromResource(new OurDbStatistic())
            ->geDataFromResource(new AmazonStatistic());

        return new JsonResponse('Success', $statisticService->getData(), 200);
    }
}