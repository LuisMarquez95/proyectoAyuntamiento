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
            $pdo = Conexion::conectar()->prepare("SELECT MAX(id) AS id FROM empleados");
            $pdo->execute();
            return $pdo->fetch();
        }else{
            return false;
        }
        
    }

    static public function registrarUsuarios($datos, $user, $pass, $id_empleado, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (nombre_usuario, pass, nivel_usuario, correo, telefono, departamento, fecha_registro, intentos, fecha_ultimo_login, activo, id_empleado) 
        VALUES (:user, :pas, :nivel, :correo, :telefono, :departamento, current_timestamp, 0, current_timestamp, 1, :idemple)");
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pas', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $datos['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos['numero'], PDO::PARAM_STR);
        $stmt->bindParam(':departamento', $datos['departamento'], PDO::PARAM_STR);
        $stmt->bindParam(':idemple', $id_empleado, PDO::PARAM_INT);
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

   /* static public function getUsuarios($tabla){
        $stmt = Conexion::contectar()->prepare("SELECT nombre_usuario, nivel_usuario, c
        orreo (SELECT Nombre_departamento FROM cat_departamentos WHERE id = us.departamento ) as depto FROM $tabla as us");
    }*/
}
/* 	nombre_usuario	pass	nivel_usuario	correo	telefono	departamento	fecha_registro	intentos	fecha_ultimo_login	activo
*/