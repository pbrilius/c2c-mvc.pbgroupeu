<?php
// Create new Plates engine
$templates = new League\Plates\Engine(__DIR__ . '/templates/');

// Load any additional extensions
$templates->loadExtension(new League\Plates\Extension\Asset(__DIR__ . '/exposure/'));
