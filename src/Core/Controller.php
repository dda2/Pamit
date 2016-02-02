<?php

namespace Pamit\Core;

use Slim\Container;

abstract class Controller
{

    private $container = null;

    public function __construct(Container $container = null)
    {
        if (null !== $container) {
            $this->container = $container;
        }

        $view   = $this->container->get('view');
        $logger = $this->container->get('logger');
        $db     = $this->container->get('db');
    }

    public function __get($var)
    {
        return $this->container->get($var);
    }
}
