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

        
    }
}
?>