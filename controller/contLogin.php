<?php

//controlador de perfil

class contLogin{
	private $login;
	public function __construct(){
		require_once MVC_MODEL."/login.php";
		$this->login = new login();
		$this->nom_conta();
	}

	private function nom_conta(){
		include MVC_VIEW."/site/signin-loginX.html";
	}

	public function autenticar(){
		 if($login->consultaUsuario()){
			 Echo "deu certo";
		 }
	}

}