<?php

use Slim\Container;

$container['view'] = function(Container $c) use ($settings) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig(
        $settings['view']['template_path'],
        $settings['view']['twig']
    );

    $view->addExtension(new Slim\Views\TwigExtension(
        $c->get('router'),
        $c->get('request')->getUri())
    );

    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};

$container['db'] = function(Container $c) use ($settings) {
    return new PDO(''.$settings['db']['driver'].':
        host='.$settings['db']['host'].';
        dbname='.$settings['db']['dbname'],
        $settings['db']['user'],
        $settings['db']['password']
    );
};

$container['logger'] = function(Container $c) use ($settings) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler(
            $settings['logger']['path'],
            \Monolog\Logger::DEBUG)
    );
    return $logger;
};

$container['flash'] = function(Container $c) {
    return new Slim\Flash\Messages;
};

$container['validator'] = function(Container $c) use ($settings) {
    $params = $c['request']->getParams();
    $lang = $settings['lang'];
    return new Valitron\Validator($params, [], $lang['default']);
};

$container['session']   = function(Container $c) {
    return new Pamit\Core\Storage\SessionStorage;
};