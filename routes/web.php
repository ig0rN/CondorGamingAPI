<?php

use Core\Router;

/**
 * @var Router $router
 */
$router->get('', 'StatisticController@getStatistic');