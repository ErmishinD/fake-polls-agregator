<?php

// Autoloader
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..//');
$dotenv->load();

// Config
require_once '../config.php';

// Bootstrap
require_once '../bootstrap.php';

// Routes
require_once '../routes/web.php';
require_once '../app/Router.php';