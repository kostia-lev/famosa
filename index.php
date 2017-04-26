<?php
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

/*$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/app.db',
    ),
));*/

$app['debug'] = true;

/*$app->get('/', function () {
    include('frontpage.php');
    return '';
});*/
$app->get('/', 'PropertyPages\\PropertyPagesController::frontAction');
$app->get('/property-list', 'PropertyPages\\PropertyPagesController::propListAction');
$app->get('/category/{cat}', 'PropertyPages\\PropertyPagesController::categoryAction');
$app->get('/type/{types}', 'PropertyPages\\PropertyPagesController::typeAction');

$app->post('/forgetpass', function () {
    include('forgetpass.php');
    return '';
});

/*$app->get('/property-list', function () {
    include('property-list.php');
    return '';
});*/

/*$app->get('/category/{cat}', function ($cat) use($app) {
    $cat = $app->escape($cat);
    include('property-list.php');
    return '';
});*/

/*$app->get('/type/{types}', function ($types) use($app) {
    $types = $app->escape($types);
    include('property-list.php');
    return '';
});*/

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

$app->get('/faq', 'InfoPages\\InfoPagesController::faqAction');
$app->get('/terms-condition', 'InfoPages\\InfoPagesController::termsConditionAction');
$app->get('/privacy-policy', 'InfoPages\\InfoPagesController::privacyPolicyAction');
$app->get('/contatti', 'InfoPages\\InfoPagesController::contattiAction');
$app->get('/chi-siamo', 'InfoPages\\InfoPagesController::chisiamoAction');
$app->get('/lavora-con-noi', 'InfoPages\\InfoPagesController::lavoraconnoiAction');


$app->run();