<?php

namespace pw\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use pw\Services\SessionStorage;
use pw\Models\Controllers;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use pw\Models\Commentaire;

class CommentaireController {

    protected $storage;

    public function __construct() {
        $this->storage = new SessionStorage();
    }

<<<<<<< HEAD:src/Controllers/CommentaireController.php
    public function createCommentaire(Request $request, Application $app){
        $em = $app['em'];
        $url = $app['url_generator']->generate('home');

        $contenu = $request->get('nom', null);
        $idArticle = $request->get('idArticle', null);

        $com = new Commentaire($contenu, $idArticle);

        $em->persist($com);
        $em->flush();

        return $app->redirect($url);
=======
    public function createCommAction(Application $app){
    	$sqlServices = new SQLServices($app);

        $sqlServices->addComm(new Commentaire($_POST["postID"], null,
            $_SESSION['user']['username'], $_POST["content"], $formattedDate));
        
        return new RedirectResponse($app["url_generator"]->generate("{idArticle}", ["idArticle" => $_POST["postID"]]));
>>>>>>> 2da709a27aef9d19a3534fdfe3fcacccca3a93f1:src/Controllers/CommentaireControllers.php
    }

    public function listCommentaire(Application $app){
		$entityManager = $app['em'];
        $repository = $entityManager->getRepository('pw\\Models\\Commentaire');
        $retour = array();
        $comm = $repository->findAll();

        foreach ($comm as $key => $value) {
            array_push($retour, $value);
        }

        return $retour;
    }

    public function deleteCommAction(){
        $sqlServices = new SQLServices($app);

        $sqlServices->removeCommentary($idArticle, $id);

        return new RedirectResponse($app["url_generator"]->generate("{idPost}", ["idPost" => $idPost]));
    }

    public function updateAction(){

    }

   
}