<?php

namespace pw\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use pw\Services\SessionStorage;
use pw\Models\Controllers;

class CommentaireController {

    protected $storage;

    public function __construct() {
        $this->storage = new SessionStorage();
    }

    public function createAction(Application $app){
    	$sqlServices = new SQLServices($app);

        $sqlServices->addCommentary(new Commentary($_POST["postID"], null,
            $_SESSION['user']['username'], $_POST["content"], $formattedDate));
        
        return new RedirectResponse($app["url_generator"]->generate("{idPost}", ["idPost" => $_POST["postID"]]));
    }

    public function listAction(Application $app){
		$entityManager = $app['em'];
        $repository = $entityManager->getRepository('pw\\Models\\Commentaire');
        $html ="<li>";
        $comm = $repository->findAll();

        foreach ($comms as $comm) {

        	$html .= "<p>".$comm->getContenu()."</p>";

        }

        $html .="</li>";

        return new response($html);
    }

    public function deleteAction(){

    }

    public function updateAction(){

    }

   
}