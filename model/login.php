<?php
/*
*	Classe para persistencia da tabela perfil do myNFC
*/
class login{
	private $conmyNFC;//atributo de conexão com o MyNFC

	public function __construct(){
		require_once MVC_MODEL."/Database.php";
 		$db = Database::conexao();
	}
	public function consultaUsuario(){
		$mail = $_POST[inputemail];
		$psw = $_POST[inputpassword];

		$select = $db->query("SELECT UsuMai,UsuSen FROM USUARIO");
		$result = $select->fetchAll();
		foreach($result as $row){
	//		echo $row['UsuMai'].'<br />';
	//		echo $row['UsuSen'].'<br />';
		}
		if ($row[UsuMai] == $mail && $row[UsuSen]== $psw) {
			return true;
		}
		else {
			return false;
		}
	}
}

?>