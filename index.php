<?php
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->get('/', function () {
    include('frontpage.php');
    return '';
});

$app->post('/forgetpass', function () {
    include('forgetpass.php');
    return '';
});

$app->get('/property-list', function () {
    include('property-list.php');
    return '';
});

$app->get('/category/{cat}', function ($cat) use($app) {
    $cat = $app->escape($cat);
    include('property-list.php');
    return '';
});

$app->get('/type/{types}', function ($types) use($app) {
    $types = $app->escape($types);
    include('property-list.php');
    return '';
});

$app->get('/listing/{id}/{name}', function($id) use($app) {
    $prop = $app->escape($id);
    include('property-detail.php');
    return '';
});

$app->get('/dashboard', function() {
    include('dashboard.php');
    return '';
});

$app->get('/logout', function() {
    include('logout.php');
    return '';
});

$app->get('/post-ad', function() {
    include('post-ad.php');
    return '';
});

$app->post('/post-ad', function() {
    include('post-ad.php');
    return '';
});

$app->post('/session', function() {
    include('session.php');
    return '';
});

$app->get('/session', function() {
    include('session.php');
    return '';
});

$app->post('/signup', function() {
    include('signup.php');
    return '';
});

$app->get('/faq', function() {
    include('faq.php');
    return '';
});

$app->get('/terms-condition', function() {
    include('terms-condition.php');
    return '';
});

$app->get('/privacy-policy', function() {
    include('privacy-policy.php');
    return '';
});

$app->get('/contatti', function() {
    include('contatti.php');
    return '';
});

$app->get('/chi-siamo', function() {
    include('chi-siamo.php');
    return '';
});

$app->get('/lavora-con-noi', function() {
    include('lavora-con-noi.php');
    return '';
});

$app->run();