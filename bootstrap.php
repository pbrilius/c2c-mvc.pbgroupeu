<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";
require_once __DIR__ . '/config/eniac.php';

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"),
 $isDevMode, $isDevMode, $proxyDir, $cache);

$dbParams = array(
    'driver'   => $eniac->get('database.driver'),
    'user'     => $eniac->get('database.username'),
    'password' => $eniac->get('database.password'),
    'dbname'   => $eniac->get('database.database'),
);

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);
