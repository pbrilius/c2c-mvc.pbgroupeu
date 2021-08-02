<?php

use Psr\Http\Message\ServerRequestInterface;

$responseFactory = new Laminas\Diactoros\ResponseFactory();
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);

// map a route
$router->group('/api/v' . $eniac->get('api.version'), function ($router) {
  $router->map('GET', '/', function (ServerRequestInterface $request): array {
    return [
      'title'   => 'My New Simple API',
      'version' => 1,
    ];
  });
})->setStrategy($strategy);
