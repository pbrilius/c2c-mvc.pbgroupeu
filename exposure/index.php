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

include_once __DIR__ . '/../routes/api.php';

$logger = $container->get('logger')[0];
$logger->notice('Dispatching request');

use League\Uri\Http;
use League\Uri\UriString;

define('DNS', 80);
$uri = Http::createFromString($request->getUri()->getScheme()
  . '://'
  . $request->getUri()->getHost()
  . ($request->getUri()->getPort() === DNS ? '' : ':' .$request->getUri()->getPort())
  . $request->getUri()->getPath()
);

$uriParsed = UriString::parse((string) $uri);
$uriParsed['path'] = str_replace('index.php/', '', $uriParsed['path']);
$builtUpUrl = UriString::build($uriParsed);

$logger->info('Global call to possible VHOST HTTPD on Open Source Foundation', [
  'URL' => (string) $builtUpUrl
]);

$response = $router->dispatch($request);
$logger->warning('Emitting response');

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
