<?php
	
namespace pw\Models;

class Commentaire
{
	protected $idArticle;
	protected $id;
	protected $contenu;

	public function __construct($contenu,$idArticle){
		$this->contenu = $contenu;
		$this->idArticle = $idArticle;
	}

	public function getId(){
		return $this->id;
	}

	public function getContenu(){
		return $this->contenu;
	}

	public function getIdArticle(){
		return $this->idArticle;
	}

	public function setCommId($id){
		 $this->id = $id;
	}
}
?>