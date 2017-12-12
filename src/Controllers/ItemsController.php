<?php

namespace DUT\Controllers;

use DUT\Services\SessionStorage;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class ItemsController
{
	private $storage;

	public function __construct(){
		$this->$storage = new SessionStorage();
	}

	public function addElement(Application $app, $element){
		$this->storage->addElement($element);
	}

	public function getElements(){
		$html = "";
		foreach($this->$storage->getElements() as $key){
			$html .= $key;
		}

    	return new Response($html);
	}

	public function removeElement($index){
		$this->storage->removeElement($index);
	}

	public function addFormAction(){
		
	}
}
?> 