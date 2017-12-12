<?php
	
namespace DUT\Models;

class Item
{
	protected $id;
	protected $title;
	protected $coche;

	public function __construct($title, $coche){
		$this->title = $title;
		$this->coche = $coche;
	}

	public function getId(){
		return $this->id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getcoche(){
		return $this->coche;
	}

	public function setCoche($coche){
		$this->coche = $coche;
	}

	public function setTitle($title){
		$this->title = $title;
	}
}

?>