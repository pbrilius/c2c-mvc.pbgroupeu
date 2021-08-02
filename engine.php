<?php
// Create new Plates engine
$templates = new League\Plates\Engine(__DIR__ . '/templates/');

$templates->addfolder('admin', __DIR__ . '/templates/admin');
$templates->addfolder('shared', __DIR__ . '/templates/shared');
$templates->addfolder('user', __DIR__ . '/templates/user');

// Load any additional extensions
$templates->loadExtension(new League\Plates\Extension\Asset(__DIR__ . '/exposure/'));
