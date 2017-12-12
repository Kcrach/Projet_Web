<?php

namespace DUT\Controllers;

use DUT\Services;
use Symfony\Component\HttpFoundation\Response;

class ItemsController
{
	private $storage;

	public function __construct(){
		$storage = new SessionStorage();
	}

	public function addElement($element){
		this.storage->addElement($element);
	}

	public function getElements(){
		this.storage->getElement();
	}

	public function removeElement($index){
		this.storage->removeElement($index);
	}

}

?> 