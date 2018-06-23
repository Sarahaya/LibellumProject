<?php

//controlador de perfil

class contNFC{
	private $nfc;
	public function __construct(){
		require_once MVC_MODEL."/nfc.php";
		$this->nfc = new nfc();

		if(!empty($_REQUEST["action"])){
			switch($_REQUEST["action"]){
				//Inserir
				case "i": $this->inserir_NFC();
				break;
				//excluir
				case "e": $this->excluir_NFC();
				break;
				//selecionar
				case "s": $this->selecionar_NFC();
				break;
			}
		}
	}

	private function inserir_NFC(){
		$res = array();
		if(empty($_POST["Nfcend"]))$res["error"] = "Endereço de origem da NFC não informada";
		if(empty($_POST["Nfcnum"]))$res["error"] = "Numero de origem da NFC não informada";
		if(empty($_POST["Nfcide"]))$res["error"] = "Identificação do emitente não informada";
		if(empty($_POST["Nfcdan"]))$res["error"] = "Documento auxiliar da nota fiscal eletronica não informado";
		if(empty($_POST["Nfccda"]))$res["error"] = "Chave de acesso não informada";
		if(empty($_POST["Nfcndo"]))$res["error"] = "Natureza da operação não informada";
		if(empty($_POST["Nfcpau"]))$res["error"] = "Protocolo de autorização de uso não informado";
		if(empty($_POST["Nfcies"]))$res["error"] = "Inscrição estadual não informada";
		if(empty($_POST["Nfccnp"]))$res["error"] = "CNPJ não informado";
		if(empty($res["error"])){
			//foi tudo
			$this->perfil->inserir(
				array(
					  "Nfcend"=>$_POST["Nfcend"],
					  "Nfcnum"=>$_POST["Nfcnum"],
					  "Nfcide"=>$_POST["Nfcide"],
					  "Nfcdan"=>$_POST["Nfcdan"],
					  "Nfccda"=>$_POST["Nfccda"],
					  "Nfcndo"=>$_POST["Nfcndo"],
					  "Nfcpau"=>$_POST["Nfcpau"],
					  "Nfcies"=>$_POST["Nfcies"],
					  "Nfccnp"=>$_POST["Nfccnp"],
					)
			);//aqui termina o inserir
			$res["msg"] = "Nota Fiscal inserida com sucesso";
		}
		else{
			$res["msg"] = "Erro ao inserir";
		}
		echo json_encode($res);
		var_dump($res);
	}
	private function excluir_NFC(){
		$res = array();
		if(empty($_POST["Nfccod"]))$res["error"] = "Codigo da NFC não informada";
		if(empty($res["error"])){
			//eba, podemos excluir
		$this->perfil->deletar($_POST["Nfccod"]);
		$res["msg"] = "A NFC ".$_POST["Nfccod"]." foi excluida com sucesso";
		}
		else{
			$res["msg"] = "Erro ao excluir a NFC";
		}
		echo json_encode($res);
	}

	private function selelcionar_NFC(){
		var_dump($this->NFC->selecionar($_REQUEST["Nfccod"]));
	}
}
