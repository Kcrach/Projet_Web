<?php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use pw\Services\SessionStorage;

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
	$app['session']->setConnected(false);
	return $app['twig']->render('index.html', ['connected' => $app['session']->isConnected()]);
})->bind('home');

$app->get('/connexion', function() use ($app){
	$app['session']->setConnected(true);
	return $app['twig']->render('index.html', ['connected' => $app['session']->isConnected()]);
});

$app['debug'] = true;
$app->run();
