<?php
include "classes\Form.php";

namespace pw\Controllers;

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

    }

   
}