<?php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use pw\Controllers\ItemsController;

$app = new Silex\Application();
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(),['twig.path' => __DIR__ . '/views',]);

$app['connection'] = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => 'projet_web'
];

$app['doctrine_config'] = Setup::createYAMLMetadataConfiguration([__DIR__ . '/config'], true);

$app['em'] = function ($app) {
    return EntityManager::create($app['connection'], $app['doctrine_config']);
};

$app->get('/persons', function () use ($app) {
    $entityManager = $app['em'];
    $repository = $entityManager->getRepository('DUT\\Models\\Person');
});

/**
 * ROUTES
 */
/*$app->get('/', 'DUT\\Controllers\\ItemsController::listAction')
    ->bind('home');*/
$app->get('/', function() use ($app){
	$ic = new ItemsController();
	return $app['twig']->render('liste.html',['names' => $ic->listAction($app)]);
})->bind('home');

$app->get('/create', function() use ($app){
	$ic = new ItemsController();
	return $app['twig']->render('creer.html');});
$app->post('/create', 'pw\\Controllers\\ItemsController::createAction');

$app->get('/remove/{index}', 'pw\\Controllers\\ItemsController::deleteAction');

$app->get('/check/{index}', 'pw\\Controllers\\ItemsController::checkAction');
$app->get('/check/{index}', 'pw\\Controllers\\ItemsController::uncheckAction');

$app->get('/modifier_nom/{index}', 'pw\\Controllers\\ItemsController::modifierNomAction');
$app->post('/modifier_nom/{index}', 'pw\\Controllers\\ItemsController::modifierNomAction');

$app['debug'] = true;
$app->run();

?>