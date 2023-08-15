<?php

// Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..//');
$dotenv->load();

// Config
require_once __DIR__ . '/../config.php';

// Bootstrap
require_once __DIR__ . '/../bootstrap.php';

// Routes
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../app/Router.php';
