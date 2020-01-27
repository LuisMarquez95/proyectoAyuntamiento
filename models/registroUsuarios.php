<?php

require_once 'conexion.php';

class gestorUsuariosModel{
    static public function guardarRegistroModel($datos, $imagen, $tabla){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Nombre, Ap, Am, telefono, correo, direccion, sexo, estatus,foto) 
        VALUES (:nombre, :ap, :am, :telefono, :correo, :direccion, :sexo, 1, :foto)");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':ap', $datos['ap'], PDO::PARAM_STR);
        $stmt->bindParam(':am', $datos['am'], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos['numero'], PDO::PARAM_INT);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $datos['sexo'], PDO::PARAM_INT);
        $stmt->bindParam(':foto', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    static public function registrarUsuarios($datos, $user, $pass, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (nombre_usuario, pass, nivel_usuario, correo, telefono, departamento, fecha_registro, intentos, fecha_ultimo_login, activo) 
        VALUES (:user, :pas, :nivel, :correo, :telefono, :departamento, current_timestamp, 0, current_timestamp, 1)");
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pas', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $datos['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos['numero'], PDO::PARAM_STR);
        $stmt->bindParam(':departamento', $datos['departamento'], PDO::PARAM_STR);
        try{
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }catch( PDOException $Exception ) {
           return false;
        }
    }
}
/* 	nombre_usuario	pass	nivel_usuario	correo	telefono	departamento	fecha_registro	intentos	fecha_ultimo_login	activo
*/