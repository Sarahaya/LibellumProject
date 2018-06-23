<?php
/*
*	Classe para persistencia da tabela perfil do myapp
*/
class nfc{
	private $conmyNFC;//atributo de conexão com o Myapp

	public function __construct(){
		require_once MVC_MODEL."/conmyNFC.php";
		$this->conmyNFC = new conmyNFC();

	}
	public function inserir($arrDados){
		$this->conmyNFC->insert("nfc",$arrDados);
	}
	public function alterar($arrDados,$cod){
		$this->conmyNFC->update("nfc",$arrDados,array("Nfccod"=>$cod));

	}
	public function deletar($cod){
		$this->conmyNFC->delete("nfc",array("Nfccod"=>$cod));
	}
	public function selecionar(){
		$rowsPerfil = $this->conmyNFC->getSql("SELECT FROM * NFC
			where Nfccod = ".$cod);
		var_dump($rowsPerfil);
	}
}