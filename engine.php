<?php

use League\Plates\{Engine, Template\Theme};

$plates = Engine::fromTheme(Theme::hierarchy([
    Theme::new(__DIR__ . '/templates/main', 'Main'), // parent
    Theme::new(__DIR__ . '/templates/user', 'User'), // child
    Theme::new(__DIR__ . '/templates/administration', 'Administration'), // child2
]));

// Load any additional extensions
$plates->loadExtension(new League\Plates\Extension\Asset(__DIR__ . '/exposure/'));
