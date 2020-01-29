<?php 
class AyuntamientoEnlacesModel{
    static public function enlacesModel($enlaces){
        if($enlaces == 'inicio' ||
            $enlaces == 'login' ||
            $enlaces == 'salir' ||
            $enlaces == 'grupos' ||
            $enlaces == 'adminusuarios'
        ){
            $module = "views/modules/".$enlaces.".php";
        }else{
            $module = "views/modules/login.php";
        }

        return $module;
    }
}