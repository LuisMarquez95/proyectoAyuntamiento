<?php 
class AyuntamientoEnlaces{
    public function EnlacesController(){
        if(isset($_GET['action'])){
            $enlaces = $_GET['action'];
        }else{
            $enlaces = "index.php";
        }

        $respuesta = AyuntamientoEnlacesModel::enlacesModel($enlaces);

        include $respuesta;
    }
}