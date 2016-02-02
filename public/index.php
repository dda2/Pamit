<?php

$app = require dirname(__DIR__).'/app/bootstrap.php';

$container  = $app->getContainer();

$settings   = $container->get('settings');

if ($settings['mode'] === 'development') {
    $settings['displayErrorDetails'] = true;
}

// set zona waktu default
if (isset($settings['timezone'])) {
    date_default_timezone_set($settings['timezone'] ?: 'UTC');
}

if (!isset($_SESSION)) {
    session_name($settings['appname']);
    session_start();
}

require_once APP_DIR.'dependencies.php';

// require_once APP_DIR.'middlewares.php';

require_once APP_DIR.'routing.php';

$app->run();