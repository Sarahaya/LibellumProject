<?php
/*
*	Classe para persistencia da tabela perfil do myNFC
*/
class login{
	private $conmyNFC;//atributo de conexão com o MyNFC

	public function __construct(){
		require_once MVC_MODEL."/conmyNFC.php";
		$this->conmyNFC = new conmyNFC();
	}
	
	public function selecionar($email,$sen){
		$rowslogin = $this->conmyNFC->getSql("SELECT USUCOD, USUNOM FROM USUARIO WHERE USUMAI='$email' AND USUSEN='$sen'");
		return($rowslogin);
	}
}