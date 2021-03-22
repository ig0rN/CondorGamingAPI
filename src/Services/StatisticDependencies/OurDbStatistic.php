<?php

namespace Src\Services\StatisticDependencies;

class OurDbStatistic implements StatisticInterface
{
//    public function __construct(DB $db)
//    {
//    }

    public function getResponse(): StatisticResponse
    {
//        $resourceData = $this->db->getStatistic();

        return new StatisticResponse('OurDb', 59);
    }
}