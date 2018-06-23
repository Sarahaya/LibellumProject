<?php
//Arquivo com a classe de controller
class controller{

	public function __construct(){
		
		$controller = (empty($_GET["cont"]))?DEFAULT_CONTROLLER:$_GET["cont"];
		include MVC_CONTROLLER."/".$controller.".php";
		new $controller();

		//echo MVC_CONTROLLER."/".$_GET["cont"].".php";
		//include MVC_CONTROLLER."/site.php"
		//echo "Local dos arquivos de controle ".MVC_CONTROLLER;
	}


}