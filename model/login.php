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
	public function inserir($arrDados){
		$this->conmyNFC->insert("login",$arrDados);
	}
	public function alterar($arrDados,$cod){
		$this->conmyNFC->update("login",$arrDados,array("UsuCod"=>$cod));

	}
	public function deletar($cod){
		$this->conmyNFC->delete("login",array("UsuCod"=>$cod));
	}
	public function selecionar(){
		$rowslogin = $this->conmyNFC->getSql("SELECT FROM * LOGIN
			where UsuCod = ".$cod);
		var_dump($rowslogin);
	}
}