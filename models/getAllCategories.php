<?php
require_once 'conexion.php';
class CtaerogiarClass{
    /* Obtener los departamentos */
    static public function getCategoriesAll(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cat_departamentos" );
        
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }else{
            return false;
        }
        $stmt->close();
    }
    /* Obtener los niveles de usuario */
    static public function getNivelesAll(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cat_niveles" );
        
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }else{
            return false;
        }
        $stmt->close();
    }
}