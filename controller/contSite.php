<?php

//controlador par as paginas do site
class contSite{
	
	public function __construct(){
		if(empty($_GET["pagina"])){
		$this ->home();
		
}
		else{
			$this->$_GET["pagina"](); 
		}
	}

	public function home(){
		include MVC_VIEW."/site/homepageX.html";
	}

	public function login(){
		include MVC_VIEW."/site/login.html";
	} 

	public function cadastro(){
		include MVC_VIEW."/site/cadastro.html";
	} 

}
