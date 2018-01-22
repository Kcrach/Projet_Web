<?php  
namespace pw\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use pw\Services\SessionStorage;
use pw\Models\Article;
use pw\Controllers\CommentaireController;

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
		$image = $request->files->get('images');
		$nomImage="";
		if(!is_null($image)){
			$image->move("C:\\xampp\\htdocs\\Projet_Web\\images",$nom . '.PNG');
			$nomImage = $image->getClientOriginalName();
		}

		$article = new Article($nom, $descriptif, $nomImage);

		$em->persist($article);
		$em->flush();

		return $app->redirect($url);
	}

	public function listArticle(Application $app){
		$em = $app['em'];
        $repository = $em->getRepository('pw\\Models\\Article');
        $result = $repository->findBy(array(), array('id' => 'DESC'));
        $retour = array();

        foreach ($result as $key => $value) {
            array_push($retour, $value);
        }

        return $retour;
	}

	public function deleteArticle($id, Application $app){
		$em = $app['em'];
		
        $cc = new CommentaireController();
        $cc->deleteCommentaireArticle($app, $id);

        $itemToRemove = $em->find('pw\\Models\\Article',$id);
        var_dump($itemToRemove);
        if($itemToRemove->getImages() != "")
        	unlink('C:\\xampp\\htdocs\\Projet_Web\\images\\' . $itemToRemove->getNom() . '.PNG');
        $em->remove($itemToRemove);
        $em->flush();


        $url = $app['url_generator']->generate('home');

        return $app->redirect($url);
	}
}
?>