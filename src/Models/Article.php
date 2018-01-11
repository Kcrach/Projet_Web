<?php
<<<<<<< HEAD

=======
	
>>>>>>> 79f8edd6ee2e839fb92d26a32bec4acbec7cae0a
namespace pw\Models;

class Article
{
	protected $id;
<<<<<<< HEAD
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
=======
	protected $desc;
	protected $titre;

	public function __construct($titre,$desc){
		$this->titre = $titre;
		$this->desc = $desc;
>>>>>>> 79f8edd6ee2e839fb92d26a32bec4acbec7cae0a
	}

	public function getId(){
		return $this->id;
	}

<<<<<<< HEAD
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
=======
	public function getTitre(){
		return $this->contenu;
	}

	public function getDesc(){
		return $this->desc;
>>>>>>> 79f8edd6ee2e839fb92d26a32bec4acbec7cae0a
	}
}

?>