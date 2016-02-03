<?php

$app->get('/', 'Pamit\Controllers\HomeController:index')
    ->setName('home');

/*
* Admin Route
 */
$app->get('/admin', 'Pamit\Controllers\AdminHomeController:index')
    ->setName('admin');

/*
* Auth Route
 */
$app->get('/admin/signup', 'Pamit\Controllers\AuthController:getSignup')
    ->setName('signup');