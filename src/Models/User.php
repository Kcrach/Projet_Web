<?php
namespace pw\Models;

class User{
	protected $login;
	protected $password;
	protected $bloger;

	function __construct($_login, $_password,$_bloger){
		$this->login = $_login;
		$this->password = $_password;
		$this->bloger = $_bloger;
	}

	function getId(){
		return $this->id;
	}

	function getLogin(){
		return $this->login;
	}

	function getPassword(){
		return $this->password;
	}

	function getBloger(){
		return $this->bloger;
	}
}
?>