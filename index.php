<?php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use pw\Services\SessionStorage;
use pw\Controllers\UserController;

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

$app['session'] = new SessionStorage();

/**
 * ROUTES
 */

$app->get('/', function() use ($app){
	if(!isset($app['session']))
		$app['session']->setConnected(false);
	return $app['twig']->render('index.html', ['session' => $app['session']]);
})->bind('home');

$app->get('/connexion', function() use ($app){
	return $app['twig']->render('connexion.html', ['session' => $app['session']]);
});
$app->post('/connexion','pw\\Controllers\\UserController::connexion');

$app->post('/inscription', 'pw\\Controllers\\UserController::inscription');

$app->get('/user/', function() use ($app){
	return $app['twig']->render('user.html', ['session' => $app['session']]);
});

$app->get('/deconnexion/', function() use ($app){
	$app['session']->setConnected(false);
	$url = $app['url_generator']->generate('home');
	return $app->redirect($url);
});

$app['debug'] = true;
$app->run();
