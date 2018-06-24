<?php
/**
 * Exemplo de utilização da classe BD para popular a tabela usuário
 */
include 'bd.php';

$oBd = new bd();
//Conecta com o banco
$oBd->conectar();
/*
$oBd->insert('usuario',array(
							'usucod'=>1,
							'usunom'=>'Diego Serfina',	
							'usulog'=>'diego.serafina',
							'ususen'=>md5('diego123'),
							'percod'=>1
						));
$oBd->insert('usuario',array(
							'usucod'=>2,
							'usunom'=>'Carla Floriane',	
							'usulog'=>'carla.floriane',
							'ususen'=>md5('carla123'),
							'percod'=>2
						));
$oBd->insert('usuario',array(
							'usucod'=>3,
							'usunom'=>'Andre Pizzote',	
							'usulog'=>'andre.pizzote',
							'ususen'=>md5('andre123'),
							'percod'=>3
						));
*/
$sql = "select usucod,usunom,usulog,pernom from usuario
				inner join perfil on usuario.percod = perfil.percod order by usunom
		";
$arrUsu = $oBd->getSql($sql);
foreach($arrUsu as $key=>$rowUsu){
	echo "<hr>";
	echo "Nome: ".$rowUsu["USUNOM"]."<br/>";
	echo "Perfil: ".$rowUsu["PERNOM"];
}