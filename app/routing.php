<?php

$app->get('/', 'Pamit\Controllers\HomeController:index')
    ->setName('home');

$app->get('/admin', 'Pamit\Controllers\AdminHomeController:index')
    ->setName('admin');