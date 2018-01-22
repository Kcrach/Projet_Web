<?php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use pw\Services\SessionStorage;
use pw\Controllers\ArticleController;
use pw\Controllers\CommentaireController;

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

$session = new SessionStorage();

$app->get('/', function() use ($app){
	if(!isset($app['session']))
		$app['session']->setConnected(false);
	$ac = new ArticleController();
	$cc = new CommentaireController();
	return $app['twig']->render('index.html', ['session' => $app['session'], 'articles' => $ac->listArticle($app), 'commentaires' => $cc->listCommentaire($app)]);
})->bind('home');

$app->get('/contact', function() use ($app){
	return $app['twig']->render('contact.html', ['session' => $app['session']]);
});

$app->get('/articles', function() use ($app){
	return $app['twig']->render('articles.html', ['session' => $app['session']]);
});

$app->post('/articles','pw\\Controllers\\ArticleController::ajoutArticle');

$app->post('/articles','pw\\Controllers\\ArticleController::ajoutArticle');

$app->post('/ajoutCommentaire', 'pw\\Controllers\\CommentaireController::createCommentaire');

$app->post('/ajoutCommentaire','pw\\Controllers\\CommentaireControllers::createCommAction');

$app->get('/supprimer/{id}','pw\\Controllers\\ArticleController::deleteArticle');

$app->get('/supprimerCom/{id}','pw\\Controllers\\CommentaireController::deleteCommentaire');

$app['debug'] = true;
$app->run();
