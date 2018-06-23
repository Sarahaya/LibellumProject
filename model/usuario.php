<?php
/*
*	Classe para persistencia da tabela perfil do myNFC
*/
class usuario{
	private $conmyNFC;//atributo de conexão com o MyNFC

	public function __construct(){
		require_once MVC_MODEL."/conmyNFC.php";
		$this->conmyNFC = new conmyNFC();

	}
	public function inserir($arrDados){
		$this->conmyNFC->insert("usuario",$arrDados);
	}
	public function alterar($arrDados,$cod){
		$this->conmyNFC->update("usuario",$arrDados,array("UsuCod"=>$cod));

	}
	public function deletar($cod){
		$this->conmyNFC->delete("usuario",array("UsuCod"=>$cod));
	}
	public function selecionar(){
		$rowsusuario = $this->conmyNFC->getSql("SELECT FROM * USUARIO
			where UsuCod = ".$cod);
		var_dump($rowsusuario);
	}
}