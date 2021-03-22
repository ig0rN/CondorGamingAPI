<?php

namespace Src\Controllers;

use Core\JsonResponse;

class StatisticController
{
    /**
     * Show homepage
     */
    public function getStatistic()
    {
        return new JsonResponse('Success', ['message' => 'test test'], 400);
    }
}