<?php

namespace Src\Controllers;

use Core\Responses\XmlResponse;

class StatisticController
{
    /**
     * Show homepage
     */
    public function getStatistic()
    {
        return new XmlResponse('Success', ['message' => 'test test'], 400);
    }
}