<?php
	
namespace pw\Models;

class Commentaire
{
	protected $id;
	protected $contenu;

	public function __construct($contenu){
		$this->contenu = $contenu;
	}

	public function getId(){
		return $this->id;
	}

	public function getContenu(){
		return $this->contenu;
	}
}

?>