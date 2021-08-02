<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$logger = new Logger('Web app');
$logger->pushHandler(new StreamHandler($eniac->get('logging.path')
  . '/'
  . $eniac->get('logging.file'), Logger::NOTICE));
