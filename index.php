<?php

define("ROOT_DIR", str_replace('\\', '/', __DIR__));

require_once 'bootstrap/bootstrap.php';

use Core\Exceptions\AccessDeniedException;
use Core\Exceptions\MethodNotFoundException;
use Core\Exceptions\RouteNotFoundException;
use Core\Responses\JsonResponse;
use Core\Router;
use Core\Request;
use Core\TokenHandler;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

try {
    if(!(new TokenHandler(Request::method()))->verifyToken()) {
        throw new AccessDeniedException();
    }
    Router::load('routes/web.php')
        ->direct(Request::uri(), Request::method());
} catch (MethodNotFoundException | RouteNotFoundException $e) {
    $fileName = explode('\\', $e->getFile());
    $fileName = str_replace('.php', '', array_pop($fileName));
    $data = [
        'code' => $e->getCode(),
        'message' => $e->getMessage()
    ];
    return new JsonResponse($fileName, $data, $e->getCode());
} catch (AccessDeniedException $e) {
    $data = [
        'code' => $e->getCode(),
        'message' => $e->getMessage()
    ];

    return new JsonResponse('Authorization Error', $data, $e->getCode());
} catch (Throwable $e) {
    $data = [
        'code' => $e->getCode(),
        'message' => $e->getMessage()
    ];

    return new JsonResponse('Throwable: Fatal Error', $data, $e->getCode());
}