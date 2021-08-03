<?php

use Monolog\Logger;
use League\BooBoo\Handler\LogHandler;

$booboo = new League\BooBoo\BooBoo([]);

$html = new League\BooBoo\Formatter\HtmlFormatter;
$null = new League\BooBoo\Formatter\NullFormatter;
$json = new League\BooBoo\Formatter\JsonFormatter;

$html->setErrorLimit(E_ERROR | E_WARNING | E_USER_ERROR | E_USER_WARNING);
$null->setErrorLimit(E_ALL);
$json->setErrorLimit(E_ERROR | E_WARNING | E_NOTICE | E_USER_ERROR
| E_USER_WARNING | E_USER_NOTICE
);

$booboo->pushFormatter($null);
$booboo->pushFormatter($html);
$booboo->pushFormatter($json);

$booboo->register([
  new LogHandler($container->get(Logger::class))
]); // Registers the handlers
