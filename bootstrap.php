<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
// $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer yaml or XML
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode, $isDevMode, $proxyDir, $cache);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'getloan_doctrine',
    'password' => 'èóíßù5íWêïË4458é',
    'dbname'   => 'getloan_com',
);

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);
