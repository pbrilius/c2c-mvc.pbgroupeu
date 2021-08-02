<?php

use Psr\Http\Message\ServerRequestInterface;

// map a route
$router->map('GET', '/api/v1', function (ServerRequestInterface $request): array {
    return [
        'title'   => 'My New Simple API',
        'version' => 1,
    ];
});
