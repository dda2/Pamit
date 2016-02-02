<?php

$app->get('/', 'Pamit\Controllers\HomeController:index')
    ->setName('home');