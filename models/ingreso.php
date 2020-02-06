<?php
require_once 'conexion.php';
class IngresoSistemaModel{
    /*Funcion para verificar que el usuario exista*/
    static public function revisarModel($datosIngreso, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre_usuario FROM $tabla WHERE nombre_usuario = :usuarios");
        $stmt->bindParam(':usuarios', $datosIngreso['usuario'], PDO::PARAM_STR);
        $stmt->execute();
         if($stmt->rowCount()  > 0){
             return true;
         }else{
             return false;
         }

         
    }

    /* Obtener los intentos del usuario que ingresa */
    static public function getIntentosModel($datosIngreso, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT intentos  FROM $tabla WHERE nombre_usuario = :usuarios");
        $stmt->bindParam(':usuarios', $datosIngreso['usuario'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }else{
            return false;
        }
       
    }
    /* Revisar el password del usuario */
    static public function revisarPassModel($datosIngreso, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT pass  FROM $tabla WHERE nombre_usuario = :user AND pass LIKE :pass");
        
        $stmt->bindParam(':user', $datosIngreso['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', $datosIngreso['pass'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
       
    }
    /*Funcion de registro de intentos*/
    static public function intentosModel($datosIngreso, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intento  WHERE nombre_usuario = :us");
        $stmt->bindParam(":intento",$datosIngreso["intentos"], PDO::PARAM_INT);
        $stmt->bindParam(':us', $datosIngreso['usuario'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        
    }

    /*Funcion de ingreso al portal */
    static public function ingresoModel($datosIngreso, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT 
        us.nivel_usuario as nivel, 
        us.departamento as depto,
        CONCAT(emp.Nombre , ' ', emp.Ap) AS Nombre,
        emp.foto as foto
        FROM ayuntamiento.usuarios us
        LEFT JOIN ayuntamiento.empleados emp ON emp.id = us.id_empleado
        WHERE us.nombre_usuario = :id ");
        $stmt->bindParam(':id', $datosIngreso['usuario'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }else{
            return false;
        }
        
    }

    /*Funcion para registrar el log de ingreso */
    static public function logModel($datosIngreso, $tabla){
        $fehcaActual = date('Y-m-d H:i:s');
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ultimo_login = '$fehcaActual' WHERE nombre_usuario= :usuario");
        $stmt->bindParam(':usuario', $datosIngreso['usuario'], PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
    }
}