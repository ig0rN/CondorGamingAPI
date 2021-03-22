<?php

require_once ROOT_DIR . '/vendor/autoload.php';

use Core\{App, Database};

$dbParams = require_once ROOT_DIR . '/config/database.php';

//App::bind('db', Database::getInstance(
//    $dbParams['type'], $dbParams['host'], $dbParams['dbname'], $dbParams['username'], $dbParams['password']
//));