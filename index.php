<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->get('/', 'PropertyPages\\PropertyPagesController::frontAction');
$app->get('/property-list', 'PropertyPages\\PropertyPagesController::propListAction');
$app->get('/category/{cat}', 'PropertyPages\\PropertyPagesController::categoryAction');
$app->get('/listing/{prop}/{name}', 'PropertyPages\\PropertyPagesController::propertyDetailAction');
$app->get('/type/{types}', 'PropertyPages\\PropertyPagesController::typeAction');
$app->post('/signup', 'AuthPages\\AuthPagesController::signupAction');
$app->post('/session', 'AuthPages\\AuthPagesController::sessionAction');
$app->get('/logout', 'AuthPages\\AuthPagesController::logoutAction');
$app->post('/forgetpass', 'AuthPages\\AuthPagesController::forgetpassAction');

$app->get('/faq', 'InfoPages\\InfoPagesController::faqAction');
$app->get('/terms-condition', 'InfoPages\\InfoPagesController::termsConditionAction');
$app->get('/privacy-policy', 'InfoPages\\InfoPagesController::privacyPolicyAction');
$app->get('/contatti', 'InfoPages\\InfoPagesController::contattiAction');
$app->get('/chi-siamo', 'InfoPages\\InfoPagesController::chisiamoAction');
$app->get('/lavora-con-noi', 'InfoPages\\InfoPagesController::lavoraconnoiAction');

$app->get('/dashboard', function () {
    include('dashboard.php');
    return '';
});

$app->post('/post-ad', function () {
    include('post-ad.php');
    return '';
});

$app->run();