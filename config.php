<?php

// App
defined('APP_ROOT') or define('APP_ROOT', dirname(__FILE__));

// DB Params
defined('DB_HOST') or define('DB_HOST', $_ENV['DB_HOST']);
defined('DB_USER') or define('DB_USER', $_ENV['DB_USER']);
defined('DB_PASSWORD') or define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
defined('DB_NAME') or define('DB_NAME', $_ENV['DB_NAME']);