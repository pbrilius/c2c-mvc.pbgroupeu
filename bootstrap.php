<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode, $isDevMode, $proxyDir, $cache);

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'getloan_doctrine',
    'password' => 'èóíßù5íWêïË4458é',
    'dbname'   => 'getloan_com',
);

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);
