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

    public function createCommentaire(Request $request, Application $app){
        $em = $app['em'];
        $url = $app['url_generator']->generate('home');

        $contenu = $request->get('nom', null);
        $idArticle = $request->get('idArticle', null);

        $com = new Commentaire($contenu, $idArticle);

        $em->persist($com);
        $em->flush();

        return $app->redirect($url);
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

    public function deleteAction(){

    }

    public function updateAction(){

    }

   
}