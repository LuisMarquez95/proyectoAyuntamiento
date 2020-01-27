<?php 
/* Modelos */
require_once "models/enlaces.php";
require_once "models/ingreso.php";
require_once "models/getAllCategories.php";
require_once "models/registroUsuarios.php";

/*Controllers*/
require_once "controllers/enlaces.php";
require_once "controllers/template.php";
require_once "controllers/ingreso.php";
require_once "controllers/getDepartamentosController.php";
require_once "controllers/registroUsuarios.php";
/*Clases y Objetos*/

$cms = new AyuntamientoTemplateController();
$cms->template();