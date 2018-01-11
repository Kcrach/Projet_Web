<?php

namespace pw\Models;

class Article
{
	protected $id;
	protected $nom;
	protected $description;
	protected $images;
	protected $date;

	public function __construct($_nom, $_description="", $_images=array()){
		$this->nom = $nom;
		$this->description = $_description;
		foreach ($_images as $key => $value) {
			$this->images[$key] = $value;
		}
	}

	public function getId(){
		return $this->id;
	}

	public function getNom(){
		return $this->nom;
	}

	public function getDescription(){
		return $this->description;
	}

	public function getImages(){
		return $this->images;
	}

	public function getDate(){
		return $this->date;
	}
}

?>