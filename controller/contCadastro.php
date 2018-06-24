<?php

//controlador de CADASTRO

class contUsuario{
	private $usuario;
	public function __construct(){
		require_once MVC_MODEL."/usuario.php";
		$this->usuario = new usuario();

		if(!empty($_REQUEST["action"])){
			switch($_REQUEST["action"]){
				//Inserir
				case "i": $this->inserir_usuario();
				break;
				//excluir
				case "e": $this->excluir_usuario();
				break;
				//selecionar
				case "s": $this->selecionar_usuario();
				break;
			}
		}
	}

	private function inserir_usuario(){
		$res = array();
		if(empty($_POST["UsuNom"]))$res["error"] = "Nome não informado";
		if(empty($_POST["UsuCpf"]))$res["error"] = "Numero CPF não informado ou Invalido";
		if(empty($_POST["UsuMai"]))$res["error"] = "Email não informado ou inexistente";
		if(empty($_POST["UsuTel"]))$res["error"] = "Numero de telefone não informado ou inexistente";
		if(empty($_POST["UsuCel"]))$res["error"] = "Numero de celular não informado ou inexistente";
		if(empty($_POST["UsuReg"]))$res["error"] = "Região não informada";
		if(empty($_POST["UsuDatM"]))$res["error"] = "Mês não informado";
		if(empty($_POST["UsuDatD"]))$res["error"] = "Dia não informado";
		if(empty($_POST["UsuDatA"]))$res["error"] = "Ano não informado";
		if(empty($_POST["UsuSen"]))$res["error"] = "Senha não informada ou não atende aos requisitos exigidos pelo sistema";

		if(empty($res["error"])){
			//Tudo OK
			$this->usuario->inserir(
				array(
					  "UsuNom"=>$_POST["UsuNom"],
					  "UsuCpf"=>$_POST["UsuCpf"],
					  "UsuMai"=>$_POST["UsuMai"],
					  "UsuTel"=>$_POST["UsuTel"],
					  "UsuCel"=>$_POST["UsuCel"],
					  "UsuReg"=>$_POST["UsuReg"],
					  "UsuDat"=>$_POST["UsuDatA"],
					  "UsuDat"=>$_POST["UsuDatD"],
					  "UsuDat"=>$_POST["UsuDatM"],
					  "UsuSen"=>$_POST["UsuSen"],
					)
			);//aqui termina o inserir
			$res["msg"] = "Usuario Cadastrado com Sucesso";
		}
		else{
			$res["msg"] = "Erro ao cadastrar, Verifique a congruencia de todos os campos";
		}
		echo json_encode($res);
		var_dump($res);
	}
	private function excluir_usuario(){
		$res = array();
		if(empty($_POST["UsuCod"]))$res["error"] = "Codigo do Usuario não foi informado corretamente";
		if(empty($res["error"])){
			//agora podemos excluir
		$this->usuario->deletar($_POST["UsuCod"]);
		$res["msg"] = "O perfil".$_POST["UsuCod"]." foi excluido com sucesso";
		}
		else{
			$res["msg"] = "Erro ao excluir o Usuario";
		}
		echo json_encode($res);
	}

	private function selelcionar_usuario(){
		var_dump($this->usuario->selecionar($_REQUEST["UsuCod"]));
	}
}
