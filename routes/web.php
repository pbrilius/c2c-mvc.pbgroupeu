<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$router->map('GET', '/', function (ServerRequestInterface $request) use ($container, $eniac): ResponseInterface {

    $templates = $container->get('engine')[0];
    $template = $templates->make('user::index');

    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write($template->render([
      'title' => $eniac->get('app.label'),
      'target' => 'User',
    ]));
    return $response;
});
