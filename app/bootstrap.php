<?php

define('ROOT_DIR',  dirname(__DIR__).'/');
define('APP_DIR',   __DIR__.'/');
define('WWW_DIR',   ROOT_DIR.'public/');

require ROOT_DIR.'vendor/autoload.php';

return new Slim\App([
    'settings' => require_once APP_DIR.'settings.php'
]);