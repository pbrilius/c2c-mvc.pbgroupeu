<?php

declare(strict_types=1);

$container = new League\Container\Container();

require_once __DIR__ . '/../bootstrap.php';

use Doctrine\ORM\EntityManagerInterface;

$container->add(EntityManagerInterface::class, $entityManager)->addTag('doctrine.orm');

include_once __DIR__ . '/../monolog.php';
use Monolog\Logger;
$container->add(Logger::class, $logger)->addTag('logger');
