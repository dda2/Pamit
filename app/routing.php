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

$app->post('/admin/signup', 'Pamit\Controllers\AuthController:postSignup')
    ->setName('post.signup');

$app->get('/admin/signin', 'Pamit\Controllers\AuthController:getSignin')
    ->setName('signin');

$app->get('/admin/article/add', 'Pamit\Controllers\admin\ArticleController:getAddArticle')
    ->setName('article');

$app->post('/admin/article/add', 'Pamit\Controllers\admin\ArticleController:postArticle')
    ->setName('article.post');