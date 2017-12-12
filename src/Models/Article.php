<?php
	
namespace pw\Models;

class Article
{
	protected $id;
	protected $desc;
	protected $titre;

	public function __construct($titre,$desc){
		$this->titre = $titre;
		$this->desc = $desc;
	}

	public function getId(){
		return $this->id;
	}

	public function getTitre(){
		return $this->contenu;
	}

	public function getDesc(){
		return $this->desc;
	}
}

?>