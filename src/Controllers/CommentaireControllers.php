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

   
}