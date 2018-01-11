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

    public function createAction(){
    	$form = new Form("formComm","formComm","validerComm.php","post","multipart/form-data");
    	$form->set_input("titleComm", "text","titleComm","Titre",true);
    	$form->set_input("descComm", "text","descComm","Descripti (Facultatif)", false);
    	$form->set_submit("submitComm", "submitComm" , "Valider");

    	return ($form->get_form());
    }

    public function listAction(){

    }

    public function deleteAction(){

    }

    public function updateAction(){

    }

   
}