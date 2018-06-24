<?php

/**
 * Exemplo de utilização da classe BD
 */
include 'bd.php';

$oBd = new bd();
//Conecta com o banco
$oBd->conectar();
$oBd->debugOn();
//Exemplo de insert
/*$oBd->insert('perfil',array(
					  	//'percod'=>2,
					 	'pernom'=>"Estagiário",
					  	'peride'=>"est"
							));
*/
$sql = "select * from perfil order by pernom";
$arrPerfil = $oBd->getSql($sql);

foreach($arrPerfil as $key=>$rowPerfil){
		echo "<hr/>";
		echo "Nome do Perfil: ".$rowPerfil["PERNOM"];
}


exit();
//Exemplo de update
$oBd->update('cliente',
			  array('nome'=>'Pedro','idade'=>21,'cidade'=>'campinas'),
			  array('codigo'=>13)
		);
 
//Exemplo de delete
$oBd->delete('item_pedido',array('nf_cod'=>7,'it_cod'=>58));
