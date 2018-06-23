<?php
//Constantes para definição do caminho até o MVC
define("MVC_MODEL","/model");//Define o local da pasta model
define("MVC_CONTROLLER","/controller");//Define o local da pasta controller
define("MVC_VIEW","/view");//Define o local da pasta view
define("DEFAULT_CONTROLLER","controller/contSite.php");
define("PATH_LIBS",'/var/www/html/libs');

include MVC_MODEL."controller.php";

new controller();
