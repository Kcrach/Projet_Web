<?php
namespace pw\Models;

class Article
{
	protected $id;
	protected $nom;
	protected $description;
	protected $images;
	protected $date;

	public function __construct($_nom, $_description="", $_images=""){
		$this->nom = $_nom;
		$this->description = $_description;
		$this->images = $_images;
		$this->date = date("Y-m-d H:i:s");
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