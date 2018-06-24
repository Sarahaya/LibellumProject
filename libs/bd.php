<?php
/**
 * Classe de Abstração para conexão com banco de dados
 * @author Eu
 * @since 09/06/2015 - V1.01
 *  
 */
//inclui a path zend
//-----------------------------------------
//Config do ZF
define("PATH_ZF",'/var/www/html/libs');
set_include_path(get_include_path().PATH_SEPARATOR.PATH_ZF);
//Classe DB da Zend
include(PATH_ZF.'/Zend/Db.php');
//-----------------------------------------
//Define as contantes padrão para conexão 
//(podem ser definidas dentro da aplicação do projeto)
if(!defined('BD_TIPO'))define('BD_TIPO','mysql');
if(!defined('BD_HOST'))define('BD_HOST','localhost');
if(!defined('BD_USUARIO'))define('BD_USUARIO','root');
if(!defined('BD_SENHA'))define('BD_SENHA','vertrigo');
if(!defined('BD_PORTA'))define('BD_PORTA','3306');
if(!defined('BD_DATABASE'))define('BD_DATABASE','myapp');

class bd{
	private $tipo;		//Recebe o tipo do banco (mysql,oracle,sqlserver,postgre,firebird,mongodb,acces,xml,txt)
	private $host;		//Local onde se encontra o servidor de banco de dados
	private $usuario;	//Usuário de conexão
	private $senha;		//Senha do usuário para conexão
	private $porta;		//Porta para conexao com o banco
	private $database;	//Nome do banco de dados
	private $con;		//Objeto de conexão
	private $debug;		//Define o modo para debulhar (true/false)
	
	/**
	 * Construtor da classe
	 */
	public function __construct(){
		$this->tipo =     	BD_TIPO;
		$this->host = 	    BD_HOST;
		$this->usuario = 	BD_USUARIO;
		$this->senha = 	 	BD_SENHA;
		$this->porta = 		BD_PORTA;
		$this->database = 	BD_DATABASE;
		$this->debug = true;
	}

	/**
	 * Define o modo do debug
	 */
	public function debugOn(){
		$this->debug = true;
	}

	 /**  Método para conectar com o banco de dados
	 * Array com as configurações do banco
	 */
	public function conectar($arrConfig = null){
		if(!empty($arrConfig['tipo']))$this->tipo 			= $arrConfig['tipo'];
		if(!empty($arrConfig['host']))$this->host 			= $arrConfig['host'];
		if(!empty($arrConfig['usuario']))$this->usuario 	= $arrConfig['usuario'];
		if(!empty($arrConfig['senha']))$this->senha 		= $arrConfig['senha'];
		if(!empty($arrConfig['porta']))$this->porta 		= $arrConfig['porta'];
		if(!empty($arrConfig['database']))$this->database 	= $arrConfig['database'];
		//definição para trabalhar em maiúsculo (nomes de tabelas e de campos)
		$_optionsDb = array(
    		Zend_Db::CASE_FOLDING => Zend_Db::CASE_UPPER
		);

		//Definição de tipos de bancos para o ZEND
		$_arrTipo['mysql'] 	= 'pdo_mysql';
		$_arrTipo['oracle'] = 'pdo_orcl';
		$_arrTipo['sqlserver'] = 'pdo_mssql';

		//Definição das configurações da ZEND Db para conexão com o banco
		$_arrConfig = array(
			"host"		=> $this->host,
			"username"	=> $this->usuario,
			"password"	=> $this->senha,
			"dbname"	=> $this->database,
			"adapter"	=> $_arrTipo[$this->tipo],
			"options"	=> $_optionsDb 
		);
		//Gera a conexão com o banco
		$this->con = Zend_Db::factory(
						$_arrConfig["adapter"],
						$_arrConfig	
						);
		//Retorna a conexão
		$this->con->getConnection();
	}

	/**
	 * Define o Banco de dados
	 */
	public function setDatabase(){

	}

	/**
	 * Retorna o resultado de uma consulta SQL
	 */
	public function getSql($sql){
		$oRes = $this->con->query($sql);
		return($oRes->fetchAll());
	}

	/**
	 * Insere um registro na tabela
	 * INSERT INTO $tabela ($campos) VALUES ($valores)
	 * registro.matricula = 101022
	 * registro.nome = 'João Das Dores'
	 * $arrDados['matricula'] = 101022
	 * $arrDados['nome'] = 'João das Dores' 
	 */
	public function insert($tabela,$arrDados){
		//Percorre uma variável estruturada
		foreach($arrDados as $campo=>$valor){
			//SE(CONDIÇÃO == TRUE;VALOR SE VERDADEIRO;VALOR SE FALSO)
			//Compor a variável $campos
			(empty($campos))?$campos = $campo : $campos.= ", ".$campo;
			//Compor a variável $valores
			(empty($valores))? $valores = $valor : $valores.= ", ".$valor;
		}
		if($this->debug){
			$sql = "INSERT INTO ".$tabela." (".$campos.") VALUES (".$valores.")";
		 	echo '<h1>'.$sql.'</h1>';
		}
		$this->con->insert($tabela,$arrDados);
	}

	/**
	 * Altera os dados de um registro em uma tabela
	 * $arrDados['nome'] = 'Maria das Dores';
	 * $arrDados['login'] = 'maria123'
	 * $arrCondicao['matricula'] = 101022
	 */
	public function update($tabela,$arrDados,$arrCondicao){
		//UPDATE USUARIO SET nome = Maria das Dores , login = maria123
		//monta a variável $dados
		foreach($arrDados as $campo=>$valor){
			(empty($dados))? $dados = $campo."=".$valor:$dados.= ", ".$campo."=".$valor;
		}
		//Monta a variável $condicao
		foreach($arrCondicao as $campo=>$valor){
			(empty($condicao))?$condicao = $campo."=".$valor:$condicao.= " AND ".$campo."=".$valor;
		}
		if($this->debug){
			$sql = "UPDATE ".$tabela." SET ".$dados." WHERE ".$condicao;
			echo '<h1>'.$sql.'</h1>';
		}
	}

	/**
	 * Deleta o registro de uma tabela
	 */
	 public function delete($tabela,$arrCondicao){
	 	//DELETE FROM tabela WHERE  condicao
	 	foreach($arrCondicao as $campo=>$valor){
	 		(empty($condicao))?$condicao = $campo."=".$valor : $condicao .= " AND ".$campo."=".$valor;
	 	}
	 	if($this->debug){
	 		$sql = "DELETE FROM ".$tabela." WHERE ".$condicao;
	 		echo '<h1>'.$sql.'</h1>';
	 	}
	 }
}