<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/container.php';

require_once __DIR__ . '/../booboo.php';

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

include_once __DIR__ . '/../routes/web.php';

$responseFactory = new Laminas\Diactoros\ResponseFactory();
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router   = $router->setStrategy($strategy);

include_once __DIR__ . '/../routes/api.php';

$logger = $container->get('logger')[0];
$logger->notice('Dispatching request');
$response = $router->dispatch($request);
$logger->warning('Emitting response');

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
