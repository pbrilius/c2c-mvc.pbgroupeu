<?php

use League\Config\Configuration;
use Nette\Schema\Expect;

// Define your configuration schema
$config = new Configuration([
    'database' => Expect::structure([
        'driver' => Expect::anyOf('mysql', 'postgresql', 'sqlite')->required(),
        'host' => Expect::string()->default('localhost'),
        'port' => Expect::int()->min(1)->max(65535),
        'database' => Expect::string()->required(),
        'username' => Expect::string()->required(),
        'password' => Expect::string()->nullable(),
    ]),
    'logging' => Expect::structure([
        'enabled' => Expect::bool()->default($_ENV['DEBUG'] == true),
        'path' => Expect::string()->assert(function ($path) { return \is_writeable($path); })->required(),
    ]),
]);

// Set the values somewhere
$userProvidedValues = [
    'database' => [
        'driver' => 'mysql',
        'port' => 3306,
        'host' => 'localhost',
        'database' => 'getloan_com',
        'username' => 'getloan_doctrine',
        'password' => 'èóíßù5íWêïË4458é',
    ],
    'logging' => [
        'path' => __DIR__ . '/log/app.log',
    ],
];

// Merge those values into your configuration schema:
$config->merge($userProvidedValues);

// Read the values and do stuff with them
if ($config->get('logging.enabled')) {
    file_put_contents($config->get('logging.path'), 'Connecting to the database on ' . $config->get('database.host'));
}
