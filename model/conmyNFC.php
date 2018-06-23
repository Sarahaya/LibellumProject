<?php

require_once PATH_LIBS."/bd.php";
class conmyNFC extends bd{
	public function __construct(){
		bd::__construct();
		$this->conectar(
			array(
				'host'=>'localhost',
				'usuario'=>'root',
				'senha'=>'456845',
				'database'=>'myNFC'
			)
		);
	}
}