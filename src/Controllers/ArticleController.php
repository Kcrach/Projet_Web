<?php  
namespace pw\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use pw\Services\SessionStorage;
use pw\Models\Article;

class ArticleController{
	protected $storage;

	public function __construct() {
		$this->storage = new SessionStorage();
	}

	public function ajoutArticle(Request $request, Application $app){
		$em = $app['em'];
		$url = $app['url_generator']->generate('home');

		$nom = $request->get('nom', null);
		$descriptif = $request->get('descriptif', null);
		$images = $request->get('images', null);

		$article = new Article($nom, $descriptif, $images);

		$em->persist($article);
		$em->flush();

		return $app->redirect($url);
	}
}
?>