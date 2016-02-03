<?php

$app->get('/', 'Pamit\Controllers\HomeController:index')
    ->setName('home');

/*
* Admin Route
 */
$app->get('/admin', 'Pamit\Controllers\AdminHomeController:index')
    ->setName('admin');

$app->get('/admin/flash', 'Pamit\Controllers\AdminHomeController:flash')
    ->setName('admin.flash');
/*
* Auth Route
 */
$app->get('/admin/signup', 'Pamit\Controllers\AuthController:getSignup')
    ->setName('signup');

/*
* article Route
 */
$app->get('/admin/article/add', 'Pamit\Controllers\admin\ArticleController:index')
    ->setName('article');

$app->post('/admin/article/add', 'Pamit\Controllers\admin\ArticleController:postArticle')
    ->setName('article.post');
