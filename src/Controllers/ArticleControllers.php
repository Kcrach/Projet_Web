<?php
namespace pw\Controllers;

include "classes\Form.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;
use pw\Services\SessionStorage;
use pw\Models\Controllers;

class ArticleController {

    protected $storage;

    public function __construct() {
        $this->storage = new SessionStorage();
    }

    public function createAction(){
    	$form = new Form("formArt","formArt","validerArt.php","post","multipart/form-data");
    	$form->set_input("titleComm", "text","titleArt","Titre",true);
    	$form->set_input("descArt", "text","descArt","Descripti (Facultatif)", false);
    	$form->set_submit("submitArt", "submitArt" , "Valider");

    	return ($form->get_form());
    }

   
}