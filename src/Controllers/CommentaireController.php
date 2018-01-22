<?php

namespace pw\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use pw\Services\SessionStorage;
use pw\Models\Controllers;
use Symfony\Component\HttpFoundation\RedirectResponse;
use pw\Models\Commentaire;

class CommentaireController {

    protected $storage;

    public function __construct() {
        $this->storage = new SessionStorage();
    }

    public function createCommentaire(Request $request, Application $app){
        $em = $app['em'];
        $url = $app['url_generator']->generate('home');

        $contenu = $request->get('contenu', null);
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

    public function deleteCommentaireArticle(Application $app, $idArticle){
        $em = $app['em'];
        $repository = $em->getRepository('pw\\Models\\Commentaire');
        $itemToRemove = $repository->findBy(array('idArticle' => $idArticle));

        foreach ($itemToRemove as $item) {
            $em->remove($item);
        }

        $em->flush();

        $url = $app['url_generator']->generate('home');

        return $app->redirect($url);   
    }

    public function deleteCommentaire(Application $app, $id){
        $em = $app['em'];

        $itemToRemove = $em->find('pw\\Models\\Commentaire',$id);
        $em->remove($itemToRemove);
        $em->flush();


        $url = $app['url_generator']->generate('home');

        return $app->redirect($url);
    }

   
}